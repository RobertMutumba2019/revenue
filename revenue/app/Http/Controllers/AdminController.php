<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // React-based login page
    }

public function login(Request $request)
{
    $username = $request->input('username');
    $password = $request->input('password');

    $admin = Administrator::where('admin_name', $username)->first();

    if ($admin && Hash::check($password, $admin->password)) {
        session(['admin_logged_in' => true]);
        return response()->json(['redirect' => url('/admind')]);
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
}




    public function adminDashboard()
    {
        if (!session('admin_logged_in')) {
            return redirect('/'); // ✅ FIXED
        }

        return view('admind');
    }
}
