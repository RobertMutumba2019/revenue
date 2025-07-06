<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SysUserController;
use App\Http\Middleware\SessionTimeout;
use App\Http\Controllers\SettingController;


Route::middleware([SessionTimeout::class])->group(function () {
   Route::get('/welcome', [AdminController::class, 'welcomePage'])->name('welcome');
   Route::match(['get', 'post'], '/change-password', [AdminController::class, 'changePassword'])->name('change.password');
  
});




Route::get('/settings', [SettingController::class, 'showSettingsForm'])->name('settings.form');
Route::post('/settings', [SettingController::class, 'updateSettings'])->name('settings.update');






Route::get('/', [AdminController::class, 'showLoginForm'])->name('login');    // Login page (GET /)
Route::post('/login', [AdminController::class, 'login']);                    // Login submission (POST /login) - Changed from '/' to '/login' for clarity and best practice
Route::post('/logout', [AdminController::class, 'logout'])->name('logout'); // New logout route

// Admin Dashboard Route (protected)
Route::get('/admind', [AdminController::class, 'adminDashboard'])->name('admind');




Route::get('/sysuser/create', [SysUserController::class, 'create'])->name('sysuser.create');
Route::post('/sysuser/create', [SysUserController::class, 'store'])->name('sysuser.store');


Route::get('/user', [UserController::class, 'create']);
Route::get('/viewa', [SysUserController::class, 'viewa'])->name('viewa');
Route::post('/sysuser/delete', [SysUserController::class, 'destroy'])->name('destroy');

Route::post('/forgot-password', [AdminController::class, 'sendResetLink'])->name('forgot.password');
Route::get('/reset-password', function () {
    return view('reset');
});
Route::post('/reset-password', [AdminController::class, 'resetPassword']);











