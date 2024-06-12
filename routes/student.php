<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\School_management\Student\StudentController;
use App\Http\Controllers\Backend\School_management\Student\StudentInfoUpdateController;
use App\Http\Controllers\Backend\School_management\TopperStudent\TopperStudentController;
use App\Http\Controllers\Frontend\FrontendController;

Route::prefix('school_student')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Course Create
     Route::get('index/', [StudentController::class,"index"])->name('admin.school_student.index');
     Route::get('create/', [StudentController::class,"create"])->name('admin.school_student.create');
     Route::post('store/', [StudentController::class,"store"])->name('admin.school_student.store');
     Route::get('edit/{id}', [StudentController::class,"edit"])->name('admin.school_student.edit');
     Route::post('update/{id}', [StudentController::class,"update"])->name('admin.school_student.update');
     Route::post('delete/', [StudentController::class,"destroy"])->name('admin.school_student.delete');
     Route::get('/status/{id}', [StudentController::class, 'status'])->name('admin.school_student.status');

});

Route::prefix('topper-student')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Course Create
     Route::get('index/', [TopperStudentController::class,"index"])->name('admin.topper_student.index');
     Route::post('ajax-topper-student', [TopperStudentController::class,"ajaxData"])->name('admin.topper_student.ajax');
     Route::get('create/', [TopperStudentController::class,"create"])->name('admin.topper_student.create');
     Route::post('store/', [TopperStudentController::class,"store"])->name('admin.topper_student.store');
     Route::get('edit/{id}', [TopperStudentController::class,"edit"])->name('admin.topper_student.edit');
     Route::post('update/{id}', [TopperStudentController::class,"update"])->name('admin.topper_student.update');
     Route::post('delete/', [TopperStudentController::class,"destroy"])->name('admin.topper_student.delete');
     Route::get('/status/{id}', [TopperStudentController::class, 'status'])->name('admin.topper_student.status');

});




Route::prefix('student-info-update')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //student_info_update update
     Route::get('index/', [StudentInfoUpdateController::class,"index"])->name('admin.student_info_update.index');
    //  Route::get('create/', [StudentInfoUpdateController::class,"create"])->name('admin.student_info_update.create');
    //  Route::post('store/', [StudentInfoUpdateController::class,"store"])->name('admin.student_info_update.store');
     Route::get('edit/{id}', [StudentInfoUpdateController::class,"edit"])->name('admin.student_info_update.edit');
     Route::post('update/{id}', [StudentInfoUpdateController::class,"update"])->name('admin.student_info_update.update');
     Route::post('delete/', [StudentInfoUpdateController::class,"destroy"])->name('admin.student_info_update.delete');
    //  Route::get('/status/{id}', [StudentInfoUpdateController::class, 'status'])->name('admin.student_info_update.status');

});

Route::get('/get-search-student', [StudentController::class, 'getSearchStudent'])->name('admin.school_student.search-student');



Route::post('/get-student-by-ajax', [StudentController::class, 'getStudentByAjax'])->name('admin.school_student.ajax');



////frontend Student page student
Route::get('/get-school-all-student-by-ajax', [FrontendController::class, 'fetchAllStudent'])->name('fetchAllStudent');
Route::get('/fetch-students', [FrontendController::class, 'fetchStudentsFilter'])->name('fetch.students');
