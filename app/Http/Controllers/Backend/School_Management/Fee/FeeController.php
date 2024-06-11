<?php

namespace App\Http\Controllers\Backend\School_management\Fee;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FeeController extends Controller
{
    public function index()
    {
        return view("Backend.school_management.fee.manage");
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'particular_name',
            2 => 'status',
        );
        $totalData = Fee::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Fee::query();
        if(!empty($search)){
 
            $datalist =$datalist->where("particular_name","LIKE","%{$search}%");
           
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
                $nestedData['particular_name'] = $data_v->particular_name;
              
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.fee.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.fee.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '';
                if ($data_v->is_constant == 0) {
                    $nestedData['options'] .= '<a class="btn btn-primary data_edit" href="'.route('admin.fee.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
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
    //     return view("Backend.school_management.fee.create");
    // }


    public function store(Request $request)
    {
      // dd($request->all());
        $validator = Validator::make($request->all(), [
        'particular_name' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $fee = New Fee();
            $fee->particular_name = $request->particular_name;
            // $fee->particular_duration = $request->particular_duration;
            $fee->is_dynamic = $request->is_dynamic ?? 0;
            $fee->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Bulding Add Successfully'
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
        $data["fee"]= Fee::find($id);
        return view("Backend.school_management.fee.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'particular_name' => 'required',
    
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status'=>'error',
                    'errors'=>$validator->errors()->all()
                ]);
            }
        try{
            DB::beginTransaction();
            $fee = Fee::find($id);
            $fee->particular_name = $request->particular_name;
            // $fee->particular_duration = $request->particular_duration;
            $fee->is_dynamic = $request->is_dynamic ?? 0;
            $fee->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Bulding Update Successfully'
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
            $fee =  Fee::find($request->fee_id);
            $fee->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Fee Name Deleted Successfully'
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
        $fee = Fee::find($id);
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
            'msg'=>'Building not found'
        ]);
    }
}
