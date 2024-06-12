<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\PurchaseReportExport;
use App\Models\Account\AccountHead;
use App\Models\Account\AccountTransaction;
use App\Models\Hr\Attendance;
use App\Models\Hr\BonusPay;
use App\Models\Hr\EmpLoan;
use App\Models\Hr\LeaveApplication;
use App\Models\Hr\SalarySheet;
use App\Models\Inventory\Invoice;
use App\Models\Inventory\ProductInvoice;
use App\Models\Inventory\ProductInvoiceReturn;
use App\Models\Inventory\ProductPurchase;
use App\Models\Inventory\ProductPurchaseReturn;
use App\Models\Inventory\Purchase;
use App\Models\Inventory\Stock;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class PdfExportController extends Controller
{
    
    function balanceSheet(Request $request){
         DB::statement("SET SQL_MODE=''");
        if($request->p_from_date){
            $from_date = $request->p_from_date;
        }else{
            $from_date = date('Y-m-d');
        }
        if($request->p_to_date){
            $to_date = $request->p_to_date;
        }else{
            $to_date = date('Y-m-d');
        }
        $data['from_date']=$from_date;
        $data['to_date']=$to_date;
        $transactions = AccountTransaction::leftJoin('account_heads','account_heads.id','account_transactions.account_id')
        ->select('account_heads.title as account_name','account_heads.code as account_code','account_heads.ac_type as type','account_transactions.date',DB::raw('sum(IF(account_transactions.type="credit",account_transactions.amount,-1*account_transactions.amount)) as b_acount'))
        ->whereIn('account_heads.ac_type',[4,5])
       ->whereBetween('account_transactions.date', [Carbon::parse($from_date)->startOfDay(), Carbon::parse($to_date)->endOfDay()])
        ->groupBy('account_transactions.account_id')
        ->get();
        //dd($transactions);
      //  dd(Carbon::parse($from_date)->startOfDay());
        $data['transactions']=$transactions;

        $html = view('pdf.balance_sheet', $data);
        $mpdf = new mPDF([
            'mode' => 'UTF-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);

        //For Multilanguage Start
        $mpdf->autoScriptToLang = true;
        $mpdf->baseScript = 1;
        $mpdf->autoLangToFont = true;
        $mpdf->autoVietnamese = true;
        $mpdf->autoArabic = true;

        //For Multilanguage End
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->writeHTML($html);
        $name = 'Balance Sheet_ ' . date('Y-m-d i:h:s');
        $mpdf->Output($name.'.pdf', 'D');
    }
    function trailBalance(Request $request){
        DB::statement("SET SQL_MODE=''");
        if($request->p_from_date){
            $from_date = $request->p_from_date;
        }else{
            $from_date = date('Y-m-d');
        }
        if($request->p_to_date){
            $to_date = $request->p_to_date;
        }else{
            $to_date = date('Y-m-d');
        }
        $data['from_date']=$from_date;
        $data['to_date']=$to_date;
        $transactions = AccountTransaction::leftJoin('account_heads','account_heads.id','account_transactions.account_id')
        ->select('account_heads.title as account_name','account_heads.code as account_code','account_heads.ac_type as type',DB::raw('sum(IF(account_transactions.type="credit",account_transactions.amount,-1*account_transactions.amount)) as b_acount'))
        ->whereBetween('account_transactions.date',  [Carbon::parse($from_date)->startOfDay(), Carbon::parse($to_date)->endOfDay()])
        ->groupBy('account_transactions.account_id')
        ->get();
        // dd($transactions);
        $data['transactions']=$transactions;
         $html = view('pdf.trail_balance', $data);
        $mpdf = new mPDF([
            'mode' => 'UTF-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);

        //For Multilanguage Start
        $mpdf->autoScriptToLang = true;
        $mpdf->baseScript = 1;
        $mpdf->autoLangToFont = true;
        $mpdf->autoVietnamese = true;
        $mpdf->autoArabic = true;

        //For Multilanguage End
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->writeHTML($html);
        $name = 'Trail Balance_ ' . date('Y-m-d i:h:s');
        $mpdf->Output($name.'.pdf', 'D');
    }
    function profLoss(Request $request){
        DB::statement("SET SQL_MODE=''");
        if($request->p_from_date){
            $from_date = $request->p_from_date;
        }else{
            $from_date = date('Y-m-d');
        }
        if($request->p_to_date){
            $to_date = $request->p_to_date;
        }else{
            $to_date = date('Y-m-d');
        }
        $data['from_date']=$from_date;
        $data['to_date']=$to_date;
        $transactions = AccountTransaction::leftJoin('account_heads','account_heads.id','account_transactions.account_id')
        ->select('account_heads.title as account_name','account_heads.code as account_code','account_heads.ac_type as type','account_transactions.date',DB::raw('sum(IF(account_transactions.type="credit",account_transactions.amount,-1*account_transactions.amount)) as b_acount'))
        ->whereIn('account_heads.ac_type',[4,5])
       ->whereBetween('account_transactions.date', [Carbon::parse($from_date)->startOfDay(), Carbon::parse($to_date)->endOfDay()])
        ->groupBy('account_transactions.account_id')
        ->get();
        $indirect_tans = AccountTransaction::leftJoin('account_heads','account_heads.id','account_transactions.account_id')
        ->select('account_heads.title as account_name','account_heads.code as account_code','account_heads.ac_type as type','account_transactions.date',DB::raw('sum(IF(account_transactions.type="credit",account_transactions.amount,-1*account_transactions.amount)) as b_acount'))
        ->whereIn('account_heads.ac_type',[7])
       ->whereBetween('account_transactions.date', [Carbon::parse($from_date)->startOfDay(), Carbon::parse($to_date)->endOfDay()])
        ->groupBy('account_transactions.account_id')
        ->get();
        $direct_tans = AccountTransaction::leftJoin('account_heads','account_heads.id','account_transactions.account_id')
        ->select('account_heads.title as account_name','account_heads.code as account_code','account_heads.ac_type as type','account_transactions.date',DB::raw('sum(IF(account_transactions.type="credit",account_transactions.amount,-1*account_transactions.amount)) as b_acount'))
        ->whereIn('account_heads.ac_type',[6])
       ->whereBetween('account_transactions.date', [Carbon::parse($from_date)->startOfDay(), Carbon::parse($to_date)->endOfDay()])
        ->groupBy('account_transactions.account_id')
        ->get();
        //dd($transactions);
      //  dd(Carbon::parse($from_date)->startOfDay());
        $data['transactions']=$transactions;
        $data['indirect_tans']=$indirect_tans;
        $data['direct_tans']=$direct_tans;
      $html = view('pdf.prof_loss', $data);
        $mpdf = new mPDF([
            'mode' => 'UTF-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);

        //For Multilanguage Start
        $mpdf->autoScriptToLang = true;
        $mpdf->baseScript = 1;
        $mpdf->autoLangToFont = true;
        $mpdf->autoVietnamese = true;
        $mpdf->autoArabic = true;

        //For Multilanguage End
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->writeHTML($html);
        $name = 'Profit and Loss_ ' . date('Y-m-d i:h:s');
        $mpdf->Output($name.'.pdf', 'D');
    }
    function ledgerSummary(Request $request){
        if($request->p_from_date){
            $from_date = $request->p_from_date;
        }else{
            $from_date = date('Y-m-d');
        }
        if($request->p_to_date){
            $to_date = $request->p_to_date;
        }else{
            $to_date = date('Y-m-d');
        }
        $data['from_date']=$from_date;
        $data['to_date']=$to_date;
        $data['transactions'] = AccountTransaction::where('account_id',$request->p_account)->whereBetween('date', [Carbon::parse($from_date)->startOfDay(), Carbon::parse($to_date)->endOfDay()])->get();
        $data['account'] = AccountHead::find($request->p_account);
        $html = view('pdf.ledger_summary', $data);
        $mpdf = new mPDF([
            'mode' => 'UTF-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);

        //For Multilanguage Start
        $mpdf->autoScriptToLang = true;
        $mpdf->baseScript = 1;
        $mpdf->autoLangToFont = true;
        $mpdf->autoVietnamese = true;
        $mpdf->autoArabic = true;

        //For Multilanguage End
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->writeHTML($html);
        $name = 'Ledger Summary_ ' . date('Y-m-d i:h:s');
        $mpdf->Output($name.'.pdf', 'D');
    }
     function attendance(Request $request){
        //dd($request->all());
        if($request->p_from_date){
            $from_date = $request->p_from_date;
        }else{
            $from_date = date('Y-m-d');
        }
        if($request->p_to_date){
            $to_date = $request->p_to_date;
        }else{
            $to_date = date('Y-m-d');
        }
        $data['from_date']=$from_date;
        $data['to_date']=$to_date;
        $reports = Attendance::leftjoin('users','users.id','attendances.empID')
        ->orderBy('attendances.id','desc');
        $reports = $reports->whereBetween('attendances.dutyDate', [Carbon::parse($from_date)->startOfDay(), Carbon::parse($to_date)->endOfDay()]);
      
        if(!empty($request->p_designation)){
            $reports = $reports->where('users.designation_id', $request->p_designation);
        }
        if(!empty($request->p_employee)){
            $reports = $reports->where('attendances.empID', $request->p_employee);
        }


        $data['reports']= $reports->get();
        $html = view('pdf.attendance', $data);
        $mpdf = new mPDF([
            'mode' => 'UTF-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);

        //For Multilanguage Start
        $mpdf->autoScriptToLang = true;
        $mpdf->baseScript = 1;
        $mpdf->autoLangToFont = true;
        $mpdf->autoVietnamese = true;
        $mpdf->autoArabic = true;

        //For Multilanguage End
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->writeHTML($html);
        $name = 'Attendance_ ' . date('Y-m-d i:h:s');
        $mpdf->Output($name.'.pdf', 'D');
    }
    function salarySheet(Request $request){

        if($request->p_from_date){
            $from_date = $request->p_from_date;
        }else{
            $from_date = date('Y-m');
        }
        if($request->p_to_date){
            $to_date = $request->p_to_date;
        }else{
            $to_date = date('Y-m');
        }
        $data['from_date']=$from_date;
        $data['to_date']=$to_date;
        $reports = SalarySheet::leftjoin('users','users.id','salary_sheets.empID')
        ->orderBy('salary_sheets.id','desc');
        $reports = $reports->whereBetween('salary_sheets.month', [$from_date, $to_date]);
      
        if(!empty($request->p_designation)){
            $reports = $reports->where('users.designation_id', $request->p_designation);
        }
        if(!empty($request->p_employee)){
            $reports = $reports->where('salary_sheets.empID', $request->employee);
        }

       $data['reports']= $reports->get();
       $html = view('pdf.salary_sheet', $data);
        $mpdf = new mPDF([
            'mode' => 'UTF-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);

        //For Multilanguage Start
        $mpdf->autoScriptToLang = true;
        $mpdf->baseScript = 1;
        $mpdf->autoLangToFont = true;
        $mpdf->autoVietnamese = true;
        $mpdf->autoArabic = true;

        //For Multilanguage End
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->writeHTML($html);
        $name = 'Salary Report_' . date('Y-m-d i:h:s');
        $mpdf->Output($name.'.pdf', 'D');
    }
    function empLeave(Request $request){

        if($request->p_from_date){
            $from_date = $request->p_from_date;
        }else{
            $from_date = date('Y-m-d');
        }
        if($request->p_to_date){
            $to_date = $request->p_to_date;
        }else{
            $to_date = date('Y-m-d');
        }
        $data['from_date']=$from_date;
        $data['to_date']=$to_date;
        $reports = LeaveApplication::leftjoin('users','users.id','leave_applications.empID')
        ->orderBy('leave_applications.id','desc');
        $reports = $reports->whereBetween('leave_applications.fromDate', [Carbon::parse($from_date)->startOfDay(), Carbon::parse($to_date)->endOfDay()]);
      
        if(!empty($request->p_designation)){
            $reports = $reports->where('users.designation_id', $request->p_designation);
        }
        if(!empty($request->p_employee)){
            $reports = $reports->where('leave_applications.empID', $request->employee);
        }

        $data['reports']= $reports->get();
        $html = view('pdf.emp_leave', $data);
        $mpdf = new mPDF([
            'mode' => 'UTF-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);

        //For Multilanguage Start
        $mpdf->autoScriptToLang = true;
        $mpdf->baseScript = 1;
        $mpdf->autoLangToFont = true;
        $mpdf->autoVietnamese = true;
        $mpdf->autoArabic = true;

        //For Multilanguage End
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->writeHTML($html);
        $name = 'Leave Report_' . date('Y-m-d i:h:s');
        $mpdf->Output($name.'.pdf', 'D');
    }
    function empLoan(Request $request){

        if($request->p_from_date){
            $from_date = $request->p_from_date;
        }else{
            $from_date = date('Y-m-d');
        }
        if($request->p_to_date){
            $to_date = $request->p_to_date;
        }else{
            $to_date = date('Y-m-d');
        }
        $data['from_date']=$from_date;
        $data['to_date']=$to_date;
        $reports = EmpLoan::leftjoin('users','users.id','emp_loans.empID')
        ->orderBy('emp_loans.id','desc');
        $reports = $reports->whereBetween('emp_loans.loan_date', [Carbon::parse($from_date)->startOfDay(), Carbon::parse($to_date)->endOfDay()]);
        
        if(!empty($request->p_designation)){
            $reports = $reports->where('users.designation_id', $request->p_designation);
        }
        if(!empty($request->p_employee)){
            $reports = $reports->where('emp_loans.empID', $request->employee);
        }

        $data['reports']= $reports->get();
        $html = view('pdf.emp_loan', $data);
        $mpdf = new mPDF([
            'mode' => 'UTF-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);

        //For Multilanguage Start
        $mpdf->autoScriptToLang = true;
        $mpdf->baseScript = 1;
        $mpdf->autoLangToFont = true;
        $mpdf->autoVietnamese = true;
        $mpdf->autoArabic = true;

        //For Multilanguage End
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->writeHTML($html);
        $name = 'Loan Report_' . date('Y-m-d i:h:s');
        $mpdf->Output($name.'.pdf', 'D');
    }
    function empBonus(Request $request){

        if($request->p_from_date){
            $from_date = $request->p_from_date;
        }else{
            $from_date = date('Y-m-d');
        }
        if($request->p_to_date){
            $to_date = $request->p_to_date;
        }else{
            $to_date = date('Y-m-d');
        }
        $data['from_date']=$from_date;
        $data['to_date']=$to_date;
        $reports = BonusPay::leftjoin('users','users.id','bonus_pays.empID')
        ->orderBy('bonus_pays.id','desc');
        $reports = $reports->whereBetween('bonus_pays.paidDate', [$from_date, $to_date]);
        
        if(!empty($request->p_designation)){
            $reports = $reports->where('users.designation_id', $request->p_designation);
        }
        if(!empty($request->p_employee)){
            $reports = $reports->where('bonus_pays.empID', $request->employee);
        }

        $data['reports']= $reports->get();
        $html = view('pdf.emp_bonus', $data);
        $mpdf = new mPDF([
            'mode' => 'UTF-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);

        //For Multilanguage Start
        $mpdf->autoScriptToLang = true;
        $mpdf->baseScript = 1;
        $mpdf->autoLangToFont = true;
        $mpdf->autoVietnamese = true;
        $mpdf->autoArabic = true;

        //For Multilanguage End
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->writeHTML($html);
        $name = 'Bonus Report' . date('Y-m-d i:h:s');
        $mpdf->Output($name.'.pdf', 'D');
    }

   
}
