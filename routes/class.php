<?php


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
