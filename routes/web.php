<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('dashboard',[App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('user-management')->as('user-management.')->group(function () {
        Route::resource('permissions', \App\Http\Controllers\UserManagement\PermissionsController::class);
        Route::resource('roles', \App\Http\Controllers\UserManagement\RolesController::class);
        Route::resource('users', \App\Http\Controllers\UserManagement\UsersController::class);
    });
});
