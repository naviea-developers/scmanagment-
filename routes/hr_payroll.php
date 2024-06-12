<?php
use Illuminate\Support\Facades\Route;


//attendence
Route::get('/manageAttendance', 'App\Http\Controllers\Hr\EmployeeController@manageAttendance')->name('manageAttendance');
Route::post('/manageAttendance-ajax', 'App\Http\Controllers\Hr\EmployeeController@ajaxManageAttendance')->name('manageAttendance.ajax');

Route::post('/attendanceStoreIn', 'App\Http\Controllers\Hr\EmployeeController@attendanceStoreIn')->name('/attendanceStoreIn');
Route::post('/attendanceStoreOut', 'App\Http\Controllers\Hr\EmployeeController@attendanceStoreOut')->name('/attendanceStoreOut');
Route::get('/deleteAttendance/{id}', 'App\Http\Controllers\Hr\EmployeeController@deleteAttendance')->name('deleteAttendance');

//end attendance

//employee
Route::get('/select2/desig', 'App\Http\Controllers\Hr\HrController@select2Designation')->name('select2.designation');
Route::get('/select2/emp_by_desig', 'App\Http\Controllers\Hr\HrController@select2EmpDesig')->name('select2.emp_by_desig');
Route::get('/select2/emp', 'App\Http\Controllers\Hr\HrController@select2Emp')->name('select2.emp');


//salary
Route::get('/manageSalary', 'App\Http\Controllers\Hr\HrController@manageSalary')->name('manageSalary');
Route::post('/manageSalary/ajax', 'App\Http\Controllers\Hr\HrController@ajaxManageSalary')->name('manageSalary.ajax');
Route::get('/SalarySheet', 'App\Http\Controllers\Hr\HrController@SalarySheet')->name('SalarySheet');
Route::get('/addSalary', 'App\Http\Controllers\Hr\HrController@addSalary')->name('addSalary');
Route::post('/storeSalary', 'App\Http\Controllers\Hr\HrController@storeSalary')->name('storeSalary');
Route::get('/editSalary/{id}', 'App\Http\Controllers\Hr\HrController@editSalary')->name('editSalary');
Route::post('salarySheet/update', 'App\Http\Controllers\Hr\HrController@updateSalary')->name('salarySheet.update');

Route::get('/deleteSalary/{id}', 'App\Http\Controllers\Hr\HrController@deleteSalary')->name('deleteSalary');
Route::get('/salary/slip/fetch', 'App\Http\Controllers\Hr\HrController@salarySlip')->name('salary.slip.fetch');
Route::get('/emp_bank_accountbybankId', 'App\Http\Controllers\Hr\HrController@empBankAccountByBankId')->name('empbankaccount.callByBankID');
Route::get('/com_bank_accountbybankId', 'App\Http\Controllers\Hr\HrController@comBankAccountByBankId')->name('combankaccount.callByBankID');

//end salary



//shiftManage
Route::get('/shiftManage-view','App\Http\Controllers\Hr\shiftManageController@view')->name('shiftManage.view');
Route::post('/shiftManage-ajax','App\Http\Controllers\Hr\shiftManageController@ajaxShift')->name('shiftManage.ajax');
Route::post('/shiftManage-store','App\Http\Controllers\Hr\shiftManageController@store')->name('shiftManage.store');
Route::get('/shiftManage-edit','App\Http\Controllers\Hr\shiftManageController@edit')->name('shiftManage.edit');
Route::get('/shiftManage-delete/{id}','App\Http\Controllers\Hr\shiftManageController@delete')->name('shiftManage.delete');
//end shift

//leaveType
Route::get('/leaveType-view','App\Http\Controllers\Hr\leaveTypeController@view')->name('leaveType.view');
Route::post('/leaveType-ajax','App\Http\Controllers\Hr\leaveTypeController@ajaxLeaveType')->name('leaveType.ajax');
Route::post('/leaveType-store','App\Http\Controllers\Hr\leaveTypeController@store')->name('leaveType.store');
Route::get('/leaveType-edit','App\Http\Controllers\Hr\leaveTypeController@edit')->name('leaveType.edit');
Route::get('/leaveType-delete/{id}','App\Http\Controllers\Hr\leaveTypeController@delete')->name('leaveType.delete');

//leavePart
Route::get('/leavePart-view','App\Http\Controllers\Hr\leavePartController@view')->name('leavePart.view');
Route::post('/leavePart-ajax','App\Http\Controllers\Hr\leavePartController@ajaxLeavePart')->name('leavePart.ajax');
Route::post('/leavePart-store','App\Http\Controllers\Hr\leavePartController@store')->name('leavePart.store');
Route::get('/leavePart-edit','App\Http\Controllers\Hr\leavePartController@edit')->name('leavePart.edit');
Route::get('/leavePart-delete/{id}','App\Http\Controllers\Hr\leavePartController@delete')->name('leavePart.delete');
// leave Application
Route::get('/leaveApplication-view','App\Http\Controllers\Hr\leaveApplicationController@view')->name('leaveApplication.view');
Route::post('/leaveApplication-ajax','App\Http\Controllers\Hr\leaveApplicationController@ajaxLeaveApplication')->name('leaveApplication.ajax');
Route::post('/leaveApplication-store','App\Http\Controllers\Hr\leaveApplicationController@store')->name('leaveApplication.store');
Route::get('/leave-application-pending','App\Http\Controllers\Hr\leaveApplicationController@pending')->name('leave.application.pending');
Route::get('/leave-application-approve','App\Http\Controllers\Hr\leaveApplicationController@approve')->name('leave.application.approve');
Route::get('/leave-application-reject','App\Http\Controllers\Hr\leaveApplicationController@reject')->name('leave.application.reject');
Route::post('/leave-application-update','App\Http\Controllers\Hr\leaveApplicationController@update')->name('leave.application.update');
Route::get('/leave-application-single-view','App\Http\Controllers\Hr\leaveApplicationController@singleView')->name('leave.application.single.view');
Route::post('/leaveApplication-search','App\Http\Controllers\Hr\leaveApplicationController@search')->name('leaveApplication.search');
Route::get('/leavePartID-callByLeaveTYpe','App\Http\Controllers\Hr\leaveApplicationController@leavePartID_callByLeaveTYpe')->name('leavePartID.callByLeaveTYpe');
//leaveTagline
Route::get('/leaveTagline-view','App\Http\Controllers\Hr\leaveTaglineController@view')->name('leaveTagline.view');
Route::post('/leaveTagline-ajax','App\Http\Controllers\Hr\leaveTaglineController@ajaxleaveTagline')->name('leaveTagline.ajax');
Route::post('/leaveTagline-store','App\Http\Controllers\Hr\leaveTaglineController@store')->name('leaveTagline.store');
Route::get('/leaveTagline-edit','App\Http\Controllers\Hr\leaveTaglineController@edit')->name('leaveTagline.edit');
Route::get('/leaveTagline-delete/{id}','App\Http\Controllers\Hr\leaveTaglineController@delete')->name('leaveTagline.delete');

//payroll
Route::get('/managePayroll', 'App\Http\Controllers\Hr\HrController@managePayroll')->name('managePayroll');

Route::get('/addPayroll', 'App\Http\Controllers\Hr\HrController@addPayroll')->name('addPayroll');

Route::post('/storePayroll', 'App\Http\Controllers\Hr\HrController@storePayroll')->name('storePayroll');

Route::get('/editPayroll/{id}', 'App\Http\Controllers\Hr\HrController@editPayroll')->name('editPayroll');

Route::post('/updatePayroll/{id}', 'App\Http\Controllers\Hr\HrController@updatePayroll')->name('updatePayroll');

Route::get('/deletePayroll/{id}', 'App\Http\Controllers\Hr\HrController@deletePayroll')->name('deletePayroll');
//end payroll

//absent
Route::get('/manageAbsent', 'App\Http\Controllers\Hr\HrController@manageAbsent')->name('manageAbsent');

Route::get('/addAbsent', 'App\Http\Controllers\Hr\HrController@addAbsent')->name('addAbsent');

Route::post('/storeAbsent', 'App\Http\Controllers\Hr\HrController@storeAbsent')->name('storeAbsent');

Route::get('/editAbsent/{id}', 'App\Http\Controllers\Hr\HrController@editAbsent')->name('editAbsent');

Route::post('/updateAbsent/{id}', 'App\Http\Controllers\Hr\HrController@updateAbsent')->name('updateAbsent');

Route::get('/deleteAbsent/{id}', 'App\Http\Controllers\Hr\HrController@deleteAbsent')->name('deleteAbsent');
//end absent

//late roll
Route::get('/manageLateRoll', 'App\Http\Controllers\Hr\HrController@manageLateRoll')->name('manageLateRoll');

Route::get('/addLateRoll', 'App\Http\Controllers\Hr\HrController@addLateRoll')->name('addLateRoll');

Route::post('/storeLateRoll', 'App\Http\Controllers\Hr\HrController@storeLateRoll')->name('storeLateRoll');

Route::get('/editLateRoll/{id}', 'App\Http\Controllers\Hr\HrController@editLateRoll')->name('editLateRoll');

Route::post('/updateLateRoll/{id}', 'App\Http\Controllers\Hr\HrController@updateLateRoll')->name('updateLateRoll');

Route::get('/deleteLateRoll/{id}', 'App\Http\Controllers\Hr\HrController@deleteLateRoll')->name('deleteLateRoll');
//end roll


//overtime
Route::get('/manageOvertime', 'App\Http\Controllers\Hr\HrController@manageOvertime')->name('manageOvertime');

Route::get('/addOvertime', 'App\Http\Controllers\Hr\HrController@addOvertime')->name('addOvertime');

Route::post('/storeOvertime', 'App\Http\Controllers\Hr\HrController@storeOvertime')->name('storeOvertime');

Route::get('/editOvertime/{id}', 'App\Http\Controllers\Hr\HrController@editOvertime')->name('editOvertime');

Route::post('/updateOvertime/{id}', 'App\Http\Controllers\Hr\HrController@updateOvertime')->name('updateOvertime');

Route::get('/deleteOvertime/{id}', 'App\Http\Controllers\Hr\HrController@deleteOvertime')->name('deleteOvertime');
//end overtime

//payment range
Route::get('/managePaymentRange', 'App\Http\Controllers\Hr\HrController@managePaymentRange')->name('managePaymentRange');
Route::post('/managePaymentRange-ajax', 'App\Http\Controllers\Hr\HrController@managePaymentRangeAjax')->name('managePaymentRange.ajax');
Route::post('/storePaymentRange', 'App\Http\Controllers\Hr\HrController@storePaymentRange')->name('storePaymentRange');
Route::get('/deletePaymentRange/{id}', 'App\Http\Controllers\Hr\HrController@deletePaymentRange')->name('deletePaymentRange');
Route::post('/updatePaymentRange/{id}', 'App\Http\Controllers\Hr\HrController@updatePaymentRange')->name('updatePaymentRange');
//end payroll range

//monthManage
Route::get('/monthManage-view','App\Http\Controllers\Hr\monthManageController@view')->name('monthManage.view');
Route::post('/monthManage-ajax','App\Http\Controllers\Hr\monthManageController@ajaxMonthManage')->name('monthManage.ajax');
Route::post('/monthManage-store','App\Http\Controllers\Hr\monthManageController@store')->name('monthManage.store');
Route::get('/monthManage-edit','App\Http\Controllers\Hr\monthManageController@edit')->name('monthManage.edit');
Route::get('/monthManage-delete/{id}','App\Http\Controllers\Hr\monthManageController@delete')->name('monthManage.delete');

//holiday
Route::get('/holiday-view','App\Http\Controllers\Hr\holidayController@view')->name('holiday.view');
Route::post('/holiday-ajax','App\Http\Controllers\Hr\holidayController@ajaxHolidayManage')->name('holiday.ajax');
Route::post('/holiday-store','App\Http\Controllers\Hr\holidayController@store')->name('holiday.store');
Route::get('/holiday-edit','App\Http\Controllers\Hr\holidayController@edit')->name('holiday.edit');
Route::get('/holiday-delete/{id}','App\Http\Controllers\Hr\holidayController@delete')->name('holiday.delete');
//emploan
Route::get('/emploan-view','App\Http\Controllers\Hr\emploanController@view')->name('emploan.view');
Route::post('/emploan-store','App\Http\Controllers\Hr\emploanController@store')->name('emploan.store');
// Route::get('/emp-bank-account','App\Http\Controllers\Hr\emploanController@empbankaccount')->name('empbankaccount.callByBankID');
// Route::get('/com-bank-account','App\Http\Controllers\Hr\emploanController@combankaccount')->name('combankaccount.callByBankID');
Route::get('/emploan-loan-legder','App\Http\Controllers\Hr\emploanController@loanLegder')->name('emploan.loanLegder');

//bonuspay
Route::get('/bonus-calculation','App\Http\Controllers\Hr\bonuspayController@calculation')->name('bonuspay.calculation');
Route::get('/bonuspay-view','App\Http\Controllers\Hr\bonuspayController@view')->name('bonuspay.view');
Route::post('/bonuspay-ajax','App\Http\Controllers\Hr\bonuspayController@ajaxBonusPay')->name('bonuspay.ajax');
Route::post('/bonuspay-store','App\Http\Controllers\Hr\bonuspayController@store')->name('bonuspay.store');
Route::get('/bonuspay-edit','App\Http\Controllers\Hr\bonuspayController@edit')->name('bonuspay.edit');
Route::post('/bonuspay-search','App\Http\Controllers\Hr\bonuspayController@search')->name('bonuspay.search');
Route::get('/bonuspay-delete/{id}','App\Http\Controllers\Hr\bonuspayController@delete')->name('bonuspay.delete');
