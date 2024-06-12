<?php

namespace App\Http\Controllers\Report;

use App\Exports\AttendanceExport;
use App\Exports\BonusExport;
use App\Exports\LeaveExport;
use App\Exports\LoanExport;
use App\Exports\ProfLossExport;
use App\Exports\SalaryExport;
use App\Exports\BalanceSheetExport;
use App\Exports\TrailBalanceExport;
use App\Exports\LedgerSummaryExport;
use App\Http\Controllers\Controller;
use App\Models\Account\AccountHead;
use App\Models\Account\AccountTransaction;
use App\Models\Hr\Attendance;
use App\Models\Hr\BonusPay;
use App\Models\Hr\EmpLoan;
use App\Models\Hr\LeaveApplication;
use App\Models\Hr\SalarySheet;
use App\Models\Inventory\Invoice;
use Illuminate\Http\Request;
use App\Models\Inventory\ProductInvoice;
use App\Models\Inventory\ProductInvoiceReturn;
use App\Models\Inventory\ProductPurchase;
use App\Models\Inventory\ProductPurchaseReturn;
use App\Models\Inventory\Purchase;
use App\Models\Inventory\Stock;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
// use Maatwebsite\Excel\Excel;
class ReportExportController extends Controller
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

        $name = 'Balance Sheet_ ' . date('Y-m-d i:h:s');
        $data = Excel::download(new BalanceSheetExport($transactions, $from_date, $to_date), $name . '.xlsx');
        ob_end_clean();
        return $data;
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
        $name = 'Trail Balance_ ' . date('Y-m-d i:h:s');
        $data = Excel::download(new TrailBalanceExport($transactions, $from_date, $to_date), $name . '.xlsx');
        ob_end_clean();
        return $data;
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
        $name = 'Profil and Loss_ ' . date('Y-m-d i:h:s');
        $data = Excel::download(new ProfLossExport($transactions, $direct_tans,$indirect_tans,$from_date, $to_date), $name . '.xlsx');
        ob_end_clean();
        return $data;
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
        $data['transactions']= $transactions = AccountTransaction::where('account_id',$request->p_account)->whereBetween('date', [Carbon::parse($from_date)->startOfDay(), Carbon::parse($to_date)->endOfDay()])->get();
        $data['account'] = AccountHead::find($request->p_account);
        $name = 'Ledger Summary_ ' . date('Y-m-d i:h:s');
        $data = Excel::download(new LedgerSummaryExport($transactions, $from_date, $to_date), $name . '.xlsx');
        ob_end_clean();
        return $data;
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


        $reports= $reports->get();
        $name = 'Attendance Report_' . date('Y-m-d i:h:s');
        $data = Excel::download(new AttendanceExport($reports, $from_date, $to_date), $name . '.xlsx');
        ob_end_clean();
        return $data;
    }
    function salarySheet(Request $request){

        if($request->fromp_from_date_date){
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

        $reports= $reports->get();
        $name = 'Salary Report_' . date('Y-m-d i:h:s');
        $data = Excel::download(new SalaryExport($reports, $from_date, $to_date), $name . '.xlsx');
        ob_end_clean();
        return $data;
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

        $reports= $reports->get();
        $name = 'Salary Report_' . date('Y-m-d i:h:s');
        $data = Excel::download(new LeaveExport($reports, $from_date, $to_date), $name . '.xlsx');
        ob_end_clean();
        return $data;
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

        $reports= $reports->get();
        $name = 'Loan Report_' . date('Y-m-d i:h:s');
        $data = Excel::download(new LoanExport($reports, $from_date, $to_date), $name . '.xlsx');
        ob_end_clean();
        return $data;
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

         $reports= $reports->get();
        $name = 'Bonus Report_' . date('Y-m-d i:h:s');
        $data = Excel::download(new BonusExport($reports, $from_date, $to_date), $name . '.xlsx');
        ob_end_clean();
        return $data;
    }
   
}
