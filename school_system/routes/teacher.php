<?php

use App\Http\Controllers\Teachers\dashboard\QuestionController;
use App\Http\Controllers\Teachers\dashboard\QuizzController;
// use App\Http\Controllers\Students\StudentController;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Teachers\dashboard\StudentController;




//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {

        $ids = Teacher::findorFail(auth()->user()->id)->Sections()->pluck('section_id');
        $data['count_sections']= $ids->count();
        $data['count_students']= Student::whereIn('section_id',$ids)->count();


        return view('pages.Teachers.dashboard.dashboard',$data);
    });

    Route::get('/teacher/dashboard/students', [StudentController::class, 'index'])->name('student.index');
    Route::get('/teacher/dashboard/sections', [StudentController::class, 'sections'])->name('sections');
    Route::post('/teacher/dashboard/attendance', [StudentController::class, 'attendance'])->name('attendance');
    Route::post('/edit_attendance',[StudentController::class, 'editAttendance'])->name('attendance.edit');
    Route::get('/teacher/dashboard/attendanceReport', [StudentController::class, 'attendanceReport'])->name('attendance.report');
    Route::post('/teacher/dashboard/attendanceReport', [StudentController::class, 'attendanceSearch'])->name('attendance.search');
    Route::resource('/teacher/dashboard/quizzes', QuizzController::class);

    // Route::get('/Get_classrooms/{id}', [QuizzController::class, 'Get_classrooms']);
    // Route::get('/Get_sections/{id}', [QuizzController::class, 'Get_sections']);

    Route::resource('/teacher/dashboard/questions', QuestionController::class);


});