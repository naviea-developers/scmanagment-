<?php

use App\Http\Controllers\Backend\School_management\Academic_year\AcademicYearController;
use App\Http\Controllers\Backend\School_management\Class\ClassController;
use App\Http\Controllers\Backend\School_management\Group\GroupController;
use App\Http\Controllers\Backend\School_Management\Subject\SubjectController;
use App\Http\Controllers\Frontend\ReviewController;
use Illuminate\Support\Facades\Route;


Route::prefix('class')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Add Class for admin
    Route::get('index', [ClassController::class,"index"])->name('admin.class.index');
    Route::get('create', [ClassController::class,"create"])->name('admin.class.create');
    Route::post('store', [ClassController::class,"store"])->name('admin.class.store');
    Route::get('edit/{id}', [ClassController::class,"edit"])->name('admin.class.edit');
    Route::post('update/{id}', [ClassController::class,"update"])->name('admin.class.update');
    Route::post('delete', [ClassController::class,"destroy"])->name('admin.class.delete');
    Route::get('/status/{id}', [ClassController::class, 'status'])->name('admin.class.status');
});
Route::prefix('subject')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Add Subject for admin
    Route::get('index', [SubjectController::class,"index"])->name('admin.subject.index');
    Route::get('create', [SubjectController::class,"create"])->name('admin.subject.create');
    Route::post('store', [SubjectController::class,"store"])->name('admin.subject.store');
    Route::get('edit/{id}', [SubjectController::class,"edit"])->name('admin.subject.edit');
    Route::post('update/{id}', [SubjectController::class,"update"])->name('admin.subject.update');
    Route::post('delete', [SubjectController::class,"destroy"])->name('admin.subject.delete');
    Route::get('/status/{id}', [SubjectController::class, 'status'])->name('admin.subject.status');
});

Route::prefix('group')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Add Subject for admin
    Route::get('index', [GroupController::class,"index"])->name('admin.group.index');
    Route::get('create', [GroupController::class,"create"])->name('admin.group.create');
    Route::post('store', [GroupController::class,"store"])->name('admin.group.store');
    Route::get('edit/{id}', [GroupController::class,"edit"])->name('admin.group.edit');
    Route::post('update/{id}', [GroupController::class,"update"])->name('admin.group.update');
    Route::post('delete', [GroupController::class,"destroy"])->name('admin.group.delete');
    Route::get('/status/{id}', [GroupController::class, 'status'])->name('admin.group.status');
});

Route::prefix('academic-year')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Add Subject for admin
    Route::get('index', [AcademicYearController::class,"index"])->name('admin.academic_year.index');
    Route::get('create', [AcademicYearController::class,"create"])->name('admin.academic_year.create');
    Route::post('store', [AcademicYearController::class,"store"])->name('admin.academic_year.store');
    Route::get('edit/{id}', [AcademicYearController::class,"edit"])->name('admin.academic_year.edit');
    Route::post('update/{id}', [AcademicYearController::class,"update"])->name('admin.academic_year.update');
    Route::post('delete', [AcademicYearController::class,"destroy"])->name('admin.academic_year.delete');
    Route::get('/status/{id}', [AcademicYearController::class, 'status'])->name('admin.academic_year.status');
});
