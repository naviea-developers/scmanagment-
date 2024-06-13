<?php

use App\Http\Controllers\Backend\Location\CityController;
use App\Http\Controllers\Backend\Location\ContinentController;
use App\Http\Controllers\Backend\Location\CountryController;
use App\Http\Controllers\Backend\Location\HotelPackageController;
use App\Http\Controllers\Backend\Location\MedicalTourismPackageController;
use App\Http\Controllers\Backend\Location\StateController;
use App\Http\Controllers\Backend\Location\ThanaController;
use App\Http\Controllers\Backend\Location\UnionController;
use App\Http\Controllers\Backend\Location\WordController;
use App\Http\Controllers\Backend\Location\PopularLocationController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\MedicalTourismController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//continent
Route::resource('/continent', ContinentController::class);
Route::post('ajax-continent', [ContinentController::class,"ajaxData"])->name('admin.continent.ajax');
Route::post('delete-continent', [ContinentController::class,"destroy"])->name('admin.continent.delete');
Route::get('/status/{id}', [ContinentController::class, 'status'])->name('admin.continent.status');

//country
Route::resource('/country', CountryController::class);
Route::post('ajax-country', [CountryController::class,"ajaxData"])->name('admin.country.ajax');
Route::post('delete', [CountryController::class,"destroy"])->name('admin.country.delete');
Route::get('/status/{id}', [CountryController::class, 'status'])->name('admin.country.status');

// Route::post('/delete-country', [CountryController::class, 'delete'])->name('admin.medical_tourism.country.delete');
// Route::get('/country/status_toggle/{id}', [CountryController::class, 'status_toggle'])->name('admin.medical_tourism.country.status');
//State
Route::resource('/state', StateController::class);
Route::post('ajax-state', [StateController::class,"ajaxData"])->name('admin.state.ajax');
Route::post('delete', [StateController::class,"destroy"])->name('admin.state.delete');
Route::get('/status/{id}', [StateController::class, 'status'])->name('admin.state.status');
// Route::post('/delete-state', [state::class, 'delete'])->name('admin.medical_tourism.state.delete');
// Route::get('/state/status_toggle/{id}', [StateController::class, 'status_toggle'])->name('admin.medical_tourism.state.status');
//city
Route::resource('/city', CityController::class);
Route::post('/delete-city', [CityController::class, 'delete'])->name('admin.medical_tourism.city.delete');
Route::get('/city/status_toggle/{id}', [CityController::class, 'status_toggle'])->name('admin.medical_tourism.city.status');
//Thana or Post
Route::resource('/thana', ThanaController::class);
Route::post('/delete-thana', [ThanaController::class, 'delete'])->name('admin.medical_tourism.thana.delete');
Route::get('/thana/status_toggle/{id}', [ThanaController::class, 'status_toggle'])->name('admin.medical_tourism.thana.status');
//union
Route::resource('/union', UnionController::class);
Route::post('/delete-union', [UnionController::class, 'delete'])->name('admin.medical_tourism.union.delete');
Route::get('/union/status_toggle/{id}', [UnionController::class, 'status_toggle'])->name('admin.medical_tourism.union.status');
//word
Route::resource('/word', WordController::class);
Route::post('/delete-word', [WordController::class, 'delete'])->name('admin.medical_tourism.word.delete');
Route::get('/word/status_toggle/{id}', [WordController::class, 'status_toggle'])->name('admin.medical_tourism.word.status');


 //ajax start Continent and Country and State get
 Route::get('/get/country/{id}', [StateController::class, 'getCountry']);
 Route::get('/get/state/{id}', [StateController::class, 'getState']);
 Route::get('/get/city/{id}', [StateController::class, 'getCity']);
 Route::get('/get/thana/{id}', [StateController::class, 'getThana']);
 Route::get('/get/union/{id}', [StateController::class, 'getUnion']);
Route::get('/get/word/{id}', [StateController::class, 'getWord']);
Route::get('/get/lab/{id}', [StateController::class, 'getLab']);
 //ajax End Continent and Country and State get



//Mediacl_turism Package
Route::resource('/tourism-package', MedicalTourismPackageController::class);
Route::post('/delete-tourism-package', [MedicalTourismPackageController::class, 'delete'])->name('admin.medical_tourism.package.delete');
Route::get('/tourism-package/status_toggle/{id}', [MedicalTourismPackageController::class, 'status_toggle'])->name('admin.medical_tourism.package.status');



//Mediacl_turism Hotel
Route::resource('/tourism-hotel-package', HotelPackageController::class);
Route::post('/delete-tourism-hotel-package', [HotelPackageController::class, 'delete'])->name('admin.medical_tourism.hotel_package.delete');
Route::get('/tourism-hotel-package/status_toggle/{id}', [HotelPackageController::class, 'status_toggle'])->name('admin.medical_tourism.hotel_package.status');




