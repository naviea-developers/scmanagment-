<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// clear all cache :
// Clear application cache:
Route::get('/reboot', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return Redirect::back()->with('msg', 'Application All Cache Has Been Cleared');
});
// clear all cache

Route::get('/admin', function () {
    return view('backend.welcome');
});


// Route::get('/', 'App\Http\Controllers\auth@index')->name('/');


Route::get('/registration', function () {
    return view('backend.index.reg');
});

Route::get('/panding', function () {
    return view('backend.index.panding');
});




Route::post('/reg', 'App\Http\Controllers\auth@reg')->name('reg');
Route::post('/login', 'App\Http\Controllers\auth@login')->name('login');
Route::get('/logout', 'App\Http\Controllers\auth@logout')->name('logout');

Route::get('/dashboard', 'App\Http\Controllers\dashboard@dashboard')->name('dashboard');


// home
Route::get('/category', 'App\Http\Controllers\homeController@getCategory')->name('category');

Route::get('/addCatagory', function () {
    return view('backend.home.addCategory');
});

Route::post('/insertCategory', 'App\Http\Controllers\homeController@insertCategory')->name('insertCategory');

Route::post('/editCategory', 'App\Http\Controllers\homeController@editCategory')->name('editCategory');


Route::post('/updateCategory', 'App\Http\Controllers\homeController@updateCategory')->name('updateCategory');

Route::post('/deleteCategory', 'App\Http\Controllers\homeController@deleteCategory')->name('deleteCategory');

Route::post('/catagorylazy', 'App\Http\Controllers\homeController@catagorylazy')->name('catagorylazy');




Route::get('/subCategory', 'App\Http\Controllers\homeController@getSubCategory')->name('subCategory');

Route::get('/addSubCatagory', 'App\Http\Controllers\homeController@addSubCatagory')->name('addSubCatagory');

Route::post('/insertSubCategory', 'App\Http\Controllers\homeController@insertSubCategory')->name('insertSubCategory');

Route::post('/editSubCategory', 'App\Http\Controllers\homeController@editSubCategory')->name('editSubCategory');

Route::post('/updateSubCategory', 'App\Http\Controllers\homeController@updateSubCategory')->name('updateSubCategory');

Route::post('/deleteSubCategory', 'App\Http\Controllers\homeController@deleteSubCategory')->name('deleteSubCategory');

Route::post('/subcatagorylazy', 'App\Http\Controllers\homeController@subcatagorylazy')->name('subcatagorylazy');







Route::get('/brand', 'App\Http\Controllers\homeController@brand')->name('brand');
Route::get('/addBrand', 'App\Http\Controllers\homeController@addBrand')->name('addBrand');
Route::post('/insertBrand', 'App\Http\Controllers\homeController@insertBrand')->name('insertBrand');
Route::post('/editBrand', 'App\Http\Controllers\homeController@editBrand')->name('editBrand');
Route::post('/updateBrand', 'App\Http\Controllers\homeController@updateBrand')->name('updateBrand');
Route::post('/brandlazy', 'App\Http\Controllers\homeController@brandlazy')->name('brandlazy');
Route::post('/deleteBrand', 'App\Http\Controllers\homeController@deleteBrand')->name('deleteBrand');



Route::get('/sliders', 'App\Http\Controllers\homeController@slider')->name('slider');
Route::get('/addSlider', 'App\Http\Controllers\homeController@addSlider')->name('addSlider');
Route::post('/insertSlider', 'App\Http\Controllers\homeController@insertSlider')->name('insertSlider');
Route::post('/deleteSlider', 'App\Http\Controllers\homeController@deleteSlider')->name('deleteSlider');



Route::get('/banners', 'App\Http\Controllers\homeController@banners')->name('banners');
Route::get('/addBanner', 'App\Http\Controllers\homeController@addBanner')->name('addBanner');
Route::post('/insertBanner', 'App\Http\Controllers\homeController@insertBanner')->name('insertBanner');
Route::post('/editBanner', 'App\Http\Controllers\homeController@editBanner')->name('editBanner');
Route::post('/updateBanner', 'App\Http\Controllers\homeController@updateBanner')->name('updateBanner');
Route::post('/deleteBanner', 'App\Http\Controllers\homeController@deleteBanner')->name('deleteBanner');




Route::get('/adds', 'App\Http\Controllers\homeController@ads')->name('adds');
Route::get('/addAds', 'App\Http\Controllers\homeController@addAds')->name('addAds');
Route::post('/insertAds', 'App\Http\Controllers\homeController@insertAds')->name('insertAds');
Route::post('/editAds', 'App\Http\Controllers\homeController@editAds')->name('editAds');
Route::post('/updateAds', 'App\Http\Controllers\homeController@updateAds')->name('updateAds');
Route::post('/deleteAds', 'App\Http\Controllers\homeController@deleteAds')->name('deleteAds');




Route::get('/specialOffer', 'App\Http\Controllers\homeController@specialOffer')->name('specialOffer');
Route::get('/addspecialOffer', 'App\Http\Controllers\homeController@addspecialOffer')->name('addspecialOffer');
Route::post('/insertOffers', 'App\Http\Controllers\homeController@insertOffers')->name('insertOffers');
Route::post('/editOffers', 'App\Http\Controllers\homeController@editOffers')->name('editOffers');
Route::post('/updateOffers', 'App\Http\Controllers\homeController@updateOffers')->name('updateOffers');
Route::post('/deleteOffers', 'App\Http\Controllers\homeController@deleteOffers')->name('deleteOffers');




Route::get('/specialOfferTagline', 'App\Http\Controllers\homeController@specialOfferTagline')->name('specialOfferTagline');
Route::get('/addspecialOfferTagline', 'App\Http\Controllers\homeController@addspecialOfferTagline')->name('addspecialOfferTagline');
Route::post('/insertOffersTagline', 'App\Http\Controllers\homeController@insertOffersTagline')->name('insertOffersTagline');
Route::post('/editOffersTagline', 'App\Http\Controllers\homeController@editOffersTagline')->name('editOffersTagline');
Route::post('/updateOffersTagline', 'App\Http\Controllers\homeController@updateOffersTagline')->name('updateOffersTagline');
Route::post('/deleteOffersTagline', 'App\Http\Controllers\homeController@deleteOffersTagline')->name('deleteOffersTagline');




Route::get('/faq', 'App\Http\Controllers\homeController@faq')->name('faq');
Route::get('/addfaq', 'App\Http\Controllers\homeController@addfaq')->name('addfaq');
Route::post('/insertFaq', 'App\Http\Controllers\homeController@insertFaq')->name('insertFaq');
Route::post('/editFaq', 'App\Http\Controllers\homeController@editFaq')->name('editFaq');
Route::post('/UpdateFaq', 'App\Http\Controllers\homeController@UpdateFaq')->name('UpdateFaq');
Route::post('/deleteFaq', 'App\Http\Controllers\homeController@deleteFaq')->name('deleteFaq');





Route::get('/about', 'App\Http\Controllers\homeController@about')->name('about');
Route::post('/updateAbout', 'App\Http\Controllers\homeController@updateAbout')->name('updateAbout');




Route::get('/getAir', 'App\Http\Controllers\air@get')->name('getAir');
Route::get('/addAir', function () {
    return view('backend.booking.air.addAir');
});
Route::post('/uploadAir', 'App\Http\Controllers\air@uploadAir')->name('uploadAir');
Route::get('/deleteAir/{id}', 'App\Http\Controllers\air@deleteAir')->name('deleteAir');






Route::get('/getBus', 'App\Http\Controllers\bus@getBus')->name('getBus');
Route::get('/addBus', function () {
    return view('backend.booking.bus.addBus');
});
Route::post('/uploadBus', 'App\Http\Controllers\bus@uploadBus')->name('uploadBus');
Route::get('/deletebus/{id}', 'App\Http\Controllers\bus@deletebus')->name('deletebus');




Route::get('/getCar', 'App\Http\Controllers\car@getCar')->name('getCar');
Route::get('/addCar', function () {
    return view('backend.booking.car.addCar');
});
Route::post('/uploadCar', 'App\Http\Controllers\car@uploadCar')->name('uploadCar');
Route::get('/deleteCar/{id}', 'App\Http\Controllers\car@deleteCar')->name('deleteCar');





Route::get('/getHotel', 'App\Http\Controllers\hotel@getHotel')->name('getHotel');
Route::get('/addHotel', function () {
    return view('backend.booking.hotel.addHotel');
});
Route::post('/uploadHotel', 'App\Http\Controllers\hotel@uploadHotel')->name('uploadHotel');
Route::get('/getHotelPhotos', 'App\Http\Controllers\hotel@getHotelPhotos')->name('getHotelPhotos');
Route::get('/editHotel/{id}', 'App\Http\Controllers\hotel@editHotel')->name('editHotel');
Route::post('/updateHotel', 'App\Http\Controllers\hotel@updateHotel')->name('updateHotel');
// Route::get('/deleteCar/{id}', 'App\Http\Controllers\car@deleteCar')->name('deleteCar');






Route::get('/getPackage', 'App\Http\Controllers\packageController@getPackage')->name('getPackage');
Route::get('/addPackage', function () {
    return view('backend.package.add');
});
Route::post('/uploadPackage', 'App\Http\Controllers\packageController@uploadPackage')->name('uploadPackage');
Route::get('/editPackage/{id}', 'App\Http\Controllers\packageController@editPackage')->name('editPackage');
Route::post('/updatePackage', 'App\Http\Controllers\packageController@updatePackage')->name('updatePackage');
Route::get('/deletePackage/{id}', 'App\Http\Controllers\packageController@deletePackage')->name('deletePackage');







Route::get('/getCoupon', 'App\Http\Controllers\couponController@getCoupon')->name('getCoupon');
Route::get('/addCoupon', function () {
    return view('backend.coupon.add');
});
Route::post('/uploadCoupon', 'App\Http\Controllers\couponController@uploadCoupon')->name('uploadCoupon');

Route::get('/editCoupon/{id}', 'App\Http\Controllers\couponController@editCoupon')->name('editCoupon');

Route::get('/deleteCoupon/{id}', 'App\Http\Controllers\couponController@deleteCoupon')->name('deleteCoupon');





Route::get('/getProduct', 'App\Http\Controllers\shopping@getProduct')->name('getProduct');
Route::get('/addProduct', function () {
    return view('backend.shopping.add');
});

Route::post('/uploadProduct', 'App\Http\Controllers\shopping@uploadProduct')->name('uploadProduct');

Route::post('/updateProduct', 'App\Http\Controllers\shopping@updateProduct')->name('updateProduct');

Route::get('/editProduct/{id}', 'App\Http\Controllers\shopping@editProduct')->name('editProduct');

Route::get('/deleteProduct/{id}', 'App\Http\Controllers\shopping@deleteProduct')->name('deleteProduct');



// Report

Route::get('/viewReport', 'App\Http\Controllers\ReportController@viewReport')->name('viewReport');
Route::get('/allStudentReport', 'App\Http\Controllers\ReportController@viewAllStudent')->name('allStudentReport');
Route::get('/cartReport', 'App\Http\Controllers\ReportController@cartReport')->name('cartReport');
Route::get('/teacherReport', 'App\Http\Controllers\ReportController@teachersReport')->name('teacherReport');
// Route::get('/referrals/search', 'ReferralController:: searchreferrel')->name('search.referrel');


