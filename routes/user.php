<?php

use App\Http\Controllers\Frontend\InstructorCourseController;
use App\Http\Controllers\Frontend\UserLoginController;
use App\Http\Controllers\User\ebook\EbookController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ebook\EbookAudioController;
use App\Http\Controllers\User\ebook\EbookVideoController;

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
Route::middleware(['accessLogin'])->group(function () {

Route::prefix('user')->middleware(['userCheck'])->group(function () {


        Route::get('/profile',[UserController::class, 'index'])->name('user.profile');
        Route::post('/profile/pic/{id}',[UserController::class, 'updateUserPic'])->name('update.user.profile.pic');
        Route::get('/profile/{id}',[UserController::class, 'editUserInfo'])->name('user.edit_profile');
        Route::post('/update/profile/{id}',[UserController::class, 'updateUserInfo'])->name('user.profile_info_update');

        Route::get('/security/{id}', [UserLoginController::class, 'getUserChangePassword'])->name('user.password');
        Route::post('/security/{id}', [UserLoginController::class, 'setChangePassword'])->name('user.password_change');
        Route::get('/security/confirm-code/{id}', [UserLoginController::class, 'getConfirmPassword'])->name('user.password_confirm');
        Route::post('/security/confirm-code/{id}', [UserLoginController::class, 'confirmChangePassword'])->name('user.password_confirm.post');

        Route::get('/wishlist', [UserController::class, 'wishlist'])->name('user.wishlist');
        Route::get('/notification', [UserController::class, 'notification'])->name('user.notification');
        Route::get('/privacy', [UserController::class, 'privacy'])->name('privacy');
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/my-course', [UserController::class, 'myCourseList'])->name('user.my_course');
        Route::get('/my-course-list', [UserController::class, 'myOrderList'])->name('user.my_order');
        Route::get('/my-order-list', [UserController::class, 'myOrder'])->name('user.order_list');
        Route::get('/my-order-details/{id}', [UserController::class, 'myOrderDetails'])->name('user.order_details');
        Route::get('/my-order-print/{id}', [UserController::class, 'myOrderPrint'])->name('user.order_print');
        Route::get('/my-event', [UserController::class, 'myEventList'])->name('user.my_event');
        Route::get('/my-package', [UserController::class, 'myPackageList'])->name('user.my_package');
        Route::get('/student-exam_result', [UserController::class, 'studentExamResult'])->name('student.exam_result');




        //Teacher course Create
        Route::get('/manage-course', [InstructorCourseController::class, 'manageCourse'])->name('instructor.manage_course');
        Route::get('/add-course', [InstructorCourseController::class, 'addCourse'])->name('instructor.add_course');
        Route::post('/stor-course', [InstructorCourseController::class, 'storCourse'])->name('instructor.stor_course');
        Route::get('/edit-course/{id}', [InstructorCourseController::class, 'editCourse'])->name('instructor.edit_course');
        Route::post('/update-course/{id}', [InstructorCourseController::class, 'updateCourse'])->name('instructor.update_course');
        Route::post('/delete-course', [InstructorCourseController::class, 'deleteCourse'])->name('instructor.delete_course');

         //Teacher home work
        Route::get('index_home_work', [InstructorCourseController::class,"indexHomeWork"])->name('instructor.homework.index');
        Route::get('create_home_work', [InstructorCourseController::class,"createHomeWork"])->name('instructor.homework.create');
        Route::post('store_home_work', [InstructorCourseController::class,"storeHomeWork"])->name('instructor.homework.store');
        Route::get('edit_home_work/{id}', [InstructorCourseController::class,"editHomeWork"])->name('instructor.homework.edit');
        Route::post('update_home_work/{id}', [InstructorCourseController::class,"updateHomeWork"])->name('instructor.homework.update');
        Route::post('delete_home_work', [InstructorCourseController::class,"destroyHomeWork"])->name('instructor.homework.delete');
        Route::get('/status_home_work/{id}', [InstructorCourseController::class, 'statusHomeWork'])->name('instructor.homework.status');

         //Teacher class exam
        Route::get('index_class_exam', [InstructorCourseController::class,"indexClassExam"])->name('instructor.class_exam.index');
        Route::get('create_class_exam', [InstructorCourseController::class,"createClassExam"])->name('instructor.class_exam.create');
        Route::post('store_class_exam', [InstructorCourseController::class,"storeClassExam"])->name('instructor.class_exam.store');
        Route::get('edit_class_exam/{id}', [InstructorCourseController::class,"editClassExam"])->name('instructor.class_exam.edit');
        Route::post('update_class_exam/{id}', [InstructorCourseController::class,"updateClassExam"])->name('instructor.class_exam.update');
        Route::post('delete_class_exam', [InstructorCourseController::class,"destroyClassExam"])->name('instructor.class_exam.delete');
        Route::get('/status_class_exam/{id}', [InstructorCourseController::class, 'statusClassExam'])->name('instructor.class_exam.status');

        Route::post('/student_result_store', [InstructorCourseController::class, 'storeStudentResult'])->name('instructor.student_result_store');

        // Result Exam
        Route::get('index_exam_result', [InstructorCourseController::class,"indexResultExam"])->name('instructor.exam_result.index');
        Route::get('create_exam_result', [InstructorCourseController::class,"createResultExam"])->name('instructor.exam_result.create');
        Route::get('edit_exam_result/{id}', [InstructorCourseController::class,"editResultExam"])->name('instructor.exam_result.edit');
        Route::post('update_exam_result/{id}', [InstructorCourseController::class,"updateResultExam"])->name('instructor.exam_result.update');

        


        //E-book Route
        Route::get('/manage-e-book', [EbookController::class, 'manageEbook'])->name('frontend.manage_ebook');
        Route::get('/add-e-book', [EbookController::class, 'addEbook'])->name('frontend.add_ebook');
        Route::post('/stor-e-book', [EbookController::class, 'storEbook'])->name('frontend.stor_ebook');
        Route::get('/edit-e-book/{id}', [EbookController::class, 'editEbook'])->name('frontend.edit_ebook');
        Route::post('/update-e-book/{id}', [EbookController::class, 'updateEbook'])->name('frontend.update_ebook');
        Route::post('/delete-e-book', [EbookController::class, 'deleteEbook'])->name('frontend.delete_ebook');

        //E-book Route
        Route::get('/manage-e-audio-book', [EbookAudioController::class, 'manageEbookAudio'])->name('frontend.manage_ebook_audio');
        Route::get('/add-e-audio-book', [EbookAudioController::class, 'addEbookAudio'])->name('frontend.add_ebook_audio');
        Route::post('/stor-e-audio-book', [EbookAudioController::class, 'storEbookAudio'])->name('frontend.stor_ebook_audio');
        Route::get('/edit-e-audio-book/{id}', [EbookAudioController::class, 'editEbookAudio'])->name('frontend.edit_ebook_audio');
        Route::post('/update-audio-e-book/{id}', [EbookAudioController::class, 'updateEbookAudio'])->name('frontend.update_ebook_audio');
        Route::post('/delete-audio-e-book', [EbookAudioController::class, 'deleteEbookAudio'])->name('frontend.delete_ebook_audio');

        //E-book Route
        Route::get('/manage-e-video-book', [EbookVideoController::class, 'manageEbookVideo'])->name('frontend.manage_ebook_video');
        Route::get('/add-e-video-book', [EbookVideoController::class, 'addEbookVideo'])->name('frontend.add_ebook_video');
        Route::post('/stor-e-video-book', [EbookVideoController::class, 'storEbookVideo'])->name('frontend.stor_ebook_video');
        Route::get('/edit-e-video-book/{id}', [EbookVideoController::class, 'editEbookVideo'])->name('frontend.edit_ebook_video');
        Route::post('/update-e-video-book/{id}', [EbookVideoController::class, 'updateEbookVideo'])->name('frontend.update_ebook_video');
        Route::post('/delete-e-video-book', [EbookVideoController::class, 'deleteEbookVideo'])->name('frontend.delete_ebook_video');



        //withdrawal Route
        Route::get('/manage-withdrawal', [UserController::class, 'manageWithdrawal'])->name('frontend.manage_withdrawal');
        Route::get('/create-withdrawal', [UserController::class, 'createWithdrawal'])->name('frontend.create_withdrawal');
        Route::post('/stor-withdrawal', [UserController::class, 'storWithdrawal'])->name('frontend.stor_withdrawal');
        Route::get('/edit-withdrawal/{id}', [UserController::class, 'editWithdrawal'])->name('frontend.edit_withdrawal');
        Route::post('/stor-withdrawal/{id}', [UserController::class, 'updateWithdrawal'])->name('frontend.update_withdrawal');
                
        //Consultant Student manage
        //        Route::get('/consultant-manage-student', [UserController::class, 'manageSutdent'])->name('frontend.manage_consultant_student');
        Route::get('/consultant-manage-application', [UserController::class, 'manageApplication'])->name('frontend.manage_consultant_application');
        Route::get('/consultant-application-details/{id}', [UserController::class, 'applicationDetails'])->name('frontend.application-details');
        Route::post('/consultant-application-Status/{id}', [UserController::class, 'applicationStatus'])->name('frontend.application-status');
        Route::get('/download/{id}', [UserController::class, 'applicationFileDownload'])->name('frontend.application-file-download');
        Route::get('/consultant-student-details/{id}', [UserController::class, 'studentDetails'])->name('frontend.consultant_student_details');
        Route::get('/consultant-student-details-blank/{id}', [UserController::class, 'studentDetailsBlank'])->name('frontend.consultant_student_details_blank');



        Route::get('/user-logout', [UserLoginController::class, 'userLogout'])->name('user.logout');




        Route::get('/my-application-order-list', [UserController::class, 'myApplicationOrder'])->name('user.application_order_list');
        Route::get('/my-application-order-invoice/{id}', [UserController::class, 'myApplicationOrderInvoice'])->name('user.application_order_invoice');
        Route::get('/my-application-order-details/{id}', [UserController::class, 'myApplicationOrderDetails'])->name('user.application_order_details');
        Route::post('my-application-order/delete', [UserController::class,"applicationDestroy"])->name('user.application_order_delete');

        Route::get('/my-application-order-print/{id}', [UserController::class, 'myApplicationOrderPrint'])->name('user.application_order_print');






        ///School Management route
        Route::get('/notice', [UserController::class, 'notice'])->name('notice');
        //class routine for student
        Route::get('/class-routine', [UserController::class, 'classRoutine'])->name('class_routine');
        Route::get('print-user-class-routine', [UserController::class,"classPrint"])->name('user.class_routine.print');
         //exam routine for student
        Route::get('/exam-routine', [UserController::class, 'examRoutine'])->name('exam_routine');
        Route::get('print-user-exam-routine', [UserController::class,"examPrint"])->name('user.exam_routine.print');

        //class routine for Teacher
        Route::get('/teacher-class-routine', [UserController::class, 'teacherClassRoutine'])->name('teacher.class_routine');
        Route::get('/teacher-class-routine-print', [UserController::class, 'teacherClassRoutinePrint'])->name('teacher.class_routine.print');
        //Exam routine for Teacher
        Route::get('/teacher-exam-routine', [UserController::class, 'teacherExamRoutine'])->name('teacher.exam_routine');
        Route::get('print-teacher-exam-routine', [UserController::class,"teacherExamRoutinePrint"])->name('teacher.exam_routine.print');


        //HomeWork for student
        
        Route::get('/homework', [UserController::class, 'homeWork'])->name('student.homework');
        Route::get('/homework-details/{id}', [UserController::class, 'homeWorkDetails'])->name('student.homework.details');

});



});


Route::get('/get-assign-teacher-subject/{id}', [UserController::class, 'getAssignTeacherSubject']);
Route::get('get/teacher_assent_subject/{id}', [InstructorCourseController::class, 'getTeacherAssentSubject']);
Route::get('get/teacher_assent_school_section/{id}', [InstructorCourseController::class, 'getTeacherAssentSchoolSection']);
Route::get('/get-teacher_assent_result', [InstructorCourseController::class, 'getTeacherAssentResult'])->name('get.teacher_assent_result');
Route::get('get/teacher_assent_session/{id}', [InstructorCourseController::class, 'getTeacherAssentSession']);
Route::post('/get-teacher-result-by-ajex', [InstructorCourseController::class, 'getTeacherResultByAjax'])->name('teacher.get_result_by_ajax');