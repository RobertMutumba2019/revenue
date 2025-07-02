<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Gender;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    
public function create()
{
    $departments = Department::all();
    $designations = Designation::all();
    $gender = Gender::all();

    return view('user', compact('departments', 'designations','gender'));
}

}


