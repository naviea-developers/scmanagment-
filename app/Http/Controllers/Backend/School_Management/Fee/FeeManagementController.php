<?php

namespace App\Http\Controllers\Backend\School_management\Fee;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Fee;
use App\Models\FeeManagement;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FeeManagementController extends Controller
{
    public function index()
    {
        $data['classes'] = Classe::where('status', 1)->get();
        $data['fee_names'] = Fee::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        return view("Backend.school_management.fee_management.manage",$data);
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'class_id',
            2 => 'session_id',
            3 => 'fee_id',
            4 => 'fee_amount',
            5 => 'status',
        );
        $totalData = FeeManagement::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = FeeManagement::query();
        if(!empty($search)){
 
            $datalist =$datalist->where("name","LIKE","%{$search}%");
           
        }
        
        $totalFiltered = $datalist->count();
         $datalist = $datalist->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        
 
        $data = array();
        if(!empty($datalist))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($datalist as $data_v)
            {
                $nestedData['id'] = $data_v->id;
                $nestedData['class_id'] = @$data_v->class->name;
                $nestedData['session_id'] = @$data_v->session->start_year . ' - ' . @$data_v->session->end_year;
                $nestedData['fee_id'] = @$data_v->fee->particular_name;
                $nestedData['fee_amount'] = $data_v->fee_amount;
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.fee_management.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.fee_management.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 

                $nestedData['options'] = '';
                if ($data_v->fee->is_constant == 1 || $data_v->fee->is_constant == 2){
                    $nestedData['options'] .= '<a class="btn btn-primary data_edit" href="'.route('admin.fee_management.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
                }elseif ($data_v->fee->is_constant == 0){
                    $nestedData['options'] .= '<a class="btn btn-primary data_edit" href="'.route('admin.fee_management.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
                    $nestedData['options'] .= '<button class="btn text-danger bg-white" value="'.$data_v->id.'" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>';
                }

                $data[] = $nestedData;
 
            }
        }
        $json_data = [
            'draw' => intval($request->input('draw')),
            'recordsTotal' => intval($totalData),
            'recordsFiltered' => intval($totalFiltered),
            'data' => $data
        ];
    
        return response()->json($json_data);
    }


    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $data['classes'] = Classe::where('status', 1)->get();
    //     $data['fee_names'] = Fee::where('status', 1)->get();
    //     $data['sessions'] = Session::where('status', 1)->get();
    //     return view("Backend.school_management.fee_management.create", $data);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $validator = Validator::make($request->all(), [
        'class_id' => 'required',
        'session_id' => 'required',
        'fee_id' => 'required',
        'fee_amount' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $fee = New FeeManagement();
            $fee->session_id = $request->session_id;
            $fee->class_id = $request->class_id;
            $fee->fee_id = $request->fee_id;
            $fee->fee_amount = $request->fee_amount;
            $fee->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Fee Add Successfully'
            ]);
        }catch(\Exception $e){
            DB::rollBack();
            // dd($e);
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       // dd('hi');
        $data["fee_management"]= FeeManagement::find($id);
        $data['classes'] = Classe::where('status', 1)->get();
        $data['fee_names'] = Fee::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        return view("Backend.school_management.fee_management.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
            'session_id' => 'required',
            'fee_id' => 'required',
            'fee_amount' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status'=>'error',
                    'errors'=>$validator->errors()->all()
                ]);
            }
        try{
            DB::beginTransaction();
            $fee = FeeManagement::find($id);
            $fee->session_id = $request->session_id;
            $fee->class_id = $request->class_id;
            $fee->fee_id = $request->fee_id;
            $fee->fee_amount = $request->fee_amount;
            $fee->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Fee Update Successfully'
            ]);
        }catch(\Exception $e){
            DB::rollBack();
        // dd($e);
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Request $request)
    {
        //dd($request);
        try{
            $fee =  FeeManagement::find($request->fee_management_id);
            $fee->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Fee Deleted Successfully'
            ]);
        }catch(\Exception $e){
            //DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }


    public function status($id)
    {
        $fee = FeeManagement::find($id);
        if ($fee) {
            if ($fee->status == 0) {
                $fee->status = 1;
            } elseif ($fee->status == 1) {
                $fee->status = 0;
            }
            $fee->update();

            $statusMessage = $fee->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Fee not found'
        ]);
    }
}
