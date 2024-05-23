<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Backend\subscriber\SubscriberController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\LikeController;
use App\Http\Controllers\Frontend\UserLoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\EventCartController;
use App\Http\Controllers\Frontend\CourseUserSubscriptionsController;
use App\Http\Controllers\Frontend\EbookCartController;
use App\Http\Controllers\Frontend\StudentApplicationController;
use App\Http\Controllers\Frontend\InstructorCourseController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
     Artisan::call('route:clear');
    return redirect()->back();
});

Route::get('/migrate-db', function() {
	Artisan::call('migrate', [
	    '--force' => true,
	]);
	Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return redirect()->back();
});

Route::middleware(['accessLogin'])->group(function () {



Route::get('change-currency/{name}', [FrontendController::class, 'changeCurrency'])->name('frontend.change_currency');
//Home Route
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/typeahead-search', [FrontendController::class, 'typeaHeadSearch'])->name('home.head_search');






Route::group(['middleware' => 'redirectIfAuthenticated'], function () {
    //Sign in Route
    Route::get('/sign-in', [FrontendController::class, 'signin'])->name('frontend.signin');
    Route::get('/teacher-sign-in', [FrontendController::class, 'teacherSignin'])->name('frontend.teacher_signin');
    // Route::get('/instructor-sign-in', [FrontendController::class, 'instructorSignin'])->name('frontend.instructor_signin');
    Route::get('/seller-sign-in', [FrontendController::class, 'sellerSignin'])->name('frontend.seller_signin');
    Route::get('/affiliate-sign-in', [FrontendController::class, 'affiliateSignin'])->name('frontend.affiliate_signin');
    Route::get('/consultant-sign-in', [FrontendController::class, 'consultantSignin'])->name('frontend.consultant_signin');

    //Register Route
    Route::get('/register', [FrontendController::class, 'register'])->name('frontend.register');
    Route::get('/teacher-register', [FrontendController::class, 'teacherRegister'])->name('frontend.teacher_register');
    // Route::get('/instructor-register', [FrontendController::class, 'instructorRegister'])->name('frontend.instructor_register');
    Route::get('/seller-register', [FrontendController::class, 'sellerRegister'])->name('frontend.seller_register');
    Route::get('/affiliate-register', [FrontendController::class, 'affiliateRegister'])->name('frontend.affiliate_register');
    Route::get('/consultant-register', [FrontendController::class, 'consultantRegister'])->name('frontend.consultant_register');

});

Route::post('/sign-in', [UserLoginController::class, 'userSignin'])->name('frontend.sign_in');
Route::post('/register',[UserLoginController::class,'userRegister'])->name('frontend.set_register');



//Sign in Route
// Route::get('/sign-in', [FrontendController::class, 'signin'])->name('frontend.signin');
// Route::get('/teacher-sign-in', [FrontendController::class, 'teacherSignin'])->name('frontend.teacher_signin');
// // Route::get('/instructor-sign-in', [FrontendController::class, 'instructorSignin'])->name('frontend.instructor_signin');
// Route::get('/seller-sign-in', [FrontendController::class, 'sellerSignin'])->name('frontend.seller_signin');
// Route::get('/affiliate-sign-in', [FrontendController::class, 'affiliateSignin'])->name('frontend.affiliate_signin');
// Route::post('/sign-in', [UserLoginController::class, 'userSignin'])->name('frontend.sign_in');



//Subscription Route
Route::post('/subscription', [SubscriberController::class, 'add_subscription'])->name('frontend.subscription');

//Page Route
//About Page Route
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
//Learner Page Route
Route::get('/learner', [FrontendController::class, 'learner'])->name('frontend.learner');
//Instructor Page Route
Route::get('/instructor', [FrontendController::class, 'instructor'])->name('frontend.instructor');

//Enterprise or Contact Page Route
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::middleware(['userCheck:1'])->group(function () {
Route::post('/frontend/user/contact/store', [FrontendController::class, 'userContactStore'])->name('frontend.user.contact.store');
});
//admin Contact Show
Route::post('/user/contact/index', [FrontendController::class, 'contactIndex'])->name('user.contact.index.post');
//Library Page Route
Route::get('/library', [FrontendController::class, 'library'])->name('frontend.library');

//Event List Page Route
Route::get('/event-list', [FrontendController::class, 'eventList'])->name('frontend.event_list');
Route::get('/event-details/{id}', [FrontendController::class, 'eventDetails'])->name('frontend.event.details');

Route::middleware(['userCheck'])->group(function () {
Route::post('/event-massage', [FrontendController::class, 'eventMassage'])->name('event.details.massage');
});
//ajax event lode
Route::get('/get-events-all',[FrontendController::class,'getEvents']);

//subscribe_details
Route::get('/subscribe-details', [FrontendController::class, 'subscribeDetails'])->name('frontend.subscribe_details');

//Event Ajax
Route::get('/event-category-show-ajax/{id}',[FrontendController::class,"getEventByCat"]);
Route::get('/event-relese-show-ajax/{id}',[FrontendController::class,"getEventRelese"]);

//blog Ajax
Route::get('/blog-category-show-ajax/{id}',[FrontendController::class,"getBlogByCat"]);
Route::get('/blog-sort-by-show-ajax/{id}',[FrontendController::class,"getBlogSortBy"]);


//Privacy Policy Page Route
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('frontend.privacy_policy');
Route::get('/refund-policy', [FrontendController::class, 'refundPolicy'])->name('frontend.refund_policy');
Route::get('/terms-conditions', [FrontendController::class, 'termsConditions'])->name('frontend.terms_conditions');
Route::get('/maestro-class', [FrontendController::class, 'maestroClass'])->name('frontend.maestro_class');
Route::get('/maestro-class-details/{id}', [FrontendController::class, 'maestroClassDetails'])->name('frontend.maestro_class_details');
Route::get('/faqs', [FrontendController::class, 'faq'])->name('frontend.faq');


//Blog Page Route
Route::get('/blogs', [FrontendController::class, 'blog'])->name('frontend.blog');
Route::get('/blog_details/{id}', [FrontendController::class, 'blogDetails'])->name('frontend.blog_details');

Route::middleware(['userCheck'])->group(function () {
Route::post('/blog_like/{id}/toggle-like', [LikeController::class, 'toggleLike'])->name('frontend.blog_like');
Route::post('/blog_commet', [CommentController::class, 'blogComment'])->name('frontend.blog_comment');
});


//Forget password and reset password route start
Route::get('forgot-password', [UserLoginController::class, 'forgotPassword'])->name('forget.password');
Route::post('forgot-password', [UserLoginController::class, 'sentMailforgotPassword'])->name('forget.send_mail_f_password');

Route::get('forgot-password/{id}', [UserLoginController::class, 'emailForgotPassword']);
Route::post('forgot-password/{id}', [UserLoginController::class, 'resetForgotPassword'])->name('reset.forgot_password');
//Forget password and reset password route end

//Admin password and reset password route start
Route::get('admin-forgot-password', [UserLoginController::class, 'adminForgotPassword'])->name('admin.forget.password');
Route::get('admin-forgot-password/{id}', [UserLoginController::class, 'emailAdminForgotPassword']);
Route::post('admin-forgot-password/{id}', [UserLoginController::class, 'resetAdminForgotPassword'])->name('admin-reset.forgot_password');
//Admin password and reset password route end

//Social Login Start Here
Route::get('auth/google', [SocialLoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/google/callback',[SocialLoginController::class, 'handleGoogleCallback']);
//facebook
Route::get('auth/facebook', [SocialLoginController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('/facebook/callback',[SocialLoginController::class, 'handleFacebookCallback']);

//Social Login End Here
Route::get('/master-course-category-show-ajax/{id}', [FrontendController::class, 'masterCourseByCatAjax']);

//Course cart routes hetre-----------
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');

// Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
 Route::get('/remove-from-cart/{id}',[CartController::class,'remove'])->name('remove.from.cart');


//  Route::get('ebookcart', [EbookCartController::class, 'cartEbook'])->name('cart');
 Route::get('add-to-ebook-cart/{id}', [EbookCartController::class, 'addToEbookCart'])->name('add.to.ebook.cart');






 Route::get('/checkout',[CartController::class,'checkout'])->name('checkout');
 Route::post('/order',[OrderController::class,'store'])->name('order');

//PayPal
Route::get('/checkout-payment', [OrderController::class, 'checkoutPayment'])->name('frontend.checkout_payment');
Route::get('/cancel-payment', [OrderController::class, 'paymentCancel'])->name('cancel.payment');
Route::get('/payment-success', [OrderController::class, 'paymentSuccess'])->name('success.payment');
Route::get('/stripe-cancel-payment', [OrderController::class, 'stripePaymentCancel'])->name('stripe.cancel.payment');
Route::get('/stripe-payment-success', [OrderController::class, 'stripePaymentSuccess'])->name('stripe.success.payment');
Route::post('/get_coupon_amount_by_code/{code}',[OrderController::class,'getCouponByCode']);

Route::middleware('auth')->group(function () {
    Route::get('/order-payment',[OrderController::class,'orderPayment'])->name('order.payment');
    Route::get('/package-payment/{type}/{id}',[OrderController::class,'orderPackagePayment'])->name('package.payment');
    Route::post('/order-payment-confirm',[OrderController::class,'orderPaymentConfirm'])->name('order.payment.confirm');
    Route::get('/order-success/{order_number}',[OrderController::class,'orderComplete'])->name('order.success');
});
//Course cart routes End-----------

//Course subscriptions cart routes hetre-----------

Route::get('course/use/subscriptions/{id}', [CourseUserSubscriptionsController::class,'CourseUseSubscriptions'])->name('course.use.subscriptions');
Route::get('course/use/subscriptions_checkout', [CourseUserSubscriptionsController::class,'CourseUseSubscriptionsCheck'])->name('user.subscriptions_checkout');
Route::get('/remove-from-cart-subscriptions/{id}',[CourseUserSubscriptionsController::class,'subscriptionsCartRemove'])->name('remove-from-cart-subscriptions');

Route::middleware(['userCheck:1'])->group(function () {
    Route::post('/package/subscription/order',[CourseUserSubscriptionsController::class,'packageSubscriptionOrder'])->name('package.subscription.order');
 });
//Course subscriptions cart routes End-----------

//event cart routes hetre-----------
Route::get('/eventcart/{id}',[EventCartController::class,'eventCart'])->name('eventcart');
Route::get('/event-chack-out',[EventCartController::class,'eventCheckOut'])->name('eventchackout');
Route::get('/remove-from-cart-event/{id}',[EventCartController::class,'eventcartremove'])->name('remove-from-cart-event');

Route::middleware(['userCheck:1'])->group(function () {
    Route::post('/order-event',[EventCartController::class,'eventCartStore'])->name('eventorder');
 });

//event cart routes End-----------

// E-book
Route::get('/e-book-list', [FrontendController::class, 'eBook'])->name('frontend.ebook_list');
Route::get('/e-book-details/{id}', [FrontendController::class, 'eBookDetails'])->name('frontend.ebook_details');
Route::get('/e-book/download/{id}', [FrontendController::class, 'eBookDownload'])->name('frontend.ebook_download');

Route::get('/e-book/video/download/{id}', [FrontendController::class, 'eBookVideoDownload'])->name('frontend.ebook_video_download');
Route::get('/e-book/audio/download/{id}', [FrontendController::class, 'eBookAudioDownload'])->name('frontend.ebook_audio_download');

Route::get('/ebook-category-show-ajax/{id}',[FrontendController::class,"getEbookByCat"]);


// E-book-audio
Route::get('/e-book-audio-list', [FrontendController::class, 'eBookAudio'])->name('frontend.ebook_audio_list');
Route::get('/e-book-details-audio/{id}', [FrontendController::class, 'eBookAudioDetails'])->name('frontend.ebook_audio_details');
//Route::get('/e-book/download/{id}', [FrontendController::class, 'eBookDownload'])->name('frontend.ebook_download');
Route::get('/e-/e-audio/download/{id}', [FrontendController::class, 'eAudioDownload'])->name('frontend.e_audio_download');

Route::get('/ebook-category-audio-show-ajax/{id}',[FrontendController::class,"getEbookAudioByCat"]);


// E-book-video
Route::get('/e-book-video-list', [FrontendController::class, 'eBookVideo'])->name('frontend.ebook_video_list');
Route::get('/e-book-details-video/{id}', [FrontendController::class, 'eBookVideoDetails'])->name('frontend.ebook_video_details');
Route::get('/e-book/e-video/download/{id}', [FrontendController::class, 'eVideoDownload'])->name('frontend.e_video_download');

Route::get('/ebook-category-video-show-ajax/{id}',[FrontendController::class,"getEbookVideoByCat"]);

// Gallery list
Route::get('gallery-list', [FrontendController::class, 'gallery'])->name('frontend.gallery_list');

//university

Route::get('continent/university/course_list/{id}', [FrontendController::class, 'continentUniversityCourseList'])->name('frontend.continent.university_course_list');
Route::get('/get-course-degree/{id}',[FrontendController::class,"getCourseDegree"]);

Route::get('country/university/course_list/{id}', [FrontendController::class, 'countryUniversityCourseList'])->name('frontend.country.university_course_list');

Route::get('state/university/course_list/{id}', [FrontendController::class, 'stateUniversityCourseList'])->name('frontend.state.university_course_list');

Route::get('city/university/course_list/{id}', [FrontendController::class, 'cityUniversityCourseList'])->name('frontend.city.university_course_list');

Route::get('applications', [StudentApplicationController::class, 'applications'])->name('frontend.applications')->middleware(['userCheck']);

//get ajax get-sort-category-course
Route::get('/apply-cart/{id}',[StudentApplicationController::class,"applyCart"])->name('apply_cart')->middleware(['userCheck']);

Route::get('/apply-admission/{id}',[StudentApplicationController::class,"applyAdmission"])->name('apply_admission')->middleware(['userCheck']);
Route::get('/application/detail/{id}',[StudentApplicationController::class,"applicationDetails"])->name('application.details')->middleware(['userCheck']);
Route::post('/application/program/delete/{id}',[StudentApplicationController::class,"applyCartDelete"])->name('application.program.delete')->middleware(['userCheck']);

Route::post('application/personal/{id}',[StudentApplicationController::class,'applicationPersonalInfo'])->name('application.personal');
Route::post('application/home_address/{id}',[StudentApplicationController::class,'applicationHomeAddress'])->name('application.home_address');
Route::post('application/post_address/{id}',[StudentApplicationController::class,'applicationPostAddress'])->name('application.post_address');
Route::post('application/education/{id}',[StudentApplicationController::class,'applicationEducation'])->name('application.education');
Route::post('application/work_experience/{id}',[StudentApplicationController::class,'applicationWorkExperience'])->name('application.work_experience');
Route::post('application/family_finance/{id}',[StudentApplicationController::class,'applicationFamilyFinance'])->name('application.family_finance');
Route::post('application/optional_service/{id}',[StudentApplicationController::class,'applicationOptionalService'])->name('application.optional_service');
Route::post('add-attachment/upload/{id}',[StudentApplicationController::class,'applicationAttachmentUpload'])->name('application.add-attachment.upload');
Route::get('get-attachments/{id}',[StudentApplicationController::class,'applicationGetAttachments'])->name('application.get-attachments');
Route::post('attachment/download/{id}',[StudentApplicationController::class,'attachmentDownload'])->name('application.attachments.download');
Route::post('attachment/delete/{id}',[StudentApplicationController::class,'attachmentDelete'])->name('application.attachment.delete');
Route::post('application/submit/{id}',[StudentApplicationController::class,'submitAppliction'])->name('application.submit_appliction');


//Route::get('/get-document_on_change/{id}',[FrontendController::class,"getContinentCourse"]);
Route::get('/get-document_on_change/{id}',[FrontendController::class,"getContinentCourse"]);


//university  Course list
Route::get('course_list', [FrontendController::class, 'universityCourseList'])->name('frontend.university_course_list');
Route::get('/get-sort-course-list/{cat}',[FrontendController::class,"getAjaxCourseList"]);
Route::get('ajax-course-filter', [FrontendController::class,"ajaxFilterCourse"])->name('frontend.ajax_course_filter');
Route::get('university-program-details/{id}', [FrontendController::class,"programDetails"])->name('frontend.university_program_details');

// class list details
Route::get('class_details/{id}', [FrontendController::class,"classDetails"])->name('frontend.class_details');

});


// Route::get('index_exam_result', [InstructorCourseController::class,"indexResultExam"])->name('instructor.exam_result.index');
// Route::get('create_exam_result', [InstructorCourseController::class,"createResultExam"])->name('instructor.exam_result.create');
// Route::get('edit_exam_result/{id}', [InstructorCourseController::class,"editResultExam"])->name('instructor.exam_result.edit');
// Route::post('update_exam_result/{id}', [InstructorCourseController::class,"updateResultExam"])->name('instructor.exam_result.update');
// Route::get('get/teacher_assent_subject/{id}', [InstructorCourseController::class, 'getTeacherAssentSubject']);
// Route::get('get/teacher_assent_school_section/{id}', [InstructorCourseController::class, 'getTeacherAssentSchoolSection']);
// Route::get('/get-teacher_assent_result', [InstructorCourseController::class, 'getTeacherAssentResult'])->name('get.teacher_assent_result');
// Route::get('get/teacher_assent_session/{id}', [InstructorCourseController::class, 'getTeacherAssentSession']);
