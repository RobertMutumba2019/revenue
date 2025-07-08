<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SysUserController;
use App\Http\Middleware\SessionTimeout;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DictionaryCategoryControlller;
use App\Http\Controllers\DictionaryControlller;
use App\Http\Controllers\GoodsImportController;
use App\Http\Controllers\GoodsBrowserController;
use App\Http\Controllers\CommodityController;

Route::resource('commodities', CommodityController::class)->except(['index', 'show', 'create', 'store']);


Route::prefix('goods')->group(function () {
    Route::get('/', [GoodsBrowserController::class, 'index'])->name('goods.index');
    Route::get('/{segment}', [GoodsBrowserController::class, 'showFamilies'])->name('goods.families');
    Route::get('/{segment}/{family}', [GoodsBrowserController::class, 'showClasses'])->name('goods.classes');
    Route::get('/{segment}/{family}/{class}', [GoodsBrowserController::class, 'showCommodities'])->name('goods.commodities');
});


Route::get('/goods_import', [GoodsImportController::class, 'showForm'])->name('goods_import_form');
Route::post('/goods/import', [GoodsImportController::class, 'import'])->name('goods.import');


Route::resource('categories', DictionaryCategoryControlller::class)->except(['show'])->names([
    'index' => 'categories',
]);

Route::resource('dictionaries', DictionaryControlller::class)->except(['show'])->names([
    'index' => 'dictionaries',
]);
Route::get('dictionaries/import', [DictionaryControlller::class, 'import'])->name('dictionaries.import');
Route::post('dictionaries/import', [DictionaryControlller::class, 'importStore'])->name('dictionaries.import.store');

Route::get('/user_dictionaries', [DictionaryControlller::class, 'userView'])->name('user.dictionaries');

// List all districts
Route::get('/districts', [DistrictController::class, 'allDistricts'])->name('districts_all');
Route::get('/districts/add', [DistrictController::class, 'addDistrict'])->name('districts_add');
Route::post('/districts/store', [DistrictController::class, 'storeDistrict'])->name('districts_store');
Route::get('/districts/edit/{id}', [DistrictController::class, 'editDistrict'])->name('districts_edit');
Route::post('/districts/update/{id}', [DistrictController::class, 'updateDistrict'])->name('districts_update');
Route::delete('/districts/delete/{id}', [DistrictController::class, 'deleteDistrict'])->name('districts_delete');
Route::get('/viewdistricts', [DistrictController::class, 'userViewDistricts'])->name('viewdistricts');

Route::get('/designations', [DesignationController::class, 'index'])->name('designations');
Route::get('/designations/create', [DesignationController::class, 'create'])->name('designations_create');
Route::post('/designations', [DesignationController::class, 'store'])->name('designations_store');
Route::get('/designations/{designation}/edit', [DesignationController::class, 'edit'])->name('designations_edit');
Route::put('/designations/{designation}', [DesignationController::class, 'update'])->name('designations_update');
Route::delete('/designations/{designation}', [DesignationController::class, 'destroy'])->name('designations_destroy');

Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');
Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments_create');
Route::post('/departments', [DepartmentController::class, 'store'])->name('departments_store');

Route::get('/departments/{dept_id}/edit', [DepartmentController::class, 'edit'])->name('departments_edit');
Route::put('/departments/{dept_id}', [DepartmentController::class, 'update'])->name('departments_update');
Route::delete('/departments/{dept_id}', [DepartmentController::class, 'destroy'])->name('departments_destroy');

Route::middleware([SessionTimeout::class])->group(function () {
   Route::get('/welcome', [AdminController::class, 'welcomePage'])->name('welcome');
   Route::match(['get', 'post'], '/change-password', [AdminController::class, 'changePassword'])->name('change.password');
  Route::get('/viewer', [SysUserController::class, 'welcomeUserDashboard'])->name('viewer');
  Route::get('/download', [SysUserController::class, 'downloadUserPDF'])->name('download');

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











