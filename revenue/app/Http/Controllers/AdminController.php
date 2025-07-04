<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Models\SysUser; // Import the SysUser model
use App\Models\Department; // Import Department model for user's department name
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // Import Session facade
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('login'); // React-based login page
    }

    /**
     * Handle user login attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // --- Attempt to log in as Administrator ---
        $admin = Administrator::where('admin_name', $username)->first();

        if ($admin && Hash::check($password, $admin->password)) {
            // Admin login successful
            Session::put('admin_logged_in', true);
            Session::put('user_type', 'admin'); // Store user type in session
            Session::flash('login_success_message', 'Welcome back, Administrator!'); // Flash success message
            return response()->json(['redirect' => url('/admind')]);
        }

        // --- Attempt to log in as SysUser ---
        $sysUser = SysUser::where('username', $username)->first();

        if ($sysUser && Hash::check($password, $sysUser->password)) {
            // SysUser login successful
            Session::put('user_logged_in', true);
            Session::put('user_id', $sysUser->id);
            Session::put('user_name', $sysUser->othername ? $sysUser->othername : $sysUser->surname); // Use othername if available, else surname
            Session::put('user_type', 'sys_user'); // Store user type in session

            // Get department name
            $department = Department::find($sysUser->department_id);
            $departmentName = $department ? $department->name : 'Unknown Department';
            Session::put('user_department', $departmentName);

            // Flash success message with user's name and department
            Session::flash('login_success_message', "Welcome, " . Session::get('user_name') . " from " . $departmentName . "!");
            return response()->json(['redirect' => url('/welcome')]); // Redirect to the welcome page
        }

        // --- Both login attempts failed ---
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function adminDashboard()
    {
        // Ensure only admins can access this dashboard
        if (!Session::get('admin_logged_in') || Session::get('user_type') !== 'admin') {
            return redirect('/'); // Redirect to login if not admin
        }

        return view('admind');
    }

    /**
     * Show the regular user welcome page.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function welcomePage()
    {
        // Ensure only regular users can access this page
        if (!Session::get('user_logged_in') || Session::get('user_type') !== 'sys_user') {
            return redirect('/'); // Redirect to login if not a sys_user
        }

        return view('welcome');
    }

   
    // logout method
    public function logout(Request $request)
{
    Session::flush(); // Clear all session data
    $request->session()->regenerate(); // Prevent session fixation
    return redirect('/'); // Send back to login page
}

  
public function sendResetLink(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $user = SysUser::where('email', $request->email)->first();

    if (!$user) {
        return response()->json(['message' => 'Email not found'], 404);
    }

    $token = Str::random(64);

    // Save token to password_resets
    DB::table('password_resets')->updateOrInsert(
        ['email' => $request->email],
        [
            'token' => $token,
            'created_at' => Carbon::now()
        ]
    );

    $resetUrl = url("/reset-password?token=$token&email=" . urlencode($request->email));

    Mail::raw("Hello {$user->surname},\n\nTo reset your password, click here: $resetUrl\n\nIf you didn't request this, ignore this email.", function ($message) use ($request) {
        $message->to($request->email)->subject('Reset your SUNEF password');
    });

    return response()->json(['message' => 'Password reset link sent.']);
    }
    public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
        'token' => 'required'
    ]);

    $reset = DB::table('password_resets')->where([
        ['email', $request->email],
        ['token', $request->token]
    ])->first();

    if (!$reset || Carbon::parse($reset->created_at)->addMinutes(60)->isPast()) {
        return back()->withErrors(['token' => 'Invalid or expired token.']);
    }

    $user = SysUser::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'User not found.']);
    }

    $user->password = Hash::make($request->password);
    $user->save();

    DB::table('password_resets')->where('email', $request->email)->delete();

    return redirect('/')->with('message', 'Password reset successfully. You can now log in.');
}

public function changePassword(Request $request)
{
    // Only allow logged-in sys_user
    if (!Session::get('user_logged_in') || Session::get('user_type') !== 'sys_user') {
        return redirect('/'); // Not authorized
    }

    if ($request->isMethod('post')) {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = SysUser::find(Session::get('user_id'));

        if (!$user || !Hash::check($request->input('current_password'), $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return back()->with('success', 'Password changed successfully.');
    }

    return view('change');
}

}

