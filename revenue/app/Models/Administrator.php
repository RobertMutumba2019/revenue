<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    use HasFactory;

    protected $fillable = ['admin_name', 'password'];
}


//php artisan tinker

// use Illuminate\Support\Facades\Hash;
// use App\Models\Administrator;

// Administrator::create([
//     'admin_name' => 'mr',
//     'password' => Hash::make('Mut@2019#'),  // Replace with your desired password
// ]);
