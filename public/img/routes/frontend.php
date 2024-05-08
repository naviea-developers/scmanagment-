<?php
use Illuminate\Support\Facades\Route;




Route::get('/', 'App\Http\Controllers\frontend\homepage@index')->name('/');

Route::get('/Shop-Category', 'App\Http\Controllers\frontend\category@ShopCategory')->name('/Shop-Category');

Route::get('/single-product/{id}', 'App\Http\Controllers\frontend\category@singleproduct')->name('/single-product');

Route::get('/signup', function () {
    return view('frontend.login.signup');
});

Route::get('/signin', function () {
    return view('frontend.login.signin');
});

Route::post('/homepagelogin', 'App\Http\Controllers\frontend\homepage@homepagelogin')->name('/homepagelogin');
Route::get('/booking/{id}', 'App\Http\Controllers\frontend\booking@booking')->name('/booking');
Route::get('/viewTransport/{cat}/{id}', 'App\Http\Controllers\frontend\booking@viewTransport')->name('/viewTransport');
Route::get('/viewPackage/{id}', 'App\Http\Controllers\frontend\booking@viewPackage')->name('/viewPackage');
Route::get('/viewAllPackage', 'App\Http\Controllers\frontend\booking@viewAllPackage')->name('/viewAllPackage');
Route::get('/viewAllHotel', 'App\Http\Controllers\frontend\booking@viewAllHotel')->name('/viewAllHotel');
Route::get('/hotelFullView/{id}', 'App\Http\Controllers\frontend\booking@hotelFullView')->name('/hotelFullView');


Route::get('/userProfile', 'App\Http\Controllers\frontend\homepage@userProfile')->name('/userProfile');








//////////////////////////// cart//////////////////////////////////////

Route::post('/cart', 'App\Http\Controllers\frontend\cart@add')->name('/cart');
