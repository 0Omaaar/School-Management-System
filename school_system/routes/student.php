<?php


use App\Http\Controllers\Students\dashboard\ExamsController;
use App\Http\Controllers\Students\dashboard\ProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function () {

    // ==============================dashboard============================
    Route::get('/student/dashboard', function () {
        return view('pages.Students.dashboard');
    });

    Route::resource('/student/dashboard/student_exams', ExamsController::class);
    Route::resource('/student/dashboard/profile-student', ProfileController::class);
    // Route::get('/student/dashboard', [StudentController::class, 'dashboard']);

});