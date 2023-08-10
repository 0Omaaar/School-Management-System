<?php

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


});