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
   return redirect()->back();
});
// clear all cache

Route::get('/signup', function () {
    return view('backend.signup');
});

////----------------------Auth Route---------------///

Route::get('/register', 'App\Http\Controllers\Student\StudentController@register')->name('register');

Route::post('/studentSignUp', 'App\Http\Controllers\Student\StudentController@studentSignUp')->name('studentSignUp');

Route::get('/StudentLogin', 'App\Http\Controllers\Student\StudentController@StudentLogin')->name('StudentLogin');

Route::post('/loginStd', 'App\Http\Controllers\Student\StudentController@loginStd')->name('loginStd');

Route::get('/teacherSignUp', 'App\Http\Controllers\teacherController@teacherSignUp')->name('teacherSignUp');

Route::post('/addTeacher', 'App\Http\Controllers\teacherController@addTeacher')->name('addTeacher');

Route::get('/signin', 'App\Http\Controllers\teacherController@signin')->name('signin');

Route::post('/teacherLogin', 'App\Http\Controllers\teacherController@teacherLogin')->name('teacherLogin');

Route::get('/teacherlogout', 'App\Http\Controllers\teacherController@teacherlogout')->name('teacherlogout');

Route::get('/stdLogout', 'App\Http\Controllers\Student\StudentController@stdLogout')->name('stdLogout');

Route::get('/showTitlewiseCourse/{title}', 'App\Http\Controllers\Student\StudentController@showTitlewiseCourse')->name('showTitlewiseCourse');







// edit profile
Route::get('/editprofile/{id}', 'App\Http\Controllers\index@editprofile')->name('editprofile');

Route::post('/UpdateAdminPage', 'App\Http\Controllers\index@UpdateAdminPage')->name('UpdateAdminPage');



Route::get('/admin', 'App\Http\Controllers\index@authCheck')->name('admin');

// Route::get('/signup', 'App\Http\Controllers\index@authCheck')->name('signup');

Route::post('/reg', 'App\Http\Controllers\index@reg')->name('reg');

Route::post('/login', 'App\Http\Controllers\index@login')->name('login');

Route::get('/logout', 'App\Http\Controllers\index@logout')->name('logout');




Route::get('/deshboard', 'App\Http\Controllers\index@deshboard')->name('deshboard');




// class route

Route::get('/viewAllClass', 'App\Http\Controllers\classController@viewAllClass')->name('viewAllClass');

Route::get('/addNewBatch', 'App\Http\Controllers\classController@addNewBatch')->name('addNewBatch');

Route::post('/uploadnewClass', 'App\Http\Controllers\classController@uploadnewClass')->name('uploadnewClass');

Route::get('/addRoutine', 'App\Http\Controllers\classController@addRoutine')->name('addRoutine');

Route::post('/uploadRoutine', 'App\Http\Controllers\classController@uploadRoutine')->name('uploadRoutine');

Route::get('/classDetails/{id}', 'App\Http\Controllers\classController@classDetails')->name('classDetails');

Route::get('/editClassDetailse/{id}', 'App\Http\Controllers\classController@editClassDetailse')->name('editClassDetailse');

Route::post('/updateClassDetailes', 'App\Http\Controllers\classController@updateClassDetailes')->name('updateClassDetailes');

Route::get('/deleteClassDetailse/{id}', 'App\Http\Controllers\classController@deleteClassDetailse')->name('deleteClassDetailse');


Route::get('/getHomework', 'App\Http\Controllers\classController@getHomework')->name('getHomework');

Route::get('/addHomework', 'App\Http\Controllers\classController@addHomework')->name('addHomework');

Route::post('/storeHomework', 'App\Http\Controllers\classController@storeHomework')->name('storeHomework');

Route::get('/viewHomework', 'App\Http\Controllers\classController@viewHomework')->name('viewHomework');

Route::get('/addNewStudent', 'App\Http\Controllers\classController@addNewStudent')->name('addNewStudent');

Route::get('/addClassTest', 'App\Http\Controllers\classController@addClassTest')->name('addClassTest');

Route::post('/storeClassTest', 'App\Http\Controllers\classController@storeClassTest')->name('storeClassTest');

Route::get('/viewClassTest', 'App\Http\Controllers\classController@viewClassTest')->name('viewClassTest');

Route::get('/paymentDetails', 'App\Http\Controllers\Student\StudentController@paymentDetails')->name('paymentDetails');

Route::post('/addPayment', 'App\Http\Controllers\Student\StudentController@addPayment')->name('addPayment');


// Education Structure route


Route::get('/manageClasses', 'App\Http\Controllers\edicationStructure@manageClasses')->name('manageClasses');

Route::get('/addClass', function () {
    return view('backend.eduStructure.add');
});

Route::post('/addAClass', 'App\Http\Controllers\edicationStructure@addAClass')->name('addAClass');

Route::get('/deleteClass/{id}', 'App\Http\Controllers\edicationStructure@deleteClass')->name('deleteClass');

Route::get('/manageSubject', 'App\Http\Controllers\edicationStructure@manageSubject')->name('manageSubject');

Route::get('/addSubject', 'App\Http\Controllers\edicationStructure@addSubject')->name('addSubject');

Route::post('/addASubj', 'App\Http\Controllers\edicationStructure@addASubj')->name('addASubj');

Route::get('/editSubject/{id}', 'App\Http\Controllers\edicationStructure@editSubject')->name('editSubject');

Route::post('/updateSubj/{id}', 'App\Http\Controllers\edicationStructure@updateSubj')->name('updateSubj');

Route::get('/deleteSubj/{id}', 'App\Http\Controllers\edicationStructure@deleteSubj')->name('deleteSubj');

//------------------------------Notice---------------------------------//

Route::get('/viewNotice', 'App\Http\Controllers\edicationStructure@viewNotice')->name('viewNotice');

Route::get('/addNotice', 'App\Http\Controllers\edicationStructure@addNotice')->name('addNotice');

Route::post('/storeNotice', 'App\Http\Controllers\edicationStructure@storeNotice')->name('storeNotice');

Route::get('/showNotice', 'App\Http\Controllers\edicationStructure@showNotice')->name('showNotice');

Route::get('/editNotice/{id}', 'App\Http\Controllers\edicationStructure@editNotice')->name('editNotice');

Route::post('/updateNotice/{id}', 'App\Http\Controllers\edicationStructure@updateNotice')->name('updateNotice');





// teacherController
Route::get('/viewAllTeacher', 'App\Http\Controllers\teacherController@viewAllTeacher')->name('viewAllTeacher');

Route::get('/teacherInfo/{id}', 'App\Http\Controllers\teacherController@teacherInfo')->name('teacherInfo');

Route::get('/addTeacherForClass', 'App\Http\Controllers\teacherController@addTeacherForClass')->name('addTeacherForClass');

// AjaxRoute
Route::get('/getClassWiseSub', 'App\Http\Controllers\teacherController@getClassWiseSub')->name('getClassWiseSub');

Route::get('/getSubwiseTeach', 'App\Http\Controllers\teacherController@getSubwiseTeach')->name('getSubwiseTeach');
// AjaxRoute


Route::post('/uploadTeacherForClass', 'App\Http\Controllers\teacherController@uploadTeacherForClass')->name('uploadTeacherForClass');


Route::get('/viewClassWiseTeacher', 'App\Http\Controllers\teacherController@viewClassWiseTeacher')->name('viewClassWiseTeacher');

Route::get('/getClassWiseTeacherInfo', 'App\Http\Controllers\teacherController@getClassWiseTeacherInfo')->name('getClassWiseTeacherInfo');




// studentController

Route::get('/getTotalStudent', 'App\Http\Controllers\studentController@getTotalStudent')->name('getTotalStudent');

Route::get('/studentInfo/{id}', 'App\Http\Controllers\studentController@studentInfo')->name('studentInfo');

// Route::get('/classWiseStudent', 'App\Http\Controllers\StudentController@classWiseStudent')->name('classWiseStudent');


Route::post('/addNewStudentByAdmin', 'App\Http\Controllers\StudentController@addNewStudentByAdmin')->name('addNewStudentByAdmin');

//Ajax Route
Route::get('/viewClassWiseStudent', 'App\Http\Controllers\studentController@viewClassWiseStudent')->name('viewClassWiseStudent');

Route::get('/getClassWiseStudent', 'App\Http\Controllers\studentController@getClassWiseStudent')->name('getClassWiseStudent');




//StudentController-fontend

Route::get('/student_profile', 'App\Http\Controllers\Student\StudentController@student_profile')->name('student_profile');

Route::get('/teacher_profile', 'App\Http\Controllers\Student\StudentController@teacher_profile')->name('teacher_profile');

Route::get('/teacherEditProfile/{id}', 'App\Http\Controllers\Student\StudentController@teacherEditProfile')->name('teacherEditProfile');

Route::POST('/updateProfileForTeacher', 'App\Http\Controllers\Student\StudentController@updateProfileForTeacher')->name('updateProfileForTeacher');

Route::get('/classesForThisTeacher', 'App\Http\Controllers\Student\StudentController@classesForThisTeacher')->name('classesForThisTeacher');

Route::get('/addHomeworkByTeacher', 'App\Http\Controllers\Student\StudentController@addHomeworkByTeacher')->name('addHomeworkByTeacher');

Route::post('/uploadHW', 'App\Http\Controllers\Student\StudentController@uploadHW')->name('uploadHW');




Route::get('/setting', 'App\Http\Controllers\Student\StudentController@setting')->name('setting');

Route::POST('/changeStudentPassword', 'App\Http\Controllers\Student\StudentController@changeStudentPassword')->name('changeStudentPassword');

Route::get('/classVideo', 'App\Http\Controllers\Student\StudentController@classVideo')->name('classVideo');

Route::get('/classSchedule', 'App\Http\Controllers\Student\StudentController@classSchedule')->name('classSchedule');

Route::get('/editProfile/{id}', 'App\Http\Controllers\Student\StudentController@editProfile')->name('editProfile');

Route::post('/updateProfile', 'App\Http\Controllers\Student\StudentController@updateProfile')->name('updateProfile');

Route::get('/view/{id}', 'App\Http\Controllers\Student\StudentController@view')->name('view');

Route::get('/exam/{id}', 'App\Http\Controllers\Student\StudentController@exam')->name('exam');

Route::get('/showNoticeStudent/{title}', 'App\Http\Controllers\Student\StudentController@showNoticeStudent')->name('showNoticeStudent');

Route::get('/viewSubject', 'App\Http\Controllers\Student\StudentController@viewSubject')->name('viewSubject');

Route::get('/showStudentResult/{title}', 'App\Http\Controllers\Student\StudentController@showStudentResult')->name('showStudentResult');





//-----------------------------Course Route------------------------//

Route::get('/viewCourse', 'App\Http\Controllers\Student\courseController@viewCourse')->name('viewCourse');

Route::get('/addCourse', 'App\Http\Controllers\Student\courseController@addCourse')->name('addCourse');

Route::post('/manageCourse', 'App\Http\Controllers\Student\courseController@manageCourse')->name('manageCourse');

Route::get('/getSubcategory', 'App\Http\Controllers\Student\courseController@getSubcategory')->name('getSubcategory');

Route::get('/totalCourse', 'App\Http\Controllers\Student\courseController@totalCourse')->name('totalCourse');

Route::get('/studentViewDetails/{id}', 'App\Http\Controllers\Student\courseController@studentViewDetails')->name('studentViewDetails');

Route::get('/editCourse/{id}', 'App\Http\Controllers\Student\courseController@editCourse')->name('editCourse');

Route::post('/updateCourse/{id}', 'App\Http\Controllers\Student\courseController@updateCourse')->name('updateCourse');

Route::get('/deleteCourse/{id}', 'App\Http\Controllers\Student\courseController@deleteCourse')->name('deleteCourse');


//-----------------------------Blog Route------------------------//

Route::get('/allBlog', 'App\Http\Controllers\BlogController@allBlog')->name('allBlog');

Route::get('/addBlog', 'App\Http\Controllers\BlogController@addBlog')->name('addBlog');

Route::post('/storeBlog', 'App\Http\Controllers\BlogController@storeBlog')->name('storeBlog');

Route::get('/totalBlog', 'App\Http\Controllers\BlogController@totalBlog')->name('totalBlog');

Route::get('/editBlog/{id}', 'App\Http\Controllers\BlogController@editBlog')->name('editBlog');

Route::post('/updateBlog/{id}', 'App\Http\Controllers\BlogController@updateBlog')->name('updateBlog');

Route::get('/deleteBlog/{id}', 'App\Http\Controllers\BlogController@deleteBlog')->name('deleteBlog');


//-----------------------------Banner Route------------------------//

Route::get('/viewBanner', 'App\Http\Controllers\BannerController@viewBanner')->name('viewBanner');

Route::get('/addBanner', 'App\Http\Controllers\BannerController@addBanner')->name('addBanner');

Route::post('/storeBanner', 'App\Http\Controllers\BannerController@storeBanner')->name('storeBanner');

// Route::get('/totalBlog', 'App\Http\Controllers\BannerController@totalBlog')->name('totalBlog');

Route::get('/editBanner/{id}', 'App\Http\Controllers\BannerController@editBanner')->name('editBanner');

Route::post('/updateBanner/{id}', 'App\Http\Controllers\BannerController@updateBanner')->name('updateBanner');

Route::get('/deleteBanner/{id}', 'App\Http\Controllers\BannerController@deleteBanner')->name('deleteBanner');

//-----------------------------Gallery Route----------------------//
Route::get('/galleryIndex','App\Http\Controllers\galleryController@galleryIndex')->name('galleryIndex');

Route::post('/storeImages','App\Http\Controllers\galleryController@storeImages')->name('storeImages');

Route::get('/showImages','App\Http\Controllers\galleryController@showImages')->name('showImages');

//-----------------------------Exam Route---------------------------//

Route::get('/allExam', 'App\Http\Controllers\edicationStructure@allExam')->name('allExam');

Route::post('/examDetails', 'App\Http\Controllers\edicationStructure@examDetails')->name('examDetails');

Route::get('/addExam', 'App\Http\Controllers\edicationStructure@addExam')->name('addExam');

Route::post('/storeExam', 'App\Http\Controllers\edicationStructure@storeExam')->name('storeExam');

Route::get('/show', 'App\Http\Controllers\edicationStructure@show')->name('show');

Route::get('/edit/{id}', 'App\Http\Controllers\edicationStructure@edit')->name('edit');

Route::post('/update/{id}', 'App\Http\Controllers\edicationStructure@update')->name('update');



//-----------------------------Result Route---------------------------//

 Route::get('/viewResult', 'App\Http\Controllers\resultController@viewResult')->name('viewResult');

 Route::get('/addResult', 'App\Http\Controllers\resultController@addResult')->name('addResult');

 Route::post('/storeResult', 'App\Http\Controllers\resultController@storeResult')->name('storeResult');

 Route::get('/resultInfo', 'App\Http\Controllers\resultController@resultInfo')->name('resultInfo');

 Route::get('/showResult', 'App\Http\Controllers\resultController@showResult')->name('showResult');

 Route::get('/deleteResult/{id}', 'App\Http\Controllers\resultController@deleteResult')->name('deleteResult');

 Route::get('/getStudent', 'App\Http\Controllers\resultController@getStudent')->name('getStudent');


//-----------------------------Coupon Route---------------------------//

 Route::get('/totalCoupon', 'App\Http\Controllers\CouponController@totalCoupon')->name('totalCoupon');

 Route::get('/addCoupon', 'App\Http\Controllers\CouponController@addCoupon')->name('addCoupon');

 Route::post('/storeCoupon', 'App\Http\Controllers\CouponController@storeCoupon')->name('storeCoupon');

 Route::get('/editCoupon/{id}', 'App\Http\Controllers\CouponController@editCoupon')->name('editCoupon');

 Route::post('/updateCoupon/{id}', 'App\Http\Controllers\CouponController@updateCoupon')->name('updateCoupon');

 Route::get('/deleteCoupon/{id}', 'App\Http\Controllers\CouponController@deleteCoupon')->name('deleteCoupon');

//-----------------------------Cart Route---------------------------//

 Route::get('/viewCart', 'App\Http\Controllers\CartController@viewCart')->name('viewCart');

 Route::get('/addCart', 'App\Http\Controllers\CartController@addCart')->name('addCart');

 Route::post('/storeCart/{id}', 'App\Http\Controllers\CartController@storeCart')->name('storeCart');

 Route::get('/editCart/{id}', 'App\Http\Controllers\CartController@editCart')->name('editCart');

 Route::post('/updateCart/{id}', 'App\Http\Controllers\CartController@updateCart')->name('updateCart');

 Route::get('/deleteCart/{id}', 'App\Http\Controllers\CartController@deleteCart')->name('deleteCart');

 //----------------Home Contyroller Ropute----------------//


Route::get('/viewCategory', 'App\Http\Controllers\homeController@viewCategory')->name('viewCategory');


Route::get('/addCategory', function () {
    return view('backend.setting.addCategory');
})->name('addCategory');

Route::post('/insertCategory', 'App\Http\Controllers\homeController@insertCategory')->name('insertCategory');

Route::get('/editCategory/{id}', 'App\Http\Controllers\homeController@editCategory')->name('editCategory');

Route::post('/updateCategory/{id}', 'App\Http\Controllers\homeController@updateCategory')->name('updateCategory');

Route::get('/deleteCat/{id}', 'App\Http\Controllers\homeController@deleteCat')->name('deleteCat');

Route::get('/viewSubCategory', 'App\Http\Controllers\homeController@viewSubCategory')->name('viewSubCategory');

Route::get('/addSubCategory', 'App\Http\Controllers\homeController@addSubCategory')->name('addSubCategory');

Route::get('/editsubCategory/{id}', 'App\Http\Controllers\homeController@editsubCategory')->name('editsubCategory');

Route::post('/updatesubCategory/{id}', 'App\Http\Controllers\homeController@updatesubCategory')->name('updatesubCategory');

Route::post('/insertSubCategory', 'App\Http\Controllers\homeController@insertSubCategory')->name('insertSubCategory');

Route::get('/deleteSubCat/{id}', 'App\Http\Controllers\homeController@deleteSubCat')->name('deleteSubCat');

Route::get('/viewBrand', 'App\Http\Controllers\homeController@viewBrand')->name('viewBrand');


Route::get('/addBrand', function () {
    return view('backend.setting.addBrand');
})->name('addBrand');


Route::post('/insertBrand', 'App\Http\Controllers\homeController@insertBrand')->name('insertBrand');

Route::get('/getBrandsubCategory', 'App\Http\Controllers\homeController@getBrandsubCategory')->name('getBrandsubCategory');

Route::get('/editBrand/{id}', 'App\Http\Controllers\homeController@editBrand')->name('editBrand');

Route::post('/updateBrand/{id}', 'App\Http\Controllers\homeController@updateBrand')->name('updateBrand');


Route::get('/deletebrand/{id}', 'App\Http\Controllers\homeController@deletebrand')->name('deletebrand');

//-----------------Settings Route-------------------//
Route::get('/viewAbout', 'App\Http\Controllers\settingController@viewAbout')->name('viewAbout');

Route::get('/editAbout', 'App\Http\Controllers\settingController@editAbout')->name('editAbout');

Route::post('/insertAbout', 'App\Http\Controllers\settingController@insertAbout')->name('insertAbout');

Route::get('/viewPolicy', 'App\Http\Controllers\settingController@viewPolicy')->name('viewPolicy');

Route::get('/editPolicy', 'App\Http\Controllers\settingController@editPolicy')->name('editPolicy');

Route::post('/insertPolicy', 'App\Http\Controllers\settingController@insertPolicy')->name('insertPolicy');

Route::get('/terms', 'App\Http\Controllers\settingController@terms')->name('terms');

Route::get('/editTerms', 'App\Http\Controllers\settingController@editTerms')->name('editTerms');

Route::post('/insertTrams', 'App\Http\Controllers\settingController@insertTrams')->name('insertTrams');

Route::get('/address', 'App\Http\Controllers\settingController@address')->name('address');

Route::get('/addAddress', 'App\Http\Controllers\settingController@addAddress')->name('addAddress');

Route::post('/uploadAddress', 'App\Http\Controllers\settingController@uploadAddress')->name('uploadAddress');

Route::get('/editAddress/{id}', 'App\Http\Controllers\settingController@editAddress')->name('editAddress');

Route::get('/deleteAddress/{id}', 'App\Http\Controllers\settingController@deleteAddress')->name('deleteAddress');

Route::post('/updateAddress', 'App\Http\Controllers\settingController@updateAddress')->name('updateAddress');


Route::get('/paymentAccept', 'App\Http\Controllers\settingController@paymentAccept')->name('paymentAccept');

Route::get('/addPaymentMethod', 'App\Http\Controllers\settingController@addPaymentMethod')->name('addPaymentMethod');

Route::get('/deletePaymentMethod/{id}', 'App\Http\Controllers\settingController@deletePaymentMethod')->name('deletePaymentMethod');

Route::post('/uploadPaymentMethod', 'App\Http\Controllers\settingController@uploadPaymentMethod')->name('uploadPaymentMethod');




// Report

Route::get('/viewReport', 'App\Http\Controllers\ReportController@viewReport')->name('viewReport');
Route::get('/allStudentReport', 'App\Http\Controllers\ReportController@viewAllStudent')->name('allStudentReport');
Route::get('/cartReport', 'App\Http\Controllers\ReportController@cartReport')->name('cartReport');
Route::get('/teacherReport', 'App\Http\Controllers\ReportController@teachersReport')->name('teacherReport');
Route::get('/classReport', 'App\Http\Controllers\ReportController@classReport')->name('classReport');







// user role

Route::get('/addNewUser', function () {
    return view('backend.user.addNewUser');
})->name('addNewUser');

Route::post('/insertUser', 'App\Http\Controllers\user@insertUser')->name('insertUser');

Route::get('/manageUser', 'App\Http\Controllers\user@manageUser')->name('manageUser');

Route::get('/deleteUser/{id}', 'App\Http\Controllers\user@deleteUser')->name('deleteUser');

Route::get('/editUser/{id}', 'App\Http\Controllers\user@editUser')->name('editUser');

Route::post('/updateUserInfo', 'App\Http\Controllers\user@updateUserInfo')->name('updateUserInfo');

// Frontend route

Route::get('/', 'App\Http\Controllers\frontend\frontendController@indexPage')->name('indexPage');

Route::get('/aboutPage', 'App\Http\Controllers\frontend\frontendController@aboutPage')->name('aboutPage');

Route::get('/coursePage', 'App\Http\Controllers\frontend\frontendController@coursePage')->name('coursePage');

Route::get('/getTitlewiseCourse/{id}', 'App\Http\Controllers\frontend\frontendController@getTitlewiseCourse')->name('getTitlewiseCourse');


Route::get('/courseDetails/{id}', 'App\Http\Controllers\frontend\frontendController@courseDetails')->name('courseDetails');


Route::get('/cartView', 'App\Http\Controllers\frontend\frontendController@cartView')->name('cartView');

Route::post('/usecoupon', 'App\Http\Controllers\frontend\frontendController@usecoupon')->name('usecoupon');


Route::get('/checkuot', 'App\Http\Controllers\frontend\frontendController@checkuot')->name('checkuot');


Route::get('/orders', 'App\Http\Controllers\frontend\frontendController@orders')->name('orders');



Route::get('/bookNow/{id}', 'App\Http\Controllers\frontend\frontendController@bookNow')->name('bookNow');

Route::get('/deleteCartProduct/{id}', 'App\Http\Controllers\frontend\frontendController@deleteCartProduct');



Route::get('/getallBlog', 'App\Http\Controllers\frontend\frontendController@getallBlog')->name('getallBlog');

Route::get('/singleBlog/{id}', 'App\Http\Controllers\frontend\frontendController@singleBlog')->name('singleBlog');





// MTH ROutes


Route::get('/courseView/{id}', 'App\Http\Controllers\frontend\frontendController@courseView')->name('courseView');

Route::get('/courseCategory/{id}', 'App\Http\Controllers\frontend\frontendController@courseCategory')->name('courseCategory');


Route::get('/academicPrograms/{id}', 'App\Http\Controllers\frontend\frontendController@academicPrograms')->name('academicPrograms');

Route::get('/academicProgramView/{id}', 'App\Http\Controllers\frontend\frontendController@academicProgramView')->name('academicProgramView');



Route::get('/bcs/{id}', 'App\Http\Controllers\frontend\frontendController@bcs')->name('bcs');

Route::get('/bcsView/{id}', 'App\Http\Controllers\frontend\frontendController@bcsView')->name('bcsView');



Route::get('/it/{id}', 'App\Http\Controllers\frontend\frontendController@it')->name('it');

Route::get('/itView/{id}', 'App\Http\Controllers\frontend\frontendController@itView')->name('itView');



Route::get('/professional/{id}', 'App\Http\Controllers\frontend\frontendController@professional')->name('professional');

Route::get('/professionalView/{id}', 'App\Http\Controllers\frontend\frontendController@professionalView')->name('professionalView');






Route::get('/termsView', 'App\Http\Controllers\frontend\frontendController@termsView')->name('termsView');

Route::get('/policyView', 'App\Http\Controllers\frontend\frontendController@policyView')->name('policyView');

Route::get('/contactus', 'App\Http\Controllers\frontend\frontendController@contactus')->name('contactus');

Route::get('/carrier', 'App\Http\Controllers\frontend\frontendController@carrier')->name('carrier');

Route::post('/SendCarrierData', 'App\Http\Controllers\frontend\frontendController@SendCarrierData')->name('SendCarrierData');

Route::post('/SendContactData', 'App\Http\Controllers\frontend\frontendController@SendContactData')->name('SendContactData');



Route::get('/allAdmission', 'App\Http\Controllers\frontend\frontendController@allAdmission')->name('allAdmission');

Route::get('/admissionView/{id}', 'App\Http\Controllers\frontend\frontendController@admissionView')->name('admissionView');













//forgot password

Route::get('/forgotpassword', 'App\Http\Controllers\frontend\frontendController@forgotpassword')->name('forgotpassword');

Route::post('/forgotPasswordAction', 'App\Http\Controllers\frontend\frontendController@forgotPasswordAction')->name('forgotPasswordAction');

Route::get('/setNewPassword', function () {
    return view('newPassword');
})->name('setNewPassword');

Route::post('/setNewPasswordAction', 'App\Http\Controllers\frontend\frontendController@setNewPasswordAction')->name('setNewPasswordAction');




Route::get('/socialLogin', 'App\Http\Controllers\social_login@socialLogin')->name('socialLogin');

Route::get('/authRedirect', 'App\Http\Controllers\social_login@authRedirect')->name('authRedirect');
