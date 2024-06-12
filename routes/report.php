<?php
use Illuminate\Support\Facades\Route;


//hr Reports
Route::get('/attendance-report','App\Http\Controllers\Report\HrReportController@attendance')->name('report.attendance');
Route::get('/salary_sheet-report','App\Http\Controllers\Report\HrReportController@salarySheet')->name('report.salary_sheet');
Route::get('/emp-leave-report','App\Http\Controllers\Report\HrReportController@empLeave')->name('report.emp_leave');
Route::get('/emp-loan-report','App\Http\Controllers\Report\HrReportController@empLoan')->name('report.emp_loan');
Route::get('/emp-bonus-report','App\Http\Controllers\Report\HrReportController@empBonus')->name('report.emp_bonus');

//end hr report

//

//print
  //accounting
    Route::get('/balance_sheet_print','App\Http\Controllers\Report\PrintReport@balanceSheet')->name('balance_sheet_print');
    Route::get('/trail_balance_print','App\Http\Controllers\Report\PrintReport@trailBalance')->name('trail_balance_print');
    Route::get('/prof_loss_print','App\Http\Controllers\Report\PrintReport@profLoss')->name('prof_loss_print');
    Route::get('/ledger_summary_print','App\Http\Controllers\Report\PrintReport@ledgerSummary')->name('ledger_summary_print');
   //Hr
   Route::get('/attendance_print','App\Http\Controllers\Report\PrintReport@attendance')->name('report_attendance_print');
    Route::get('/salary_sheet_print','App\Http\Controllers\Report\PrintReport@salarySheet')->name('report_salary_sheet_print');
    Route::get('/emp-leave-print','App\Http\Controllers\Report\PrintReport@empLeave')->name('report_emp_leave_print');
    Route::get('/emp-loan-print','App\Http\Controllers\Report\PrintReport@empLoan')->name('report_emp_loan_print');
    Route::get('/emp-bonus-print','App\Http\Controllers\Report\PrintReport@empBonus')->name('report_emp_bonus_print');



//excel

  //accounting
    Route::get('/balance_sheet_excel','App\Http\Controllers\Report\ReportExportController@balanceSheet')->name('balance_sheet_excel');
    Route::get('/trail_balance_excel','App\Http\Controllers\Report\ReportExportController@trailBalance')->name('trail_balance_excel');
    Route::get('/prof_loss_excel','App\Http\Controllers\Report\ReportExportController@profLoss')->name('prof_loss_excel');
    Route::get('/ledger_summary_excel','App\Http\Controllers\Report\ReportExportController@ledgerSummary')->name('ledger_summary_excel');
    Route::get('/test_excel','App\Http\Controllers\Report\ReportExportController@test_excel')->name('test_excel');
   //Hr
    Route::get('/attendance_excel','App\Http\Controllers\Report\ReportExportController@attendance')->name('report_attendance_excel');
    Route::get('/salary_sheet_excel','App\Http\Controllers\Report\ReportExportController@salarySheet')->name('report_salary_sheet_excel');
    Route::get('/emp-leave-excel','App\Http\Controllers\Report\ReportExportController@empLeave')->name('report_emp_leave_excel');
    Route::get('/emp-loan-excel','App\Http\Controllers\Report\ReportExportController@empLoan')->name('report_emp_loan_excel');
    Route::get('/emp-bonus-excel','App\Http\Controllers\Report\ReportExportController@empBonus')->name('report_emp_bonus_excel');

//pdf

   //accounting
    Route::get('/balance_sheet_pdf','App\Http\Controllers\Report\PdfExportController@balanceSheet')->name('balance_sheet_pdf');
    Route::get('/trail_balance_pdf','App\Http\Controllers\Report\PdfExportController@trailBalance')->name('trail_balance_pdf');
    Route::get('/prof_loss_pdf','App\Http\Controllers\Report\PdfExportController@profLoss')->name('prof_loss_pdf');
    Route::get('/ledger_summary_pdf','App\Http\Controllers\Report\PdfExportController@ledgerSummary')->name('ledger_summary_pdf');

     //Hr
    Route::get('/attendance_pdf','App\Http\Controllers\Report\PdfExportController@attendance')->name('report_attendance_pdf');
    Route::get('/salary_sheet_pdf','App\Http\Controllers\Report\PdfExportController@salarySheet')->name('report_salary_sheet_pdf');
    Route::get('/emp-leave-pdf','App\Http\Controllers\Report\PdfExportController@empLeave')->name('report_emp_leave_pdf');
    Route::get('/emp-loan-pdf','App\Http\Controllers\Report\PdfExportController@empLoan')->name('report_emp_loan_pdf');
    Route::get('/emp-bonus-pdf','App\Http\Controllers\Report\PdfExportController@empBonus')->name('report_emp_bonus_pdf');

