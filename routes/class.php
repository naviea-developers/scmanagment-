<?php

<<<<<<< HEAD
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
=======

use Illuminate\Support\Facades\Route;

// class route
Route::get('/viewAllClass', 'App\Http\Controllers\Backend\Class\classController@viewAllClass')->name('viewAllClass');

Route::get('/addNewBatch', 'App\Http\Controllers\Backend\Class\classController@addNewBatch')->name('addNewBatch');

Route::post('/uploadnewClass', 'App\Http\Controllers\Backend\Class\classController@uploadnewClass')->name('uploadnewClass');

Route::get('/addRoutine', 'App\Http\Controllers\Backend\Class\classController@addRoutine')->name('addRoutine');

Route::post('/uploadRoutine', 'App\Http\Controllers\Backend\Class\classController@uploadRoutine')->name('uploadRoutine');

Route::get('/classDetails/{id}', 'App\Http\Controllers\Backend\Class\classController@classDetails')->name('classDetails');

Route::get('/editClassDetailse/{id}', 'App\Http\Controllers\Backend\Class\classController@editClassDetailse')->name('editClassDetailse');

Route::post('/updateClassDetailes', 'App\Http\Controllers\Backend\Class\classController@updateClassDetailes')->name('updateClassDetailes');

Route::get('/deleteClassDetailse/{id}', 'App\Http\Controllers\Backend\Class\classController@deleteClassDetailse')->name('deleteClassDetailse');


Route::get('/getHomework', 'App\Http\Controllers\Backend\Class\classController@getHomework')->name('getHomework');

Route::get('/addHomework', 'App\Http\Controllers\Backend\Class\classController@addHomework')->name('addHomework');

Route::post('/storeHomework', 'App\Http\Controllers\Backend\Class\classController@storeHomework')->name('storeHomework');

Route::get('/viewHomework', 'App\Http\Controllers\Backend\Class\classController@viewHomework')->name('viewHomework');

Route::get('/addNewStudent', 'App\Http\Controllers\Backend\Class\classController@addNewStudent')->name('addNewStudent');

Route::get('/addClassTest', 'App\Http\Controllers\Backend\Class\classController@addClassTest')->name('addClassTest');

Route::post('/storeClassTest', 'App\Http\Controllers\Backend\Class\classController@storeClassTest')->name('storeClassTest');

Route::get('/viewClassTest', 'App\Http\Controllers\Backend\Class\classController@viewClassTest')->name('viewClassTest');

// Route::get('/paymentDetails', 'App\Http\Controllers\Backend\Class\Student\StudentController@paymentDetails')->name('paymentDetails');

// Route::post('/addPayment', 'App\Http\Controllers\Backend\Class\Student\StudentController@addPayment')->name('addPayment');





//-----------------------------Result Route---------------------------//

Route::get('/viewResult', 'App\Http\Controllers\Backend\Result\resultController@viewResult')->name('viewResult');

Route::get('/addResult', 'App\Http\Controllers\Backend\Result\resultController@addResult')->name('addResult');

Route::post('/storeResult', 'App\Http\Controllers\Backend\Result\resultController@storeResult')->name('storeResult');

Route::get('/resultInfo', 'App\Http\Controllers\Backend\Result\resultController@resultInfo')->name('resultInfo');

Route::get('/showResult', 'App\Http\Controllers\Backend\Result\resultController@showResult')->name('showResult');

Route::get('/deleteResult/{id}', 'App\Http\Controllers\Backend\Result\resultController@deleteResult')->name('deleteResult');

Route::get('/getStudent', 'App\Http\Controllers\Backend\Result\resultController@getStudent')->name('getStudent');
>>>>>>> 0be22d48f27daee4c917d5f0d75f8b2d2c3e5bc6
