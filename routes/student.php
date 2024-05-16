<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\School_management\Student\StudentController;

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

Route::get('/get-search-student', [StudentController::class, 'getSearchStudent'])->name('admin.school_student.search-student');
