<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SysUserController;

Route::get('/', [AdminController::class, 'showLoginForm'])->name('login');  // Login page (GET /)
Route::post('/', [AdminController::class, 'login']);                       // Login submission (POST /)
Route::get('/admind', [AdminController::class, 'adminDashboard']);         // Admin dashboard page (GET /admind)



Route::get('/welcome', function () {
    return view('welcome');
});



Route::get('/sysuser/create', [SysUserController::class, 'create'])->name('sysuser.create');
Route::post('/sysuser/create', [SysUserController::class, 'store'])->name('sysuser.store');


Route::get('/user', [UserController::class, 'create']);
Route::get('/viewa', [SysUserController::class, 'viewa'])->name('viewa');
Route::post('/sysuser/delete', [SysUserController::class, 'destroy'])->name('destroy');







