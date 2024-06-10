<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\School_management\Academic_year\AcademicYearController;
use App\Http\Controllers\Backend\School_management\Admission\AdmissionController;
use App\Http\Controllers\Backend\School_management\Batch\BatchController;
use App\Http\Controllers\Backend\School_management\Bulding\BuldingController;
use App\Http\Controllers\Backend\School_management\Class\ClassController;
use App\Http\Controllers\Backend\School_management\Examination\ExaminationController;
use App\Http\Controllers\Backend\School_management\Fee\FeeController;
use App\Http\Controllers\Backend\School_management\Fee\FeeManagementController;
use App\Http\Controllers\Backend\School_management\Floor\FloorController;
use App\Http\Controllers\Backend\School_management\Group\GroupController;
use App\Http\Controllers\Backend\School_management\Notice\NoticeController;
use App\Http\Controllers\Backend\School_management\Notice\NoticeTypeController;
use App\Http\Controllers\Backend\School_management\Gallery\GalleryController;
use App\Http\Controllers\Backend\School_management\Room\RoomController;
use App\Http\Controllers\Backend\School_management\Section\SchoolSectionController;
use App\Http\Controllers\Backend\School_management\Subject\SubjectController;
use App\Http\Controllers\Backend\School_management\ClassDuration\ClassDurationController;
use App\Http\Controllers\Backend\School_management\ExamType\ExamTypeController;
use App\Http\Controllers\Backend\School_management\ExamSchedules\ExamSchedulesController;
use App\Http\Controllers\Backend\School_management\ExamRoutine\ExamRoutineController;
use App\Http\Controllers\Backend\School_management\ExamClass\ExamClassController;
use App\Http\Controllers\Backend\School_management\Result\ExamResultController;
use App\Http\Controllers\Backend\School_management\Routine\ClassRoutineController;
use App\Http\Controllers\Backend\School_management\Session\SessionController;
use App\Http\Controllers\Backend\School_management\SubjectTeacherAssent\SubjectTeacherAssentController;
use App\Http\Controllers\Backend\School_management\Admit\AdmitController;
use App\Http\Controllers\Backend\School_management\Alumni\AlumniController;
use App\Http\Controllers\Backend\School_management\Id_card\IdCardController;
use App\Http\Controllers\Backend\School_management\Marksheet\MarksheetController;
use App\Http\Controllers\Backend\School_management\DailyClass\DailyClassController;
use App\Http\Controllers\Backend\School_management\Lession\LessionController;
use App\Http\Controllers\Backend\School_management\Syllabus\SyllabusController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\School_management\Admission\AdmissionController as AdmissionAdmissionController;

//Add Class for admin
Route::prefix('class')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [ClassController::class,"index"])->name('admin.class.index');
    Route::get('create', [ClassController::class,"create"])->name('admin.class.create');
    Route::post('store', [ClassController::class,"store"])->name('admin.class.store');
    Route::get('edit/{id}', [ClassController::class,"edit"])->name('admin.class.edit');
    Route::post('update/{id}', [ClassController::class,"update"])->name('admin.class.update');
    Route::post('delete', [ClassController::class,"destroy"])->name('admin.class.delete');
    Route::get('/status/{id}', [ClassController::class, 'status'])->name('admin.class.status');
});

//Add Class for admin
Route::prefix('class_duration')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [ClassDurationController::class,"index"])->name('admin.class_duration.index');
    Route::get('create', [ClassDurationController::class,"create"])->name('admin.class_duration.create');
    Route::post('store', [ClassDurationController::class,"store"])->name('admin.class_duration.store');
    Route::get('edit/{id}', [ClassDurationController::class,"edit"])->name('admin.class_duration.edit');
    Route::post('update/{id}', [ClassDurationController::class,"update"])->name('admin.class_duration.update');
    Route::post('delete', [ClassDurationController::class,"destroy"])->name('admin.class_duration.delete');
    Route::get('/status/{id}', [ClassDurationController::class, 'status'])->name('admin.class_duration.status');
});


//Add subject_teacher_assent
Route::prefix('subject_teacher_assent')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [SubjectTeacherAssentController::class,"index"])->name('admin.subject_teacher_assent.index');
    Route::get('create', [SubjectTeacherAssentController::class,"create"])->name('admin.subject_teacher_assent.create');
    Route::post('store', [SubjectTeacherAssentController::class,"store"])->name('admin.subject_teacher_assent.store');
    Route::get('edit/{id}', [SubjectTeacherAssentController::class,"edit"])->name('admin.subject_teacher_assent.edit');
    Route::post('update/{id}', [SubjectTeacherAssentController::class,"update"])->name('admin.subject_teacher_assent.update');
    Route::post('delete', [SubjectTeacherAssentController::class,"destroy"])->name('admin.subject_teacher_assent.delete');
    Route::get('/status/{id}', [SubjectTeacherAssentController::class, 'status'])->name('admin.subject_teacher_assent.status');
});


//Add Subject for admin
Route::prefix('subject')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [SubjectController::class,"index"])->name('admin.subject.index');
    Route::get('create', [SubjectController::class,"create"])->name('admin.subject.create');
    Route::post('store', [SubjectController::class,"store"])->name('admin.subject.store');
    Route::get('edit/{id}', [SubjectController::class,"edit"])->name('admin.subject.edit');
    Route::post('update/{id}', [SubjectController::class,"update"])->name('admin.subject.update');
    Route::post('delete', [SubjectController::class,"destroy"])->name('admin.subject.delete');
    Route::get('/status/{id}', [SubjectController::class, 'status'])->name('admin.subject.status');
});

//Add lession for admin
Route::prefix('lession')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [LessionController::class,"index"])->name('admin.lession.index');
    Route::get('create', [LessionController::class,"create"])->name('admin.lession.create');
    Route::post('store', [LessionController::class,"store"])->name('admin.lession.store');
    Route::get('edit/{id}', [LessionController::class,"edit"])->name('admin.lession.edit');
    Route::post('update/{id}', [LessionController::class,"update"])->name('admin.lession.update');
    Route::post('delete', [LessionController::class,"destroy"])->name('admin.lession.delete');
    Route::get('/status/{id}', [LessionController::class, 'status'])->name('admin.lession.status');
});

//Add syllabus for admin
Route::prefix('syllabus')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [SyllabusController::class,"index"])->name('admin.syllabus.index');
    Route::get('create', [SyllabusController::class,"create"])->name('admin.syllabus.create');
    Route::post('store', [SyllabusController::class,"store"])->name('admin.syllabus.store');
    Route::get('edit/{id}', [SyllabusController::class,"edit"])->name('admin.syllabus.edit');
    Route::post('update/{id}', [SyllabusController::class,"update"])->name('admin.syllabus.update');
    Route::post('delete', [SyllabusController::class,"destroy"])->name('admin.syllabus.delete');
    Route::get('/status/{id}', [SyllabusController::class, 'status'])->name('admin.syllabus.status');
    
    Route::get('/syllabus/download', [SyllabusController::class, 'syllabusDownload'])->name('admin.syllabus_download');
});

//Add group for admin
Route::prefix('group')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [GroupController::class,"index"])->name('admin.group.index');
    Route::get('create', [GroupController::class,"create"])->name('admin.group.create');
    Route::post('store', [GroupController::class,"store"])->name('admin.group.store');
    Route::get('edit/{id}', [GroupController::class,"edit"])->name('admin.group.edit');
    Route::post('update/{id}', [GroupController::class,"update"])->name('admin.group.update');
    Route::post('delete', [GroupController::class,"destroy"])->name('admin.group.delete');
    Route::get('/status/{id}', [GroupController::class, 'status'])->name('admin.group.status');
});

//Add year for admin
Route::prefix('academic-year')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [AcademicYearController::class,"index"])->name('admin.academic_year.index');
    Route::get('create', [AcademicYearController::class,"create"])->name('admin.academic_year.create');
    Route::post('store', [AcademicYearController::class,"store"])->name('admin.academic_year.store');
    Route::get('edit/{id}', [AcademicYearController::class,"edit"])->name('admin.academic_year.edit');
    Route::post('update/{id}', [AcademicYearController::class,"update"])->name('admin.academic_year.update');
    Route::post('delete', [AcademicYearController::class,"destroy"])->name('admin.academic_year.delete');
    Route::get('/status/{id}', [AcademicYearController::class, 'status'])->name('admin.academic_year.status');
    Route::post('/updateCurrent', [AcademicYearController::class, 'updateCurrent'])->name('admin.academic_year.updateCurrent');
});


//Add Session for admin
Route::prefix('session')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [SessionController::class,"index"])->name('admin.session.index');
    Route::get('create', [SessionController::class,"create"])->name('admin.session.create');
    Route::post('store', [SessionController::class,"store"])->name('admin.session.store');
    Route::get('edit/{id}', [SessionController::class,"edit"])->name('admin.session.edit');
    Route::post('update/{id}', [SessionController::class,"update"])->name('admin.session.update');
    Route::post('delete', [SessionController::class,"destroy"])->name('admin.session.delete');
    Route::get('/status/{id}', [SessionController::class, 'status'])->name('admin.session.status');
    Route::post('/updateCurrent', [SessionController::class, 'updateCurrent'])->name('admin.session.updateCurrent');
});


//Add Bulding for admin
Route::prefix('bulding')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [BuldingController::class,"index"])->name('admin.bulding.index');
    Route::post('ajax-bulding', [BuldingController::class,"ajaxData"])->name('admin.bulding.ajax');
    Route::get('create', [BuldingController::class,"create"])->name('admin.bulding.create');
    Route::post('store', [BuldingController::class,"store"])->name('admin.bulding.store');
    Route::get('edit/{id}', [BuldingController::class,"edit"])->name('admin.bulding.edit');
    Route::post('update/{id}', [BuldingController::class,"update"])->name('admin.bulding.update');
    Route::post('delete', [BuldingController::class,"destroy"])->name('admin.bulding.delete');
    Route::get('/status/{id}', [BuldingController::class, 'status'])->name('admin.bulding.status');
});

//Add floor for admin
Route::prefix('floor')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [FloorController::class,"index"])->name('admin.floor.index');
    Route::post('ajax-floor', [FloorController::class,"ajaxData"])->name('admin.floor.ajax');
    Route::get('create', [FloorController::class,"create"])->name('admin.floor.create');
    Route::post('store', [FloorController::class,"store"])->name('admin.floor.store');
    Route::get('edit/{id}', [FloorController::class,"edit"])->name('admin.floor.edit');
    Route::post('update/{id}', [FloorController::class,"update"])->name('admin.floor.update');
    Route::post('delete', [FloorController::class,"destroy"])->name('admin.floor.delete');
    Route::get('/status/{id}', [FloorController::class, 'status'])->name('admin.floor.status');
});

//Add room for admin
Route::prefix('room')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [RoomController::class,"index"])->name('admin.room.index');
    Route::get('create', [RoomController::class,"create"])->name('admin.room.create');
    Route::post('store', [RoomController::class,"store"])->name('admin.room.store');
    Route::get('edit/{id}', [RoomController::class,"edit"])->name('admin.room.edit');
    Route::post('update/{id}', [RoomController::class,"update"])->name('admin.room.update');
    Route::post('delete', [RoomController::class,"destroy"])->name('admin.room.delete');
    Route::get('/status/{id}', [RoomController::class, 'status'])->name('admin.room.status');
});

//Add school-section for admin
Route::prefix('school-section')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [SchoolSectionController::class,"index"])->name('admin.school_section.index');
    Route::get('create', [SchoolSectionController::class,"create"])->name('admin.school_section.create');
    Route::post('store', [SchoolSectionController::class,"store"])->name('admin.school_section.store');
    Route::get('edit/{id}', [SchoolSectionController::class,"edit"])->name('admin.school_section.edit');
    Route::post('update/{id}', [SchoolSectionController::class,"update"])->name('admin.school_section.update');
    Route::post('delete', [SchoolSectionController::class,"destroy"])->name('admin.school_section.delete');
    Route::get('/status/{id}', [SchoolSectionController::class, 'status'])->name('admin.school_section.status');
});


//Add Examination for admin
Route::prefix('examination')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [ExaminationController::class,"index"])->name('admin.examination.index');
    Route::get('create', [ExaminationController::class,"create"])->name('admin.examination.create');
    Route::post('store', [ExaminationController::class,"store"])->name('admin.examination.store');
    Route::get('edit/{id}', [ExaminationController::class,"edit"])->name('admin.examination.edit');
    Route::post('update/{id}', [ExaminationController::class,"update"])->name('admin.examination.update');
    Route::post('delete', [ExaminationController::class,"destroy"])->name('admin.examination.delete');
    Route::get('/status/{id}', [ExaminationController::class, 'status'])->name('admin.examination.status');
    Route::get('publish', [ExaminationController::class,"publish"])->name('admin.examination.publish');
});

//-----------------------------exam type Route start---------------------------//
Route::prefix('examtype')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Add examtype for admin
    Route::get('index', [ExamTypeController::class,"index"])->name('admin.examtype.index');
    Route::get('create', [ExamTypeController::class,"create"])->name('admin.examtype.create');
    Route::post('store', [ExamTypeController::class,"store"])->name('admin.examtype.store');
    Route::get('edit/{id}', [ExamTypeController::class,"edit"])->name('admin.examtype.edit');
    Route::post('update/{id}', [ExamTypeController::class,"update"])->name('admin.examtype.update');
    Route::post('delete', [ExamTypeController::class,"destroy"])->name('admin.examtype.delete');
    Route::get('/status/{id}', [ExamTypeController::class, 'status'])->name('admin.examtype.status');
});
//-----------------------------exam type Route End---------------------------//

//-----------------------------Exam class Route Start---------------------------//
Route::prefix('examclass')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [ExamClassController::class,"index"])->name('admin.examclass.index');
    Route::get('create', [ExamClassController::class,"create"])->name('admin.examclass.create');
    Route::post('store', [ExamClassController::class,"store"])->name('admin.examclass.store');
    Route::get('edit/{id}', [ExamClassController::class,"edit"])->name('admin.examclass.edit');
    Route::post('update/{id}', [ExamClassController::class,"update"])->name('admin.examclass.update');
    Route::post('delete', [ExamClassController::class,"destroy"])->name('admin.examclass.delete');
    Route::get('/status/{id}', [ExamClassController::class,"status"])->name('admin.examclass.status');
});
//-----------------------------Exam class Route end---------------------------//


//-----------------------------Exam  Schedules class Route Start---------------------------//
Route::prefix('examschedule')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [ExamSchedulesController::class,"index"])->name('admin.examschedule.index');
    Route::get('create', [ExamSchedulesController::class,"create"])->name('admin.examschedule.create');
    Route::post('store', [ExamSchedulesController::class,"store"])->name('admin.examschedule.store');
    Route::get('edit/{id}', [ExamSchedulesController::class,"edit"])->name('admin.examschedule.edit');
    Route::post('update/{id}', [ExamSchedulesController::class,"update"])->name('admin.examschedule.update');
    Route::post('delete', [ExamSchedulesController::class,"destroy"])->name('admin.examschedule.delete');
    Route::get('/status/{id}', [ExamSchedulesController::class,"status"])->name('admin.examschedule.status');
});
//-----------------------------Exam  Schedules class Route end---------------------------//

//-----------------------------Exam  routine  Route Start---------------------------//
Route::prefix('examroutine')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [ExamRoutineController::class,"index"])->name('admin.examroutine.index');
    Route::get('print', [ExamRoutineController::class,"print"])->name('admin.examroutine.print');
    // Route::get('create', [ExamRoutineController::class,"create"])->name('admin.examroutine.create');
    // Route::post('store', [ExamRoutineController::class,"store"])->name('admin.examroutine.store');
    // Route::get('edit/{id}', [ExamRoutineController::class,"edit"])->name('admin.examroutine.edit');
    // Route::post('update/{id}', [ExamRoutineController::class,"update"])->name('admin.examroutine.update');
    // Route::post('delete', [ExamRoutineController::class,"destroy"])->name('admin.examroutine.delete');
    // Route::get('/status/{id}', [ExamRoutineController::class,"status"])->name('admin.examroutine.status');
});
//-----------------------------Exam routine  Route end---------------------------//

//-----------------------------routine Route start---------------------------//
Route::prefix('classroutine')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Add classroutine for admin
    Route::get('index', [ClassRoutineController::class,"index"])->name('admin.routine.index');
    Route::get('create', [ClassRoutineController::class,"create"])->name('admin.routine.create');
    Route::post('store', [ClassRoutineController::class,"store"])->name('admin.routine.store');
    Route::get('edit/{id}', [ClassRoutineController::class,"edit"])->name('admin.routine.edit');
    Route::post('update/{id}', [ClassRoutineController::class,"update"])->name('admin.routine.update');
    Route::post('delete', [ClassRoutineController::class,"destroy"])->name('admin.routine.delete');
    Route::get('/status/{id}', [ClassRoutineController::class, 'status'])->name('admin.routine.status');
    Route::get('details/{id}', [ClassRoutineController::class,"details"])->name('admin.routine.details');
    // Route::get('print/{id}', [ClassRoutineController::class,"print"])->name('admin.routine.print');
    Route::get('print', [ClassRoutineController::class,"print"])->name('admin.routine.print');
});
//-----------------------------routine Route End---------------------------//
//-----------------------------Exam Route Start---------------------------//
// Route::get('all-exam-routine', [ExamSchedulesController::class,"allExam"])->name('allExam');
// Route::post('exam-details-routine', [ExamSchedulesController::class,"examDetails"])->name('examDetails');
// Route::get('add-exam-routine', [ExamSchedulesController::class,"addExam"])->name('addExam');
// Route::post('store-exam-routine', [ExamSchedulesController::class,"storeExam"])->name('storeExam');
// Route::get('show-exam-routine', [ExamSchedulesController::class,"show"])->name('show');
// Route::get('edit-exam-routine/{id}', [ExamSchedulesController::class,"edit"])->name('editExam');
// Route::post('/update-exam-routine/{id}', [ExamSchedulesController::class,"update"])->name('updateExam');
// Route::post('delete-exam-routine', [ExamSchedulesController::class,"destroy"])->name('deleteExam');
// Route::get('print-exam-routine/{id}', [ExamSchedulesController::class,"print"])->name('admin.exam.print');

//Add notice type for admin
Route::prefix('notice_type')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [NoticeTypeController::class,"index"])->name('admin.notice_type.index');
    Route::get('create', [NoticeTypeController::class,"create"])->name('admin.notice_type.create');
    Route::post('store', [NoticeTypeController::class,"store"])->name('admin.notice_type.store');
    Route::get('edit/{id}', [NoticeTypeController::class,"edit"])->name('admin.notice_type.edit');
    Route::post('update/{id}', [NoticeTypeController::class,"update"])->name('admin.notice_type.update');
    Route::post('delete', [NoticeTypeController::class,"destroy"])->name('admin.notice_type.delete');
    Route::get('/status/{id}', [NoticeTypeController::class, 'status'])->name('admin.notice_type.status');
});

//Add Notice for admin
Route::prefix('notice')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [NoticeController::class,"index"])->name('admin.notice.index');
    Route::get('create', [NoticeController::class,"create"])->name('admin.notice.create');
    Route::post('store', [NoticeController::class,"store"])->name('admin.notice.store');
    Route::get('edit/{id}', [NoticeController::class,"edit"])->name('admin.notice.edit');
    Route::post('update/{id}', [NoticeController::class,"update"])->name('admin.notice.update');
    Route::post('delete', [NoticeController::class,"destroy"])->name('admin.notice.delete');
    Route::get('/status/{id}', [NoticeController::class, 'status'])->name('admin.notice.status');
});

//Add Gallery for admin 
Route::prefix('gallery')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [GalleryController::class,"index"])->name('admin.gallery.index');
    Route::get('create', [GalleryController::class,"create"])->name('admin.gallery.create');
    Route::post('store', [GalleryController::class,"store"])->name('admin.gallery.store');
    Route::get('edit/{id}', [GalleryController::class,"edit"])->name('admin.gallery.edit');
    Route::post('update/{id}', [GalleryController::class,"update"])->name('admin.gallery.update');
    Route::post('delete', [GalleryController::class,"destroy"])->name('admin.gallery.delete');
    Route::get('/status/{id}', [GalleryController::class, 'status'])->name('admin.gallery.status');
});

//Add Fee for admin
Route::prefix('fee')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [FeeController::class,"index"])->name('admin.fee.index');
    Route::get('create', [FeeController::class,"create"])->name('admin.fee.create');
    Route::post('store', [FeeController::class,"store"])->name('admin.fee.store');
    Route::get('edit/{id}', [FeeController::class,"edit"])->name('admin.fee.edit');
    Route::post('update/{id}', [FeeController::class,"update"])->name('admin.fee.update');
    Route::post('delete', [FeeController::class,"destroy"])->name('admin.fee.delete');
    Route::get('/status/{id}', [FeeController::class, 'status'])->name('admin.fee.status');
});

//Add Fee Management for admin
Route::prefix('fee-management')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [FeeManagementController::class,"index"])->name('admin.fee_management.index');
    Route::get('create', [FeeManagementController::class,"create"])->name('admin.fee_management.create');
    Route::post('store', [FeeManagementController::class,"store"])->name('admin.fee_management.store');
    Route::get('edit/{id}', [FeeManagementController::class,"edit"])->name('admin.fee_management.edit');
    Route::post('update/{id}', [FeeManagementController::class,"update"])->name('admin.fee_management.update');
    Route::post('delete', [FeeManagementController::class,"destroy"])->name('admin.fee_management.delete');
    Route::get('/status/{id}', [FeeManagementController::class, 'status'])->name('admin.fee_management.status');
});

Route::prefix('daily_class')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //Course Create
     Route::get('index', [DailyClassController::class,"index"])->name('admin.daily_class.index');
     Route::get('create', [DailyClassController::class,"create"])->name('admin.daily_class.create');
     Route::post('store', [DailyClassController::class,"store"])->name('admin.daily_class.store');
     Route::get('edit/{id}', [DailyClassController::class,"edit"])->name('admin.daily_class.edit');
     Route::post('update/{id}', [DailyClassController::class,"update"])->name('admin.daily_class.update');
     Route::post('delete', [DailyClassController::class,"destroy"])->name('admin.daily_class.delete');
     Route::get('/status/{id}', [DailyClassController::class, 'status'])->name('admin.daily_class.status');

});


//Add Alumni for admin
Route::prefix('alumni')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [AlumniController::class,"index"])->name('admin.alumni.index');
    Route::get('create', [AlumniController::class,"create"])->name('admin.alumni.create');
    Route::post('store', [AlumniController::class,"store"])->name('admin.alumni.store');
    Route::get('edit/{id}', [AlumniController::class,"edit"])->name('admin.alumni.edit');
    Route::post('update/{id}', [AlumniController::class,"update"])->name('admin.alumni.update');
    Route::post('delete', [AlumniController::class,"destroy"])->name('admin.alumni.delete');
    Route::get('/status/{id}', [AlumniController::class, 'status'])->name('admin.alumni.status');

    Route::post('alumni-change-password', [AlumniController::class,"changePassword"])->name('admin.alumni_change_password');

    Route::get('requested-alumni', [AlumniController::class,"requestedAlumni"])->name('admin.requested_alumni.index');
    Route::get('/alumni-status/{id}', [AlumniController::class, 'alumniStatus'])->name('admin.requested_alumni.status');
});











//Add Batch for admin
Route::prefix('batch')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [BatchController::class,"index"])->name('admin.batch.index');
    Route::get('create', [BatchController::class,"create"])->name('admin.batch.create');
    Route::post('store', [BatchController::class,"store"])->name('admin.batch.store');
    Route::get('details/{id}', [BatchController::class,"details"])->name('admin.batch.details');
    Route::get('edit/{id}', [BatchController::class,"edit"])->name('admin.batch.edit');
    Route::post('update/{id}', [BatchController::class,"update"])->name('admin.batch.update');
    Route::get('delete/{id}', [BatchController::class,"destroy"])->name('admin.batch.delete');
    Route::get('/status/{id}', [BatchController::class, 'status'])->name('admin.batch.status');
});









//Admin Admit Card Make
Route::prefix('admit')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('create', [AdmitController::class,"create"])->name('admin.admit.create');
    Route::post('show', [AdmitController::class,"show"])->name('admin.admit.show');
});

//Admin Marksheet Make
Route::prefix('marksheet')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('create', [MarksheetController::class,"create"])->name('admin.marksheet.create');
    Route::post('show', [MarksheetController::class,"show"])->name('admin.marksheet.show');
});

//Admin ID Card Make
Route::prefix('id-card')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('create', [IdCardController::class,"create"])->name('admin.id_card.create');
    Route::post('show', [IdCardController::class,"show"])->name('admin.id_card.show');
});

//Add Admission for admin
Route::prefix('admission')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [AdmissionController::class,"index"])->name('admin.admission.index');
    Route::get('create', [AdmissionController::class,"create"])->name('admin.admission.create');
    Route::post('store', [AdmissionController::class,"store"])->name('admin.admission.store');
    Route::get('details/{id}', [AdmissionController::class,"details"])->name('admin.admission.details');
    Route::get('edit/{id}', [AdmissionController::class,"edit"])->name('admin.admission.edit');
    Route::post('update/{id}', [AdmissionController::class,"update"])->name('admin.admission.update');
    Route::post('delete', [AdmissionController::class,"destroy"])->name('admin.admission.delete');
    Route::get('/status/{id}', [AdmissionController::class, 'status'])->name('admin.admission.status');
    Route::post('/approve/{id}', [AdmissionController::class, 'approve'])->name('admin.admission.approve');

    Route::get('/admission/doc/download/{id}', [AdmissionController::class, 'certificateDownload'])->name('admin.admission.download');
});
Route::post('/get-admission-by-ajax', [AdmissionController::class, 'getAdmissionByAjax'])->name('admin.admission.ajax');






//Add Admission for admin
Route::prefix('manage-result')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('index', [ExamResultController::class,"index"])->name('admin.exam_result.index');
    // Route::get('create', [ExamResultController::class,"create"])->name('admin.admission.create');
    // Route::post('store', [ExamResultController::class,"store"])->name('admin.admission.store');
    // Route::get('details/{id}', [ExamResultController::class,"details"])->name('admin.exam_result.details');
    Route::get('edit/{id}', [ExamResultController::class,"edit"])->name('admin.exam_result.edit');
    Route::post('update/{id}', [ExamResultController::class,"update"])->name('admin.exam_result.update');
    // Route::post('delete', [ExamResultController::class,"destroy"])->name('admin.exam_result.delete');
    Route::get('/status/{id}', [ExamResultController::class, 'status'])->name('admin.exam_result.status');
    Route::post('/published/{id}', [ExamResultController::class, 'publish'])->name('admin.exam_result.publish');

    // Route::get('/admission/doc/download/{id}', [AdmissionController::class, 'certificateDownload'])->name('admin.admission.download');
});


    Route::post('/exam-result-manage-ajax', [ExamResultController::class, 'getResultByAjax'])->name('admin.getResultByAjax');





// -------------------------------------
//Add Admission for Student
// Route::prefix('admission')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    Route::get('admission', [AdmissionAdmissionController::class,"studentAdmission"])->name('frontend.student_admission');
    Route::post('store', [AdmissionAdmissionController::class,"store"])->name('frontend.student_admission.store');
    Route::get('details/{id}', [AdmissionAdmissionController::class,"details"])->name('frontend.student_admission.details');
    Route::get('edit/{id}', [AdmissionAdmissionController::class,"edit"])->name('frontend.student_admission.edit');
    Route::post('update/{id}', [AdmissionAdmissionController::class,"update"])->name('frontend.student_admission.update');
    Route::get('print/{id}', [AdmissionAdmissionController::class,"print"])->name('frontend.student_admission.print');
    Route::get('download/{id}', [AdmissionAdmissionController::class,"download"])->name('frontend.student_admission.download');
    



    // Route::post('delete', [AdmissionAdmissionController::class,"destroy"])->name('admin.admission.delete');
    // Route::get('/status/{id}', [AdmissionAdmissionController::class, 'status'])->name('admin.admission.status');
// });
















Route::get('/get/group/{id}', [AdmissionController::class, 'getGroup']);
Route::get('/get/fee_management/{id}', [AdmissionController::class, 'getFees']);
Route::get('/get/school_section/{id}', [AdmissionController::class, 'schoolSection']);
Route::get('/get/floor/{id}', [ExamSchedulesController::class, 'getFloor']);
Route::get('/get/room/{id}', [ExamSchedulesController::class, 'getRoom']);
Route::get('/get/subject/{id}', [ExamSchedulesController::class, 'getSubject']);
Route::get('/get/lession/{id}', [ExamSchedulesController::class, 'getLession']);
Route::get('/get/exam-class-subject/{examinationId}/{classExamId}', [ExamSchedulesController::class, 'examClassSubject']);

Route::get('/get/examination_class/{id}', [ExamSchedulesController::class, 'getExaminationClass']);


Route::get('/get-exam-routine/{id}',[ExamRoutineController::class,"getExamRoutine"]);
// Route::get('/get-search-student-routine', [ClassRoutineController::class, 'getSearchStudentRoutine']);

Route::get('/get-class-routine', [ClassRoutineController::class, 'getClassRoutine'])->name('get.class.routine');
//Syllabus
Route::get('/get-syllabus', [SyllabusController::class, 'getSyllabus'])->name('get.syllabus');


Route::get('get/current_session', [FrontendController::class, 'getCurrentSession']);
