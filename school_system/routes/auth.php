<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
 * Auth Routes
 */

// Route::get('login', [AuthController::class, 'login'])->name('login');
// Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
// Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
// Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
// Route::get('signout', [AuthController::class, 'signOut'])->name('signout');


Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/', [HomeController::class, 'selection'])->name('selection');
Route::get('/login/{type}', [LoginController::class, 'loginForm'])->middleware('guest')->name('login.show');