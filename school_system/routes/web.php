<?php

use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\HomeController;
use App\Models\Classroom;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

include_once 'auth.php';


Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::resource('Grades', GradeController::class);
        Route::resource('Classrooms', ClassroomController::class);
        Route::post('/deleteAll', [ClassroomController::class, 'delete_all'])->name('delete_all');
        Route::post('/searchByGrade', [ClassroomController::class, 'filter_classes'])->name('filter_classes');
    }
);