<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\School_management\Academic_year\AcademicYearController;
use App\Http\Controllers\Backend\School_management\Bulding\BuldingController;
use App\Http\Controllers\Backend\School_management\Class\ClassController;
use App\Http\Controllers\Backend\School_management\Floor\FloorController;
use App\Http\Controllers\Backend\School_management\Group\GroupController;
use App\Http\Controllers\Backend\School_Management\Subject\SubjectController;
use App\Http\Controllers\Frontend\ReviewController;


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
    //Add group for admin
    Route::get('index', [GroupController::class,"index"])->name('admin.group.index');
    Route::get('create', [GroupController::class,"create"])->name('admin.group.create');
    Route::post('store', [GroupController::class,"store"])->name('admin.group.store');
    Route::get('edit/{id}', [GroupController::class,"edit"])->name('admin.group.edit');
    Route::post('update/{id}', [GroupController::class,"update"])->name('admin.group.update');
    Route::post('delete', [GroupController::class,"destroy"])->name('admin.group.delete');
    Route::get('/status/{id}', [GroupController::class, 'status'])->name('admin.group.status');
});

Route::prefix('academic-year')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Add year for admin
    Route::get('index', [AcademicYearController::class,"index"])->name('admin.academic_year.index');
    Route::get('create', [AcademicYearController::class,"create"])->name('admin.academic_year.create');
    Route::post('store', [AcademicYearController::class,"store"])->name('admin.academic_year.store');
    Route::get('edit/{id}', [AcademicYearController::class,"edit"])->name('admin.academic_year.edit');
    Route::post('update/{id}', [AcademicYearController::class,"update"])->name('admin.academic_year.update');
    Route::post('delete', [AcademicYearController::class,"destroy"])->name('admin.academic_year.delete');
    Route::get('/status/{id}', [AcademicYearController::class, 'status'])->name('admin.academic_year.status');
});

Route::prefix('bulding')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Add Bulding for admin
    Route::get('index', [BuldingController::class,"index"])->name('admin.bulding.index');
    Route::get('create', [BuldingController::class,"create"])->name('admin.bulding.create');
    Route::post('store', [BuldingController::class,"store"])->name('admin.bulding.store');
    Route::get('edit/{id}', [BuldingController::class,"edit"])->name('admin.bulding.edit');
    Route::post('update/{id}', [BuldingController::class,"update"])->name('admin.bulding.update');
    Route::post('delete', [BuldingController::class,"destroy"])->name('admin.bulding.delete');
    Route::get('/status/{id}', [BuldingController::class, 'status'])->name('admin.bulding.status');
});
Route::prefix('floor')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Add floor for admin
    Route::get('index', [FloorController::class,"index"])->name('admin.floor.index');
    Route::get('create', [FloorController::class,"create"])->name('admin.floor.create');
    Route::post('store', [FloorController::class,"store"])->name('admin.floor.store');
    Route::get('edit/{id}', [FloorController::class,"edit"])->name('admin.floor.edit');
    Route::post('update/{id}', [FloorController::class,"update"])->name('admin.floor.update');
    Route::post('delete', [FloorController::class,"destroy"])->name('admin.floor.delete');
    Route::get('/status/{id}', [FloorController::class, 'status'])->name('admin.floor.status');
});

