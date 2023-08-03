<?php

use App\Http\Controllers\Attendance\AttendanceController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Fees\FeesController;
use App\Http\Controllers\Fees\FeesInvoicesController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Library\LibraryController;
use App\Http\Controllers\OnlineClass\OnlineClassController;
use App\Http\Controllers\Question\QuestionController;
use App\Http\Controllers\Quizzes\QuizzesController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Student\PaymentController;
use App\Http\Controllers\Student\ProcessingFeeController;
use App\Http\Controllers\Student\ReceiptStudentController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Classroom;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\GoogleCalendar\Event;


// include_once 'auth.php';




//for selection page
Route::get('/', [HomeController::class, 'index'])->name('selection');


//for auth stuff
Route::group(['namespace' => 'Auth'], function () {

    Route::get('/login/{type}', [LoginController::class, 'loginForm'])->middleware('guest')->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/logout/{type}', [LoginController::class, 'logout'])->name('logout');


});

//
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');


        Route::resource('Grades', GradeController::class);

        Route::resource('Classrooms', ClassroomController::class);
        Route::post('/deleteAll', [ClassroomController::class, 'delete_all'])->name('delete_all');
        Route::post('/searchByGrade', [ClassroomController::class, 'filter_classes'])->name('filter_classes');

        Route::resource('Sections', SectionController::class);
        Route::get('/classes/{id}', [SectionController::class, 'getclasses']);

        Route::view('/add_parent', 'livewire.show_form')->name('add_parent');

        Route::resource('Teachers', TeacherController::class);

        Route::resource('Students', StudentController::class);
        Route::post('upload_attachments', [StudentController::class, 'upload_attachments'])->name('upload_attachments');
        Route::get('Download_attachment/{studentsname}/{filename}', [StudentController::class, 'Download_attachment'])->name('Download_attachment');
        Route::post('Delete_attachment', [StudentController::class, 'Delete_attachment'])->name('Delete_attachment');
        Route::get('/Soft/{id}', [StudentController::class, 'soft'])->name('Students.soft');

        Route::resource('Promotion', PromotionController::class);
        Route::resource('Graduated', GraduatedController::class);
        Route::resource('Fees', FeesController::class);
        Route::resource('Fees_Invoices', FeesInvoicesController::class);
        Route::resource('receipt_students', ReceiptStudentController::class);
        Route::resource('ProcessingFee', ProcessingFeeController::class);
        Route::resource('Payment_students', PaymentController::class);
        Route::resource('Attendance', AttendanceController::class);
        Route::resource('subjects', SubjectController::class);
        Route::resource('Quizzes', QuizzesController::class);
        Route::resource('questions', QuestionController::class);
        Route::resource('online_classes', OnlineClassController::class);
        Route::resource('library', LibraryController::class);
        Route::resource('settings', SettingController::class);
        Route::get('download_file/{filename}', [LibraryController::class, 'downloadAttachment'])->name('downloadAttachment');


        Route::get('/Get_classrooms/{id}', [StudentController::class, 'Get_classrooms']);
        Route::get('/Get_sections/{id}', [StudentController::class, 'Get_sections']);


        // Route::get('/test-google-calendar', function () {
        //     // Create a new event in Google Calendar
        //     $event = new Event;
    
        //     $event->name = 'Test Event 2';
        //     $event->startDateTime = now();
        //     $event->endDateTime = now()->addHours(1);
    
        //     $event->save();
    
        //     return 'Event created successfully!';
        //     // dd(env('GOOGLE_CALENDAR_ID'));
    
        // });
    
    }
);