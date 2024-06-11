<?php

namespace App\Http\Controllers\Backend\School_management\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bulding;
use App\Models\NoticeType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NoticeTypeController extends Controller
{
    public function index()
    {
        return view("Backend.school_management.notice_type.manage");
    }


    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'status',
        );
        $totalData = NoticeType::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = NoticeType::query();
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
                $nestedData['name'] = $data_v->name;
              
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.notice_type.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.notice_type.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.notice_type.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
                $nestedData['options'] .= '<button class="btn text-danger bg-white"  value="'.$data_v->id.'" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>';
 
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
    //     return view("Backend.school_management.notice_type.create");
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $validator = Validator::make($request->all(), [
        'name' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $notice_type = New NoticeType;
            $notice_type->name = $request->name;
            $notice_type->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Notice Type Add Successfully'
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
        $data["noticeType"]= NoticeType::find($id);
        return view("Backend.school_management.notice_type.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
    
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status'=>'error',
                    'errors'=>$validator->errors()->all()
                ]);
            }
        try{
            DB::beginTransaction();
            $notice_type = NoticeType::find($id);
            $notice_type->name = $request->name;
            $notice_type->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Notice Type Update Successfully'
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
            $notice_type =  NoticeType::find($request->notice_type_id);
            $notice_type->delete();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Notice Type Deleted Successfully'
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
        $notice_type = NoticeType::find($id);
        if ($notice_type) {
            if ($notice_type->status == 0) {
                $notice_type->status = 1;
            } elseif ($notice_type->status == 1) {
                $notice_type->status = 0;
            }
            $notice_type->update();

            $statusMessage = $notice_type->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Notice Type not found'
        ]);
    }
}
