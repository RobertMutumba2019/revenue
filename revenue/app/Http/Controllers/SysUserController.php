<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SysUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail; // Import the Mail facade
use App\Mail\WelcomeEmail; // Import your new Mailable class
use Illuminate\Support\Facades\Log; // Import the Log facade - FIX for "undefined type Log"

class SysUserController extends Controller
{
    public function create()
    {
        // Pass departments, designations, gender to view
        return view('sysuser.create', [
            'departments' => \App\Models\Department::all(),
            'designations' => \App\Models\Designation::all(),
            'gender' => \App\Models\Gender::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'surname' => 'required|string|max:255',
            'othername' => 'nullable|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:sys_users,email',
            'user_gender' => 'nullable|exists:gender,id',
            'user_department_id' => 'required|exists:departments,id',
            'designation' => 'required|exists:designations,id',
        ]);

        // Generate username: first letter surname + first letter othername + 1 + 4 random digits
        $surnameFirst = strtolower(substr($request->surname, 0, 1));
        $othernameFirst = strtolower(substr($request->othername ?? '', 0, 1));
        $randomDigits = mt_rand(1000, 9999);
        $username = $surnameFirst . $othernameFirst . '1' . $randomDigits;

        // Generate random password (12 chars, mixed)
        $passwordPlain = Str::random(8);

        // Create new user
        $user = SysUser::create([
            'surname' => $request->surname,
            'othername' => $request->othername,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'gender_id' => $request->user_gender,
            'department_id' => $request->user_department_id,
            'username' => $username,
            'designation_id' => $request->designation,
            'password' => Hash::make($passwordPlain),
        ]);

        // Send email with credentials
        try {
            Mail::to($request->email)->send(new WelcomeEmail($username, $passwordPlain));
            $message = "User created successfully and credentials sent to email!";
        } catch (\Exception $e) {
            // Log the error if email sending fails
            Log::error("Failed to send new user credentials email to {$request->email}: " . $e->getMessage());
            $message = "User created successfully, but failed to send credentials email. Please provide credentials manually.";
        }

        return redirect()->back()->with('success', $message);
    }




public function viewa(Request $request)
{
    
    $query = SysUser::query();

    // If search query provided, filter by surname or othername or email or phone
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('surname', 'LIKE', "%$search%")
              ->orWhere('othername', 'LIKE', "%$search%")
              ->orWhere('email', 'LIKE', "%$search%")
              ->orWhere('telephone', 'LIKE', "%$search%");
        });
    }

    // Pagination optional but recommended
    $users = $query->paginate(15);

    return view('viewa', compact('users'));
}

public function destroy(Request $request)
{
    // Expecting an array of user IDs to delete
    $ids = $request->input('user_ids');

    if ($ids && is_array($ids)) {
        SysUser::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Users deleted successfully.');
    }

    return redirect()->back()->with('error', 'No users selected.');
}

}
