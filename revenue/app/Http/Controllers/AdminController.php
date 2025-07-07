<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

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
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Handle user login.
     */
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Attempt to log in as SysUser
        $sysUser = SysUser::where('username', $username)->first();

        if ($sysUser && Hash::check($password, $sysUser->password)) {
            // Session info
            Session::put('user_logged_in', true);
            Session::put('user_id', $sysUser->id);
            Session::put('user_name', $sysUser->othername ?? $sysUser->surname);
            Session::put('user_type', $sysUser->user_type); // A or V

            // Get department name
            $department = Department::find($sysUser->department_id);
            $departmentName = $department ? $department->name : 'Unknown Department';
            Session::put('user_department', $departmentName);

            // Welcome message
            Session::flash('login_success_message', "Welcome, " . Session::get('user_name') . " from " . $departmentName . "!");

            // Redirect
            if ($sysUser->user_type === 'A') {
                return response()->json(['redirect' => url('/admind')]);
            } else {
                return response()->json(['redirect' => url('/welcome')]);
            }
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    /**
     * Admin dashboard.
     */
    // public function adminDashboard()
    // {
    //     if (!Session::get('user_logged_in') || Session::get('user_type') !== 'A') {
    //         return redirect('/');
    //     }

    //     return view('admind');
    // }


public function adminDashboard()
{
    if (!Session::get('user_logged_in') || Session::get('user_type') !== 'A') {
        return redirect('/');
    }

    // Set flag to allow admin later to access user dashboard
    Session::put('came_from_admin', true);

    // Get total registered users
    $totalUsers = SysUser::count();

    // Get online users (last_seen within 5 minutes)
    $onlineUsers = SysUser::where('last_seen', '>=', now()->subMinutes(5))->count();

    // Pass counts to the view
    return view('admind', compact('totalUsers', 'onlineUsers'));
}

      
     public function welcomePage()
{
    // 1. Ensure user is logged in
    if (!Session::get('user_logged_in')) {
        return redirect('/');
    }

    // 2. Check user type and redirect appropriately
    if (
        (Session::get('user_type') === 'A' && Session::has('came_from_admin')) ||
        Session::get('user_type') === 'V'
    ) {
        $latestUser = SysUser::latest()->first(); // gets the most recently created user
        return view('welcome', compact('latestUser'));
    }

    // 3. Block unauthorized access
    return redirect('/');
}

     


    /**
     * User (viewer) welcome dashboard.
     */
    // public function welcomePage()
    // {
    //     if (!Session::get('user_logged_in') || Session::get('user_type') !== 'V') {
    //         return redirect('/');
    //     }

    //     return view('welcome');
    // }

//     public function welcomePage()
// {

//     

//     if (!Session::get('user_logged_in')) {
//         return redirect('/');
//     }

//     // Allow if it's a normal user (V)
//     if (Session::get('user_type') === 'V') {
//         return view('welcome');
//     }

//     // Allow admin (A) ONLY if he has visited /admind first
//     if (Session::get('user_type') === 'A' && Session::has('came_from_admin')) {
//         return view('welcome');
//     }

//     // Otherwise block
//     return redirect('/');
// }




    /**
     * Logout function.
     */
    public function logout(Request $request)
    {
        Session::flush();
        $request->session()->regenerate();
        return redirect('/');
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
    // Allow only logged-in A or V users
    if (!Session::get('user_logged_in') || !in_array(Session::get('user_type'), ['A', 'V'])) {
        return redirect('/');
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

    return view('change'); // make sure this Blade view exists
}


}

