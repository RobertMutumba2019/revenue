<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [AdminController::class, 'showLoginForm'])->name('login');  // Login page (GET /)
Route::post('/', [AdminController::class, 'login']);                       // Login submission (POST /)
Route::get('/admind', [AdminController::class, 'adminDashboard']);         // Admin dashboard page (GET /admind)



Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('login');
});





