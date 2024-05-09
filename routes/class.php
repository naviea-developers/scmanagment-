<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Result\resultController;
use App\Http\Controllers\Backend\Class\classController;
use App\Http\Controllers\Backend\School_management\Session\SessionController;



//-----------------------------class Route Start---------------------------//

// Route::prefix('academic-year')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Add Subject for admin
    Route::get('/viewAllClass', [classController::class,"viewAllClass"])->name('viewAllClass');
    Route::get('/addNewBatch', [classController::class,"addNewBatch"])->name('addNewBatch');
    Route::post('/uploadnewClass',[classController::class,"uploadnewClass"])->name('uploadnewClass');
    Route::get('/addRoutine', [classController::class,"addRoutine"])->name('addRoutine');
    Route::post('/uploadRoutine', [classController::class,"uploadRoutine"])->name('uploadRoutine');
    Route::get('/classDetails/{id}', [classController::class,"classDetails"])->name('classDetails');
    Route::get('/editClassDetailse/{id}', [classController::class,"editClassDetailse"])->name('editClassDetailse');
    Route::post('/updateClassDetailes',[classController::class,"updateClassDetailes"])->name('updateClassDetailes');
    Route::get('/deleteClassDetailse/{id}', [classController::class,"deleteClassDetailse"])->name('deleteClassDetailse');

    Route::get('/getHomework', [classController::class,"getHomework"])->name('getHomework');
    Route::get('/addHomework', [classController::class,"addHomework"])->name('addHomework');
    Route::post('/storeHomework',[classController::class,"storeHomework"])->name('storeHomework');
    Route::get('/viewHomework', [classController::class,"viewHomework"])->name('viewHomework');
    Route::get('/addNewStudent', [classController::class,"addNewStudent"])->name('addNewStudent');
    Route::get('/addClassTest', [classController::class,"addClassTest"])->name('addClassTest');
    Route::post('/storeClassTest',[classController::class,"storeClassTest"])->name('storeClassTest');
    Route::get('/viewClassTest',[classController::class,"viewClassTest"])->name('viewClassTest');

    // Route::get('/paymentDetails', 'App\Http\Controllers\Backend\Class\Student\StudentController@paymentDetails')->name('paymentDetails');
   // Route::post('/addPayment', 'App\Http\Controllers\Backend\Class\Student\StudentController@addPayment')->name('addPayment');
// });

//-----------------------------class Route End---------------------------//


//-----------------------------Result Route Start---------------------------//

// Route::prefix('academic-year')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Add Subject for admin
    Route::get('/viewResult', [resultController::class,"viewResult"])->name('viewResult');
    Route::get('/addResult', [resultController::class,"addResult"])->name('addResult');
    Route::post('/storeResult',[resultController::class,"storeResult"])->name('storeResult');
    Route::get('/resultInfo', [resultController::class,"resultInfo"])->name('resultInfo');
    Route::get('/showResult', [resultController::class,"showResult"])->name('showResult');
    Route::get('/deleteResult/{id}', [resultController::class,"deleteResult"])->name('deleteResult');
    Route::get('/getStudent', [resultController::class, 'getStudent'])->name('getStudent');
// });
//-----------------------------Result Route End---------------------------// 


// Route::prefix('academic-year')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Add Subject for admin
    Route::get('/viewResult', [resultController::class,"viewResult"])->name('viewResult');
    Route::get('/addResult', [resultController::class,"addResult"])->name('addResult');
    Route::post('/storeResult',[resultController::class,"storeResult"])->name('storeResult');
    Route::get('/resultInfo', [resultController::class,"resultInfo"])->name('resultInfo');
    Route::get('/showResult', [resultController::class,"showResult"])->name('showResult');
    Route::get('/deleteResult/{id}', [resultController::class,"deleteResult"])->name('deleteResult');
    Route::get('/getStudent', [resultController::class, 'getStudent'])->name('getStudent');
// });

// Route::prefix('academic-year')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Add Subject for admin
    Route::get('/viewResult', [resultController::class,"viewResult"])->name('viewResult');
    Route::get('/addResult', [resultController::class,"addResult"])->name('addResult');
    Route::post('/storeResult',[resultController::class,"storeResult"])->name('storeResult');
    Route::get('/resultInfo', [resultController::class,"resultInfo"])->name('resultInfo');
    Route::get('/showResult', [resultController::class,"showResult"])->name('showResult');
    Route::get('/deleteResult/{id}', [resultController::class,"deleteResult"])->name('deleteResult');
    Route::get('/getStudent', [resultController::class, 'getStudent'])->name('getStudent');
// });


Route::prefix('session')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Add Subject for admin
    Route::get('index', [SessionController::class,"index"])->name('admin.session.index');
    Route::get('create', [SessionController::class,"create"])->name('admin.session.create');
    Route::post('store', [SessionController::class,"store"])->name('admin.session.store');
    Route::get('edit/{id}', [SessionController::class,"edit"])->name('admin.session.edit');
    Route::post('update/{id}', [SessionController::class,"update"])->name('admin.session.update');
    Route::post('delete', [SessionController::class,"destroy"])->name('admin.session.delete');
    Route::get('/status/{id}', [SessionController::class, 'status'])->name('admin.session.status');
});