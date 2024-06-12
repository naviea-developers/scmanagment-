<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Models\Account\AccountHead;
use App\Models\Account\AccountTransaction;
use App\Models\Account\BalanceAccount;
use App\Models\Account\PaymentMethod;
use App\Models\Account\Payment;
use App\Models\Hr\Absent;
use App\Models\Hr\Attendance;
use App\Models\Hr\Bank;
use App\Models\Hr\BankAccount;
use App\Models\Hr\Department;
use App\Models\Designation;
use App\Models\Hr\EmpBankAccount;
use App\Models\Hr\EmpLoan;
use App\Models\Hr\Employee;
use App\Models\Hr\Hrleave;
use App\Models\Hr\LateRoll;
use App\Models\Hr\LeaveApplication;
use App\Models\Hr\MonthManage;
use App\Models\Hr\Overtime;
use App\Models\Hr\Payment_range;
use App\Models\Hr\Payroll;
use App\Models\Hr\SalarySheet;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
class HrController extends Controller
{
   


    function select2Designation(Request $request){
        $datalist =Designation::select('id', 'name')->where("name", "LIKE", "%$request->value%")->get();
        $data_op[]=['id' =>'', 'text' => 'Select Employee'];
        foreach ($datalist as $data) {
            $data_op[] = ['id' => $data->id, 'text' => $data->name];
        }
        return json_encode($data_op);
    }
    function select2EmpDesig(Request $request){
        $datalist = User::select('id', 'name')->whereIn('type',[2,8])->where('designation_id',$request->designation_id)->where("name", "LIKE", "%$request->value%")->get();
        $data_op[]=['id' =>'', 'text' => 'Select Employee'];
        foreach ($datalist as $data) {
            $data_op[] = ['id' => $data->id, 'text' => $data->name];
        }
        return json_encode($data_op);
    }
    function select2Emp(Request $request){
        $datalist = User::select('id', 'name')->whereIn('type',[2,8])->where("name", "LIKE", "%$request->value%")->get();
        $data_op[]=['id' =>'', 'text' => 'Select Employee'];
        foreach ($datalist as $data) {
            $data_op[] = ['id' => $data->id, 'text' => $data->name];
        }
        return json_encode($data_op);
    }
   
    public function addLeave(){

        $employee = Employee::get();

        return view('Hr.leave.add_leave',compact('employee'));
    }

    public function storeLeave(Request $request){
        $this->validate($request,[
            'empId' => 'required',
            'type'=> 'required',
        ]);
        $leave = Hrleave::create([
            'employee_id' => $request->empId,
            'leave_type'  => $request->type,
            'reason' => $request->reason,
            'status' => $request->status
        ]);


        return redirect('/manageLeave');
    }

    public function manageLeave(){
        $viewAll = Hrleave::get();

        // $employee = DB::table('employee_info')->get();
        return view('Hr.leave.manage_leave',compact('viewAll'));
    }

    public function editLeave($id){
        $editData = Hrleave::find($id);
        $employee = Employee::get();
        return view('Hr.leave.edit_leave',compact('editData','employee'));
    }

    public function updateLeave(Request $request, $id){
         $this->validate($request,[
            'empId' => 'required',
            'type'=> 'required',
        ]);
        $leave = Hrleave::where('id',$id)->update([
            'employee_id' => $request->empId,
            'leave_type'  => $request->type,
            'reason' => $request->reason,
            'status' => $request->status
        ]);


        return redirect('/manageLeave');
    }

    public function deleteLeave($id){
        Hrleave::where('id',$id)->delete();
        return redirect('/manageLeave');

    }


    public function addSalary(){
        $employee = Employee::get();
        return view('Hr.salary.add_salary',compact('employee'));
    }
    function inital_account(){
        $salesHead = AccountHead::where("code",'7010')->first();
        if($salesHead == null){
            $salesHead = new AccountHead;
            $salesHead->title = "Salary";
            $salesHead->code = '7010';
            $salesHead->sys = 0;
            $salesHead->ac_type = 7;
            $salesHead->note = '';
            $salesHead->status = 1;
            $salesHead->save();

        }
        $acPayableHead = AccountHead::where("code",'2000')->first();
        if($acPayableHead == null){
            $acPayableHead = new AccountHead;
            $acPayableHead->code = '2000';
            $acPayableHead->title = "Account Payable";
            $acPayableHead->ac_type = 2;
            $acPayableHead->note = '';
            $acPayableHead->sys = 0;
            $acPayableHead->status = 1;
            $acPayableHead->save();
        }
    }
    public function storeSalary(Request $request){
      
      
        $validator = Validator::make($request->all(), [
            'monthDate'=>'required',
            'empID'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $this->inital_account();
            $checkHas=SalarySheet::where('empID',$request->empID)->where('month',$request->monthDate)->first();
           // dd($checkHas);
            if(!$checkHas){
                $employee=User::where('id',$request->empID)->first();
                $payroll=Payroll::first();
                $month=MonthManage::where('monthDate',$request->monthDate)->first();

                $lastAttendance=Attendance::orderBy('id','DESC')->where('dutyDate','LIKE',$request->monthDate.'%')->first();

                $absentRoll=Absent::first();
                $overTimeRoll=Overtime::first();
                // normal salary calculation
                $basicSalary=$employee->salary;
                $totalDaySalary=($basicSalary+($basicSalary*($payroll->house_rent/100))+($basicSalary*($payroll->medical_cost/100))+($basicSalary*($payroll->transport_cost/100)))-(($basicSalary*($payroll->tax/100))+($basicSalary*($payroll->provident_fund/100)));


                if($month){
                    $oneDaySalary=$totalDaySalary/$month->workingDay;
                }else{
                    $oneDaySalary=$totalDaySalary/30;
                }
                //dd($lastAttendance);
                if($lastAttendance == null){
                    return response()->json([
                        'status'=>'no',
                        'msg'=>'Employee Has No Attendance'
                    ]);
                    
                }
               // dd("ss");
                // join date difference     find
                $to =Carbon::createFromFormat('Y-m-d', $lastAttendance?->dutyDate);
                
                $from =Carbon::createFromFormat('Y-m-d', $employee->join_date);
                //dd($from);
                $dateDiff = $to->diffInDays($from);
                //dd($dateDiff);
                $dateDiff+=1;
                $startDate=$request->monthDate.'-1';
                $startDate=Carbon::createFromFormat('Y-m-d', $startDate);
               // dd($dateDiff);

                if($dateDiff>=30){
                   // dd("sss");
                    $workingDay=30;

                    $holiday=0;

                    $leaveDay=LeaveApplication::where('fromDate','>=',$startDate)->where('toDate','<=',$lastAttendance->dutyDate)->where('empID',$request->empID)->where('status',1)->where('leavePartID','Full Day')->sum('leaveDay');

                    $late=Attendance::where('dutyDate','>=',$startDate)->where('dutyDate','<=',$lastAttendance->dutyDate)->where('empID',$request->empID)->where('status','late')->count();

                    $empWorkingDay=Attendance::where('dutyDate','>=',$startDate)->where('dutyDate','<=',$lastAttendance->dutyDate)->where('empID',$request->empID)->count();

                    $overTimeMinute=Attendance::where('dutyDate','>=',$startDate)->where('dutyDate','<=',$lastAttendance->dutyDate)->where('empID',$request->empID)->sum('overtimeMiniute');

                    $workingTime=Attendance::where('dutyDate','>=',$startDate)->where('dutyDate','<=',$lastAttendance->dutyDate)->where('empID',$request->empID)->sum('workingMiniute');



                    $totalWorkingDay=($empWorkingDay+$leaveDay)-(intval($late/LateRoll::first()->late));

                    $absent=$workingDay-$totalWorkingDay;
                }else{

                    $workingDay=Attendance::where('dutyDate','>=',$employee->join_date)->where('dutyDate','<=',$lastAttendance->dutyDate)->distinct('dutyDate')->count();
                   // dd($workingDay);

                    // $holiday=Holiday::where('startDate','>=',$employee->joinDate)->where('endDate','<=',$lastAttendance->dutyDate)->sum('day');
                    $holiday=0;

                    // $leaveDay=Hrleave::where('fromDate','>=',$employee->join_date)->where('toDate','<=',$lastAttendance->dutyDate)->where('empID',$request->empID)->where('status',1)->where('leavePartID','Full Day')->sum('leaveDay');
                    $leaveDay=LeaveApplication::where('fromDate','>=',$employee->join_date)->where('toDate','<=',$lastAttendance->dutyDate)->where('empID',$request->empID)->where('status',1)->sum('leaveDay');

                    $late=Attendance::where('dutyDate','>=',$employee->join_date)->where('dutyDate','<=',$lastAttendance->dutyDate)->where('empID',$request->empID)->where('status','late')->count();

                    $empWorkingDay=Attendance::where('dutyDate','>=',$employee->join_date)->where('dutyDate','<=',$lastAttendance->dutyDate)->where('empID',$request->empID)->count();

                    $overTimeMinute=Attendance::where('dutyDate','>=',$employee->join_date)->where('dutyDate','<=',$lastAttendance->dutyDate)->where('empID',$request->empID)->sum('overtimeMiniute');

                    $workingTime=Attendance::where('dutyDate','>=',$employee->join_date)->where('dutyDate','<=',$lastAttendance->dutyDate)->where('empID',$request->empID)->sum('workingMiniute');



                    $totalWorkingDay=($empWorkingDay+$leaveDay)-(intval($late/LateRoll::first()->late));

                    $absent=$workingDay-$totalWorkingDay;


                }

                // salary Sheet Generate

                if($absent>1){

                    $deduct=($basicSalary*($absentRoll->firstAbsentAmount/100))+(($absent-1)*($basicSalary*($absentRoll->otherAbsentAmount/100)));

                }
                else if($absent==1){
                    $deduct=$basicSalary*($absentRoll->firstAbsentAmount/100);
                }
                else{
                    $deduct=0;
                }

                // calculation
                $overTimeTaka=($overTimeMinute/60)*($basicSalary*($overTimeRoll->amount/100));
                $salaryEarn=$totalWorkingDay*$oneDaySalary;
                $netSalary=($salaryEarn+$overTimeTaka)-$deduct;

                //dd( $overTimeTaka);
                $SalarySheet=new SalarySheet();
                $SalarySheet->month=$request->monthDate;
                // $SalarySheet->deptID=$request->deptID;

                // $SalarySheet->desigID=$request->desigID;
                $SalarySheet->empID=$request->empID;
                $SalarySheet->basicSalary=round($basicSalary,2);
                $SalarySheet->houseRent=round($payroll->house_rent,2);

                $SalarySheet->medicalCost=round($payroll->medical_cost,2);
                $SalarySheet->transportCost=round($payroll->transport_cost,2);
                $SalarySheet->tax=round($payroll->tax,2);
                $SalarySheet->providentFound=round($payroll->provident_fund,2);


                $SalarySheet->overtime=round($overTimeRoll->amount,2);
                $SalarySheet->overtimeMiniute=$overTimeMinute;
                $SalarySheet->absentDay=$absent;
                $SalarySheet->absentDeductFirstDay=round($absentRoll->firstAbsentAmount,2);
                $SalarySheet->absentDeductOtherDay=round($absentRoll->otherAbsentAmount,2);

                $SalarySheet->absentDeduct=round($deduct,2);
                $SalarySheet->advanced=0;
                $SalarySheet->netSalary=round($netSalary,2);
                $SalarySheet->paidSalary = 0;
                $SalarySheet->due_amount = $SalarySheet->netSalary - $SalarySheet->paidSalary;
                $SalarySheet->save();
                $salaryHead = AccountHead::where("code",'7010')->first();

                $sal_trans = New AccountTransaction;
                $sal_trans->amount = round($netSalary,2);
                $sal_trans->account_id = $salaryHead->id;
                $sal_trans->type = "credit";
                $sal_trans->sub_type = "Salary";
                $sal_trans->reason = '#'.$employee->employee_id." Employee Salary";
                $sal_trans->date =  date('Y-m-d');
                $sal_trans->relation_id = $SalarySheet->id;
                $sal_trans->relation_with = "Salary";
                $sal_trans->save();

                $acPayableHead = AccountHead::where("code",'2000')->first();

                $acp_trans = New AccountTransaction;
                $acp_trans->amount = round($netSalary,2);
                $acp_trans->account_id = $acPayableHead->id;
                $acp_trans->type = "credit";
                $acp_trans->sub_type = "Salary";
                $acp_trans->reason = '#'.$employee->employee_id." Employee Salary with Due";
                $acp_trans->date =date('Y-m-d');
                $acp_trans->relation_id = $SalarySheet->id;
                $acp_trans->relation_with = "Salary";
                $acp_trans->trans_id = $sal_trans->id;
                $acp_trans->save();
                $sal_trans->trans_id = $acp_trans->id;
                $sal_trans->save();

            }

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Salary Add Successfully'
            ]);

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }

    }
    public function salarySlip(Request $request){
       // dd($request->all());
        if (!$request->id) {
           $html ='Sorry';
        } else {

        $SalarySheet=SalarySheet::find($request->id);
       // dd($SalarySheet);
           // return $SalarySheet;
        $employee=DB::table('users')
        ->leftjoin('designations','users.designation_id','designations.id')
        ->where('users.id',$SalarySheet->empID)
        ->select('users.*','designations.name as desigName')
        ->first();
        //dd($employee);
            $html='<center><strong><h4>Naviea School</h4><p>mohakhali-dohs,dhaka-12,bangladesh<br/>Salary Slip</p><strong></center><hr/>';

            $html.='<strong>Name: '.$employee->name.'<br/>Designation: '.$employee->desigName.'<br/>Salary Month: '.date('F, Y',strtotime($SalarySheet->month)).'<br/><br/></strong>';

            $html.='<div style="margin:0px auto">';
            $html.='<table class="table table-striped table-responsive" style="display:table!important;">
                          <thead>
                            <tr>
                              <th colspan="2">Earnings</th>
                              <th colspan="2">Deduction</th>
                            </tr>
                          </thead>
                          <tbody>';
            $html.='<tr><td>Basic Salary</td><td>BDT '.$SalarySheet->basicSalary.'</td><td>Advanced</td><td>BDT '.$SalarySheet->advanced.'</td></tr>';

            $html.='<tr><td>House Rent</td><td>BDT '.round((($SalarySheet->houseRent/100)*$SalarySheet->basicSalary),2).'</td><td>Tax</td><td>BDT '.round((($SalarySheet->tax/100)*$SalarySheet->basicSalary),2).'</td></tr>';

            $html.='<tr><td>Medical Cost</td><td>BDT '.round((($SalarySheet->medicalCost/100)*$SalarySheet->basicSalary),2).'</td><td>Provident Fund</td><td>BDT '.round((($SalarySheet->providentFound/100)*$SalarySheet->basicSalary),2).'</td></tr>';

            $html.='<tr><td>Transport Cost</td><td>BDT '.round((($SalarySheet->transportCost/100)*$SalarySheet->basicSalary),2).'</td><td> Absent Deduction</td><td>BDT '.round($SalarySheet->absentDeduct,2).'</td></tr>';

            $html.='<tr><td>Overtime</td><td colspan="3">BDT '.round(($SalarySheet->overtimeMiniute/60)*(($SalarySheet->overtime/100)*$SalarySheet->basicSalary),2).'</td></tr>';

            $html.='<tr><td>Net Salary </td><td colspan="3">BDT '.round($SalarySheet->netSalary,2).'</td></tr>';
            $html.='<tr><td>Paid Salary </td><td colspan="3">BDT '.round($SalarySheet->paidSalary,2).'</td></tr>';
            $html.='<tr><td>Paid Percent </td><td colspan="3">'.round($SalarySheet->percentPaid,2).'%</td></tr>';

            $html.='</tbody></table>';
            $html.='</div>';

            $payments = Payment::where('relation_id',$SalarySheet->id)->where('relation_type',"Salary Payment")->get();
            if($payments->count() > 0){
                $html.='Payments :<hr/>';
                $html.='<div style="margin:0px auto">';
                $html.='<table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Date</th>
                            <th>Payment Method</th>
                            <th>Bank Account</th>
                            <th>Paid Amount</th>
                        </tr>
                        </thead>
                        <tbody>';
                foreach($payments as $k=>$payment) {
                    $html.='<tr>';
                    $html.= '<td>'.($k+1).'</td>';
                    $html.= '<td>'.date('Y-m-d',strtotime($payment->date)).'</td>';
                    $html.='<td>'.$payment->method?->name.'</td>';
                    $html.='<td>'.$payment->account?->account_name.'</td>';
                    $html.='<td>BDT '.round($payment->amount,2).'</td>';
                    // $html.='<td>'.$payment->note.'</td>';
                    $html.='</tr>';
                }
                $html.='</tbody></table>';
                $html.='</div>';
            }

        }


        return response()->json(['html' => $html]);
    }

    public function manageSalary(){
       
        $data['employees']=User::whereIn('type',[2,8])->orderBy('id','DESC')->get();
        $data['methods']=PaymentMethod::orderBy('id','DESC')->get();
        return view('Hr.salary.manage_salary',$data);
    }
    function ajaxManageSalary(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'salary_sheets.month',
            2=> 'users.name',
            3 => 'salary_sheets.netSalary',
            4 => 'salary_sheets.paidSalary',
            5 => 'salary_sheets.due_amount',
            6 => 'salary_sheets.payment_status',
        );
        $totalData = SalarySheet::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = SalarySheet::leftJoin('users','salary_sheets.empID','users.id');
        if(!empty($search)){
 
            $datalist =$datalist->where("users.name","LIKE","%{$search}%")
            ->orwhere("salary_sheets.netSalary","LIKE","%{$search}%")
            ->orwhere("salary_sheets.paidSalary","LIKE","%{$search}%")
            ->orwhere("salary_sheets.due_amount","LIKE","%{$search}%");
           
        }
        $totalFiltered = $datalist->count();
        $datalist = $datalist->select('salary_sheets.*','users.name as e_name')->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        
 
        $data = array();
        if(!empty($datalist))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($datalist as $data_v)
            {
                $nestedData['id'] = $i++;
                $nestedData['month'] = date("M,Y",strtotime($data_v->month.'-01'));
                $nestedData['e_name'] = $data_v->e_name;
                $nestedData['net_amount'] = round($data_v->netSalary,2);
                $nestedData['paid_amount'] = round($data_v->paidSalary,2);
                $nestedData['due_amount'] = round($data_v->due_amount,2);
                $p_status = '';
                if($data_v->payment_status == 0){
                    $p_status = '<div class="badge bg-danger">Due</div>';
                }else if($data_v->payment_status == 1){
                    $p_status = '<div class="badge bg-secondary">Partial</div>';
                }else{
                    $p_status = '<div class="badge bg-primary">Paid</div>';
                }
                $nestedData['p_status'] = $p_status;
               
                $nestedData['options'] = '<a class="btn btn-primary" href="javascript:void(0)" id="salarySheetEdit" data-id="'.$data_v->id.'" data-due="'.round($data_v->due_amount,2).'" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="fa fa-edit"></i></a>';
             
                $nestedData['options'] .= '<a style="margin-left: 10px"  class="btn btn-info salarySlipFetch" href="javascript:void(0)" data-id="'.$data_v->id.'" data-bs-toggle="modal" data-bs-target="#salarySlip"><i class="fa fa-eye"></i></a>';

                $nestedData['options'] .= '<a title="Delete"  style="margin-left: 10px" class="del_hr_data btn btn-danger" data-id="'.$data_v->id.'"><i class="fa fa-trash"></i></a>';
 
                $data[] = $nestedData;
 
            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
 
        return json_encode($json_data);
    }

    public function editSalary($id){
        $salaryData = SalarySheet::find($id);
        $employee = Employee::get();
        return view('Hr.salary.edit_salary',compact('salaryData','employee'));
    }

    public function updateSalary(Request $request){
       // dd($request->all());

        $validator = Validator::make($request->all(),[
                'id'=>'required',
                'paidDate'=>'required',
                'payment_method'=>'required',
                'paidSalary'=>'required|numeric|min:0|max:'.$request->due_amount,
                'account'=>'required',

        ],[
        'amount.min' => 'Amount Should be grater than 0',
        'amount.max' => 'Amount Should be less or equal '.$request->due_amount,
        ]);
        if($validator->fails()){
            return response([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
        try{
            DB::beginTransaction();
            $SalarySheet=SalarySheet::find($request->id);
            // previous data clear
            // EmpLoan::where('salarySheetID',$request->id)->delete();
            $employee=User::where('id',$SalarySheet->empID)->first();
            //$NewEmployee->debit=$NewEmployee->debit-$SalarySheet->advanced;
        // $NewEmployee->save();

            $SalarySheet->paidSalary = $SalarySheet->paidSalary+$request->paidSalary;
            $SalarySheet->due_amount = $SalarySheet->netSalary - $SalarySheet->paidSalary;
            if($SalarySheet->due_amount == 0){
                $SalarySheet->payment_status = 2;
            }else{
                $SalarySheet->payment_status = 1;
            }
            $SalarySheet->save();
            $payment = New Payment;
            $payment->payment_method= $request->payment_method;
            $payment->bank_account_id= $request->account;
            // $payment->transaction_id= $sc_pay_transaction->id;
            $payment->relation_id = $SalarySheet->id;
            $payment->relation_type = "Salary Payment";
            $payment->amount = $request->paidSalary;
            $payment->date = $request->paidDate == null ?  date('Y-m-d') :  Carbon::parse($request->paidDate)->format('Y-m-d');
            $payment->note = $request->order_note;
            $payment->save();
            $salesDueHead = AccountHead::where("code",'2000')->first();

            $sc_due_transaction = New AccountTransaction;
            $sc_due_transaction->amount = $request->paidSalary;
            $sc_due_transaction->account_id = $salesDueHead->id;
            $sc_due_transaction->type = "debit";
            $sc_due_transaction->sub_type = "Salary Payment";
            $sc_due_transaction->reason =  "Salary Payment For Employee #".$employee->employee_id;
            $sc_due_transaction->date = $request->payment_date == null ?  date('Y-m-d') :  Carbon::parse($request->payment_date)->format('Y-m-d');
            $sc_due_transaction->relation_id = $SalarySheet->id;
            $sc_due_transaction->relation_with = "Salary";
            $sc_due_transaction->payment_id = $payment->id;
            $sc_due_transaction->save();

            $balance_account = BalanceAccount::find($request->account);

            $sc_pay_transaction = New AccountTransaction;
            $sc_pay_transaction->amount = $request->paidSalary;
            $sc_pay_transaction->account_id = $balance_account->account_head_id;
            $sc_pay_transaction->type = "credit";
            $sc_pay_transaction->relation_with = "Salary";
            $sc_pay_transaction->sub_type = "Salary Payment";
            $sc_pay_transaction->reason = "Salary Payment For Employee #".$employee->employee_id;
            $sc_pay_transaction->date = $request->paidDate == null ?  date('Y-m-d') :  Carbon::parse($request->paidDate)->format('Y-m-d');
            $sc_pay_transaction->relation_id = $SalarySheet->id;
            $sc_pay_transaction->payment_id = $payment->id;
            $sc_pay_transaction->trans_id = $sc_due_transaction->id;
            $sc_pay_transaction->save();
            $sc_due_transaction->trans_id = $sc_pay_transaction->id;
            $sc_due_transaction->save();
            DB::commit();
            return response([
                'status' => 1,
                'success' => 'Payment Paid successfully.',
            ]);
        }catch (\Exception $e){
            DB::rollBack();
            return response([
                'status' => 0,
                'data'=> $e->getMessage(),
                'error' => 'Something went Wrong!',
            ]);
        }
    }

    public function deleteSalary($id){
        try{
           DB::beginTransaction();

           $SalarySheet=SalarySheet::find($id);
           $payments = Payment::where('relation_id',$SalarySheet->id)->where('relation_type',"Salary Payment")->get();
           foreach($payments as $payment){
            $payment->delete();
           }
           $trans = AccountTransaction::where('relation_id',$SalarySheet->id)->where('relation_with',"Salary")->get();
           foreach($trans as $transaction){
            $transaction->delete();
           }
           //dd($SalarySheet);
           $SalarySheet->delete();
           DB::commit();
           return response()->json([
                'status'=>'yes',
                'msg'=>'Deleted Successfully'
            ]);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }



    }


    public function SalarySheet() {

        $salaryData = DB::table('salary_manage')->get();
        return view('Hr.salary.salary_sheet',compact('salaryData'));

    }
   
   


    public function managePayroll(){

        $viewAll = Payroll::get();
        return view('Hr.payroll.manage',compact('viewAll'));
    }

    public function addPayroll()
    {
        return view('Hr.payroll.create');
    }

    public function storePayroll(Request $request)
    {
        // return $request;

        $request->validate([
            "house_rent" => ["required"],
            "medical_cost" => ["required"],
            "provident_fund" => ["required"],
            "transport_cost" => ["required"],
            "tax" => ["required"]
        ]);
        $payroll = New Payroll;
        $payroll->house_rent = $request->house_rent;
        $payroll->medical_cost = $request->medical_cost;
        $payroll->transport_cost = $request->transport_cost;
        $payroll->provident_fund = $request->provident_fund;
        $payroll->tax = $request->tax;
        $payroll->save();
        $notification=array(
            'message'=>"Payroll Save successfull",
            'alert-type'=>'success'
        );
        return redirect()->route('managePayroll')->with($notification);
    }

    public function deletePayroll($id)
    {
        Payroll::find($id)->delete();
            $notification=array(
            'message'=>"Payroll Save successfull",
            'alert-type'=>'success'
        );
            return redirect()->route('managePayroll')->with($notification);
    }


    public function editPayroll($id){
        $p = DB::table('payrolls')->where('id',$id)->first();
        return view('Hr.payroll.edit',compact('p'));
    }

    public function updatePayroll(Request $request, $id){
        $request->validate([
                "house_rent" => ["required"],
                "medical_cost" => ["required"],
                "provident_fund" => ["required"],
                "transport_cost" => ["required"],
                "tax" => ["required"]
            ]);
        $payroll =  Payroll::find($id);
        $payroll->house_rent = $request->house_rent;
        $payroll->medical_cost = $request->medical_cost;
        $payroll->transport_cost = $request->transport_cost;
        $payroll->provident_fund = $request->provident_fund;
        $payroll->tax = $request->tax;
        $payroll->save();

        $notification=array(
                'message'=>"Payroll Update successfull",
                'alert-type'=>'success'
        );
        return redirect()->route('managePayroll')->with($notification);
    }

        

    public function manageAbsent(){

        $viewAll =Absent::get();
        return view('Hr.absent.manage',compact('viewAll'));
    }

    public function addAbsent()
    {
        return view('Hr.absent.create');
    }

    public function storeAbsent(Request $request)
    {
        $request->validate([
            "first" => ["required"],
            "other" => ["required"],
        ]);
        $absent = New Absent;
        $absent->first = $request->first;
        $absent->other = $request->other;
        $absent->save();
        $notification=array(
            'message'=>"Absent Saved successfull",
            'alert-type'=>'success'
        );
        return redirect()->route('manageAbsent')->with($notification);
    }

    public function deleteAbsent($id)
    {
        DB::table('absents')->where('id',$id)->delete();
        $notification=array(
            'message'=>"Absent Delete successfull",
            'alert-type'=>'success'
        );
        return redirect()->route('manageAbsent')->with($notification);
    }


    public function editAbsent($id){
        $p = DB::table('absents')->where('id',$id)->first();
        return view('Hr.absent.edit',compact('p'));
    }

    public function updateAbsent(Request $request, $id){
        $request->validate([
                "first" => ["required"],
                "other" => ["required"],
        ]);
        $absent =  Absent::find($id);
        $absent->first = $request->first;
        $absent->other = $request->other;
        $absent->save();
        $notification=array(
            'message'=>"Absent Saved successfull",
            'alert-type'=>'success'
        );
        return redirect()->route('manageAbsent')->with($notification);
    }

    /**
        * LateRoll
        */

    public function manageLateRoll(){

    $viewAll = LateRoll::get();
        return view('Hr.late_roll.manage',compact('viewAll'));
    }

    public function addLateRoll()
    {
        return view('Hr.late_roll.create');
    }

    public function storeLateRoll(Request $request)
    {
        $request->validate([
            "late" => ["required"],
            "absent" => ["required"],
        ]);

        $lateroll = New LateRoll;
        $lateroll->late = $request->late;
        $lateroll->absent = $request->absent;
        $lateroll->save();
        $notification=array(
            'message'=>"Late Roll Saved successfull",
            'alert-type'=>'success'
        );

    return redirect()->route('manageLateRoll')->with($notification);
    }

    public function deleteLateRoll($id)
    {
        DB::table('late_rolls')->where('id',$id)->delete();
        return back();
    }


    public function editLateRoll($id){
        $p = DB::table('late_rolls')->where('id',$id)->first();
        return view('Hr.late_roll.edit',compact('p'));
    }

    public function updateLateRoll(Request $request, $id){
        $request->validate([
                "late" => ["required"],
                "absent" => ["required"],
            ]);

        $lateroll =  LateRoll::find($id);
        $lateroll->late = $request->late;
        $lateroll->absent = $request->absent;
        $lateroll->save();
        $notification=array(
            'message'=>"Late Roll Update successfull",
            'alert-type'=>'success'
        );

        return redirect()->route('manageLateRoll')->with($notification);
    }



    /**
        * Overtime
        */

    public function manageOvertime(){

        $viewAll = Overtime::get();
        return view('Hr.overtime.manage',compact('viewAll'));
    }

    public function addOvertime()
    {
        return view('Hr.overtime.create');
    }

    public function storeOvertime(Request $request)
    {
        $request->validate([
            "hour" => ["required"],
            "amount" => ["required"],
        ]);
        $overtime = New Overtime;
        $overtime->hour = $request->hour;
        $overtime->amount = $request->amount;
        $overtime->save();
        $notification=array(
            'message'=>"Overtime Saved successfull",
            'alert-type'=>'success'
        );

        return redirect()->route('manageOvertime')->with($notification);
    }

    public function deleteOvertime($id)
    {
        DB::table('overtimes')->where('id',$id)->delete();
        return back();
    }


    public function editOvertime($id){
        $p = DB::table('overtimes')->where('id',$id)->first();
        return view('Hr.overtime.edit',compact('p'));
    }

    public function updateOvertime(Request $request, $id){
        $request->validate([
            "hour" => ["required"],
            "amount" => ["required"],
        ]);
        $overtime =  Overtime::find($id);
        $overtime->hour = $request->hour;
        $overtime->amount = $request->amount;
        $overtime->save();
        $notification=array(
            'message'=>"OverTime Update successfull",
            'alert-type'=>'success'
        );

        return redirect()->route('manageOvertime')->with($notification);
    }


        /**
            * Payment Range
            */

    public function managePaymentRange(){
        //dd("hi");
        $viewAll = Payment_range::get();
        $designations = DB::table('designations')->get();
        //dd($departments);
        return view('Hr.payment.manage',compact('viewAll','designations'));

    }



    public function storePaymentRange(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "max" => ["required"],
            "min" => ["required"],
            "department_id" => ["required"],
            "designation_id" => ["required"],
        ],[
            'max.required'=> 'Max is required',
            'min.required'=> 'Min is required',
            'department_id.required'=> 'Department is required',
            'designation_id.required'=> 'Designation is required',
        ]);
        if($validator->fails()){
            return response([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
        try{
            DB::beginTransaction();

            $payment_range = New Payment_range;
            $payment_range->department_id = $request->department_id;
            $payment_range->designation_id = $request->designation_id;
            $payment_range->minimum_amount = $request->min;
            $payment_range->maximum_amount = $request->max;
            $payment_range->save();
            DB::commit();
            return response([
                'status' => 1,
                'success' => 'Payment Range add successfully.',
            ]);

        }catch(\Exception $e){
            DB::rollBack();
            return response([
                'status' => 0,
                'error' => 'Something went Wrong!',
            ]);
        }
    }

    public function deletePaymentRange($id)
    {
        DB::table('payment_ranges')->where('id',$id)->delete();
        return back();
    }



       public function updatePaymentRange(Request $request, $id){
          $validator = Validator::make($request->all(),[
                   "max" => ["required"],
                   "min" => ["required"],
                   "department_id" => ["required"],
                   "designation_id" => ["required"],
                ],[
                    'max.required'=> 'Max is required',
                    'min.required'=> 'Min is required',
                    'department_id.required'=> 'Department is required',
                    'designation_id.required'=> 'Designation is required',
                ]);
                if($validator->fails()){
                    return response([
                        'status' => 0,
                        'errors' => $validator->errors()
                    ]);
                }
                try{
                    DB::beginTransaction();

                    $payment_range = Payment_range ::find($id);
                    $payment_range->department_id = $request->department_id;
                    $payment_range->designation_id = $request->designation_id;
                    $payment_range->minimum_amount = $request->min;
                    $payment_range->maximum_amount = $request->max;
                      $payment_range->save();
                    DB::commit();
                    return response([
                        'status' => 1,
                        'success' => 'Payment Range add successfully.',
                    ]);

                }catch(\Exception $e){
                    DB::rollBack();
                    return response([
                        'status' => 0,
                        'error' => 'Something went Wrong!',
                    ]);
                }
       }

        /** Size **/

           public function manageSize(){

            $viewAll = DB::table('sizes')->orderBy('id','desc')->get();
               return view('Hr.size.manage',compact('viewAll'));
            }

           public function storeSize(Request $request){

               DB::table('sizes')->insert([
               'name' => $request->name,
               ]);
               return redirect()->route('manageSize');
           }

           public function deleteSize($id)
           {
               DB::table('sizes')->where('id',$id)->delete();
               return redirect()->route('manageSize');
           }
            public function updateSize(Request $request,$id){

                DB::table('sizes')->where('id',$id)->update([
               'name' => $request->name,
               ]);
               return redirect()->route('manageSize');
           }

            /**
            * Color
            */

           public function manageColor(){

            $viewAll = DB::table('colors')->orderBy('id','desc')->get();
               return view('Hr.color.manage',compact('viewAll'));
            }

           public function storeColor(Request $request){

               DB::table('colors')->insert([
               'name' => $request->name,
               ]);
               return redirect()->route('manageColor');
           }

           public function deleteColor($id)
           {
               DB::table('colors')->where('id',$id)->delete();
               return redirect()->route('manageColor');
           }
            public function updateColor(Request $request,$id){

                DB::table('colors')->where('id',$id)->update([
               'name' => $request->name,
               ]);
               return redirect()->route('manageColor');
           }

           /**
            * Brand
            */

           public function manageBrand(){

            $viewAll = DB::table('brands')->orderBy('id','desc')->get();
               return view('Hr.brand.manage',compact('viewAll'));
            }

           public function storeBrand(Request $request){

               DB::table('brands')->insert([
               'name' => $request->name,
               ]);
               return redirect()->route('manageBrand');
           }

           public function deleteBrand($id)
           {
               DB::table('brands')->where('id',$id)->delete();
               return redirect()->route('manageBrand');
           }
            public function updateBrand(Request $request,$id){

                DB::table('brands')->where('id',$id)->update([
               'name' => $request->name,
               ]);
               return redirect()->route('manageBrand');
           }

           /**
            * Category
            */

           public function manageCategory(){

            $viewAll = DB::table('categories')->orderBy('id','desc')->get();
               return view('Hr.category.manage',compact('viewAll'));
            }

           public function storeCategory(Request $request){

               DB::table('categories')->insert([
               'name' => $request->name,
               ]);
               return redirect()->route('manageCategory');
           }

           public function deleteCategory($id)
           {
               DB::table('categories')->where('id',$id)->delete();
               return redirect()->route('manageCategory');
           }
            public function updateCategory(Request $request,$id){

                DB::table('categories')->where('id',$id)->update([
               'name' => $request->name,
               ]);
               return redirect()->route('manageCategory');
           }

            /**
            * Bank
            */

           public function manageBank(){

            $viewAll = DB::table('banks')->orderBy('id','desc')->get();
               return view('Hr.bank.manage',compact('viewAll'));
            }

           public function storeBank(Request $request){

               DB::table('banks')->insertGetId([
               'name' => $request->name . " Bank",
               ]);
               return redirect()->route('manageBank');
           }

           public function deleteBank($id)
           {
               DB::table('banks')->where('id',$id)->delete();
               return redirect()->route('manageBank');
           }
            public function updateBank(Request $request,$id){

                DB::table('banks')->where('id',$id)->update([
               'name' => $request->name,
               ]);
               return redirect()->route('manageBank');
           }


            /**
            * Branch
            */

           public function manageBranch(){
           $banks = DB::table('banks')->orderBy('id','desc')->get();
            $viewAll = DB::table('branches')->orderBy('id','desc')->get();
               return view('Hr.branch.manage',compact('viewAll','banks'));
            }

           public function storeBranch(Request $request){


              $data = [];

              foreach($request->names as $name){
               $t = [
                   "name" => $name,
                   "bank_id" => $request->bank_id,
               ];

               array_push($data,$t);
              }

               DB::table('branches')->insert($data);
               return redirect()->route('manageBranch');
           }

           public function deleteBranch($id)
           {
               DB::table('branches')->where('id',$id)->delete();
               return redirect()->route('manageBranch');
           }
            public function updateBranch(Request $request,$id){

                DB::table('branches')->where('id',$id)->update([
               'name' => $request->name,
               'bank_id' => $request->bank_id,
               ]);
               return redirect()->route('manageBranch');
           }

            /**
            * Internet Bank
            */

           public function manageInternetBank(){

            $viewAll = DB::table('internet_banks')->orderBy('id','desc')->get();
               return view('Hr.internet_bank.manage',compact('viewAll'));
            }

           public function storeInternetBank(Request $request){

               DB::table('internet_banks')->insert([
               'name' => $request->name ,
               ]);
               return redirect()->route('manageInternetBank');
           }

           public function deleteInternetBank($id)
           {
               DB::table('internet_banks')->where('id',$id)->delete();
               return redirect()->route('manageInternetBank');
           }
            public function updateInternetBank(Request $request,$id){

                DB::table('internet_banks')->where('id',$id)->update([
               'name' => $request->name,
               ]);
               return redirect()->route('manageInternetBank');
           }

            /**
            * Mobile Bank
            */

           public function manageMobileBank(){

            $viewAll = DB::table('mobile_banks')->orderBy('id','desc')->get();
               return view('Hr.mobile_bank.manage',compact('viewAll'));
            }

           public function storeMobileBank(Request $request){

               DB::table('mobile_banks')->insert([
               'name' => $request->name ,
               ]);
               return redirect()->route('manageMobileBank');
           }

           public function deleteMobileBank($id)
           {
               DB::table('mobile_banks')->where('id',$id)->delete();
               return redirect()->route('manageMobileBank');
           }
            public function updateMobileBank(Request $request,$id){

                DB::table('mobile_banks')->where('id',$id)->update([
               'name' => $request->name,
               ]);
               return redirect()->route('manageMobileBank');
           }

   }









