<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\FeeManagement;
use App\Models\Fee;
use App\Models\Session;
use App\Models\Admission;
use App\Models\Account\FeeCollection;
use App\Models\Account\FeeCollectionItem;
use App\Models\Account\PaymentMethod;
use App\Models\Account\AccountHead;
use App\Models\Account\AccountTransaction;
use App\Models\Account\BalanceAccount;
use App\Models\Account\Payment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class FeeCollectionController extends Controller
{
    function index(){
        $data['methods']=PaymentMethod::orderBy('id','DESC')->get();
        $data['fee_managements'] = FeeManagement::orderBy('id', 'desc')->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['fee_names'] = Fee::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        //dd("sss");
        return view ('Accounts.fee_collection.index',$data); 
    }
    function getFees(Request $request){
        $fees  = FeeManagement::where('session_id',$request->session_id)
        ->where('class_id',$request->class_id)
        ->get();

        return view('Accounts.fee_collection.fee-list',compact('fees'));
    }
    function getStudent(Request $request){
        $students  = Admission::where('session_id',$request->session_id)->where('class_id',$request->class_id)->where('section_id',$request->section_id)->get();
        $total_fee = $request->total_fee;
        return view('Accounts.fee_collection.student-list',compact('students','total_fee'));
    }
    function select2Student(Request $request){
        $datalist  = Admission::where('session_id',$request->session_id)
        ->where('class_id',$request->class_id)
        ->where('section_id',$request->section_id)
        ->where('student_name',"LIKE", "%$request->value%")
        ->get();
        $data_op[]=['id' =>0, 'text' => 'Select Student'];
        foreach ($datalist as $data) {
            $data_op[] = ['id' => $data->id, 'text' => $data->student_name];
        }
        return json_encode($data_op);
    }
    function init_account(){
        
        $feeHead = AccountHead::where("code",'4000')->first();
        if($feeHead == null){
            $feeHead = new AccountHead;
            $feeHead->title = "Student Fee";
            $feeHead->code = '4000';
            $feeHead->sys = 0;
            $feeHead->ac_type = 4;
            $feeHead->note = '';
            $feeHead->status = 1;
            $feeHead->save();
        }
        
    }
    function ajaxFeeCollection(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'payment_methods.name',
            2 => 'expenses.reason',
            3 => 'expenses.amount',
            4 => 'expenses.date',
            5 => 'payment_methods.name',
            6 => 'balance_accounts.account_name',
        );
        $totalData = FeeCollectionItem::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = FeeCollection::leftJoin('payment_methods','payment_methods.id','fee_collections.method_id')
        ->leftJoin('balance_accounts','balance_accounts.id','fee_collections.account_id')
        ->leftJoin('admissions','admissions.id','fee_collections.student_id')
        ->leftJoin('classes','classes.id','fee_collections.class_id')
        ->leftJoin('school_sections','school_sections.id','fee_collections.section_id')
        ->leftJoin('sessions','sessions.id','fee_collections.session_id');
        if(!empty($search)){
            $datalist =$datalist->where("admissions.student_name","LIKE","%{$search}%")
            ->orwhere("payment_methods.name","LIKE","%{$search}%")  
            ->orwhere("balance_accounts.account_name","LIKE","%{$search}%") 
            ->orwhere("fee_collections.total_amount","LIKE","%{$search}%")  
            ->orwhere("fee_collections.pay_date","LIKE","%{$search}%") 
            ->orwhere("classes.name","LIKE","%{$search}%")
            ->orwhere("school_sections.name","LIKE","%{$search}%")
            ->orwhere("fees.particular_name","LIKE","%{$search}%");  
        }
        $totalFiltered = $datalist->count();
        $datalist = $datalist->select('fee_collections.*','admissions.student_name','admissions.roll_number','classes.name as class_name','school_sections.name as section_name','payment_methods.name as p_name','balance_accounts.account_name as ac_name','sessions.start_year','sessions.end_year')->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        
 
        $data = array();
        if(!empty($datalist))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($datalist as $data_v)
            {
                $nestedData['id'] = $i++;
                $nestedData['session'] = $data_v->start_year.'-'.$data_v->end_year;
                $nestedData['slip_no'] = $data_v->slip_no;
                $nestedData['class_name'] = $data_v->class_name;
                $nestedData['section_name'] = $data_v->section_name;
                $nestedData['student_name'] = $data_v->student_name;
                $nestedData['roll_number'] = $data_v->roll_number;
                $nestedData['p_name'] = $data_v->p_name;
                $nestedData['ac_name'] = $data_v->ac_name;
                $nestedData['date'] = date('Y-m-d',strtotime($data_v->pay_date));
                $nestedData['total_amount'] = round($data_v->total_amount,2);

                $nestedData['options']='';
                
                $nestedData['options'] .= '<a class="btn btn-primary data_edit" href="'.route('fee_collection.view',$data_v->id).'" data-bs-toggle="modal" data-bs-target="#updateModal" data-id="'.$data_v->id.'">view</a>';
            
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
    function store(Request $request){
       // dd($request->all());
        if($request->student > 0){
            $validator = Validator::make($request->all(),[
                'class'=>'required',
                'session'=>'required',
                'date'=>'required',
                'section'=>'required',
                'fees'=>'required',
                'payment_method'=>'required',
                'account'=>'required',
    
            ]);
            $students[]=$request->student;
        }else{
            $validator = Validator::make($request->all(),[
                'class'=>'required',
                'session'=>'required',
                'section'=>'required',
                'date'=>'required',
                'fees'=>'required',
                'payment_method'=>'required',
                'account'=>'required',
                'f_students'=>'required',
    
            ]);
            $students=$request->f_students;
        }
       //dd();

        if($validator->fails()){
            return response([
                'status' => 'error',
                'errors' => $validator->errors()->all()
            ]);
        }
       
        try{
            DB::beginTransaction();
            foreach($students as $student_id){

                
                $data=new FeeCollection();
                $data->slip_no = 'ex-' . date("Ymd") . '-'. date("his");
                $data->class_id=$request->class;
                $data->session_id=$request->session;
                $data->student_id=$student_id;
                $data->section_id=$request->section;
                $data->pay_date=$request->date;
                $data->receive_amount=$request->fee_t_amount;
                $data->total_amount=$request->fee_t_amount;
                $data->method_id=$request->payment_method;
                $data->account_id=$request->account;
                $data->save();

                foreach($request->fees as $k=>$fee){
                    $fee_setup = FeeManagement::find($k);
                    $item = new FeeCollectionItem;
                    $item->collection_id = $data->id;
                    $item->class_id=$request->class;
                    $item->student_id=$student_id;
                    $item->session_id=$request->session;
                    $item->fee_amount=$fee;
                    $item->pay_date=$request->date;
                    $item->fee_id=$fee_setup->fee_id;
                    $item->fee_setup_id=$k;
                    $item->save();
                }
                $this->init_account();
                $feeHead = AccountHead::where("code",'4000')->first();

                $sc_trans = New AccountTransaction;
                $sc_trans->amount = round($request->fee_t_amount,2);
                $sc_trans->account_id = $feeHead->id;
                $sc_trans->type = "credit";
                $sc_trans->sub_type = "Student Fee";
                $sc_trans->reason = $data->slip_no ." from Student Fee Payment";
                $sc_trans->date = $request->date == null ?  date('Y-m-d') :  Carbon::parse($request->date)->format('Y-m-d');
                $sc_trans->relation_id = $data->id;
                $sc_trans->student_id = $student_id;
                $sc_trans->relation_with = "Student Fee";
                $sc_trans->save();

                $payment = New Payment;
                $payment->payment_method= $request->payment_method;
                $payment->bank_account_id= $request->account;
                $payment->student_id = $student_id;
                // $payment->transaction_id= $sc_pay_transaction->id;
                $payment->relation_id = $data->id;
                $payment->relation_type = $data->slip_no ." from Student Fee Payment";
                $payment->amount = round($request->fee_t_amount,2);
                $payment->date =$request->date == null ?  date('Y-m-d') :  Carbon::parse($request->date)->format('Y-m-d');
                $payment->note = '--';
                $payment->save();

                $balance_account = BalanceAccount::find($request->account);
                $pay_trans = New AccountTransaction;
                $pay_trans->amount = round($request->fee_t_amount,2);
                $pay_trans->account_id = $balance_account->account_head_id;
                $pay_trans->type = "debit";
                $pay_trans->sub_type = "Student Fee";
                $pay_trans->reason = $data->slip_no ." from Student Fee Payment";
                $pay_trans->date = $request->date == null ?  date('Y-m-d') :  Carbon::parse($request->date)->format('Y-m-d');
                $pay_trans->relation_id = $data->id;
                $pay_trans->relation_with = "Student Fee";
                $pay_trans->payment_id = $payment->id;
                $pay_trans->trans_id = $sc_trans->id;
                $pay_trans->student_id = $student_id;
                $pay_trans->save();
                $payment->transaction_id= $pay_trans->id;
                $payment->save();
                $sc_trans->trans_id = $pay_trans->id;
                $sc_trans->save();
            }

            DB::commit();
           
            return response([
                'status' => 'yes',
                'msg' => 'Save successfully.',
            ]);
          
        }catch(\Exception $e){
            DB::rollBack();
            return response([
                'status' => 'no',
                'msg' => $e->getMessage(),
            ]);
        }
    }
    function view(Request $request,$id){
        $fee_collection=FeeCollection::find($id);
        return view('Accounts.fee_collection.view',compact('fee_collection'));
    }
    public function delete(Request $request,$id)
    {
        try{
            DB::beginTransaction();

            $data=FeeCollection::find($id);
           
            $account_transactions = AccountTransaction::where('relation_id',$data->id)->get();
          
            foreach($account_transactions as $account_transaction){
                $account_transaction->delete();
            }
            $items = FeeCollectionItem::where('collection_id',$data->id)->get();
            foreach($items as $item){
                $item->delete();
            }
            $payment = Payment::where('relation_id',$data->id)->first();
            if($payment){
                $payment->delete();
            }
            $data->delete();
            
            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Deleted Successfully'
            ]);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
        
    }
}
