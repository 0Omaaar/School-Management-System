<?php

use App\Http\Controllers\Parents\dashboard\ChildrenController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parent']
    ], function () {

    //==============================dashboard============================
    Route::get('/parent/dashboard', function () {
        $sons = Student::where('parent_id',auth()->user()->id)->get();
        return view('pages.parents.dashboard',compact('sons'));
    })->name('dashboard.parents');

    Route::get('/parent/dashboard/sons', [ChildrenController::class, 'index'])->name('sons.index');
    Route::get('/parent/dashboard/son/{id}/degrees', [ChildrenController::class, 'results'])->name('sons.results');
    Route::get('/parent/dashboard/sons/attendances', [ChildrenController::class, 'attendances'])->name('sons.attendances');
    Route::post('/parent/dashboard/sons/attendanceSearch', [ChildrenController::class, 'attendanceSearch'])->name('sons.attendances.search');
    Route::get('/parent/dashboard/sons/fees', [ChildrenController::class, 'fees'])->name('sons.fees');
    Route::get('/parent/dashboard/receiptStudent/{id}', [ChildrenController::class, 'receiptStudent'])->name('sons.receipt');
    Route::get('/parent/dashboard/profile', [ChildrenController::class, 'profile'])->name('profile.show.parent');
    Route::post('/parent/dashboard/update/{id}', [ChildrenController::class, 'update'])->name('profile.update.parent');

    

});