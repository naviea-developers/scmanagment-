<?php

namespace App\Http\Controllers\Backend\School_management\ClassDuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassDuration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClassDurationController extends Controller
{
    public function index()
    {
        return view("Backend.school_management.class_duration.manage");
    }


    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'status',
        );
        $totalData = ClassDuration::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = ClassDuration::query();
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
                $nestedData['start_time'] = $data_v->start_time;
                $nestedData['end_time'] = $data_v->end_time;
              
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.class_duration.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.class_duration.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.class_duration.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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
    //     return view("Backend.school_management.class_duration.create");
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',

            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status'=>'error',
                    'errors'=>$validator->errors()->all()
                ]);
        }
        try{
            DB::beginTransaction();
            $class_duration = New ClassDuration;
            $class_duration->name = $request->name;
            $class_duration->start_time = $request->start_time;
            $class_duration->end_time = $request->end_time;
            $class_duration->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Class Duration Add Successfully'
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
        $data["class_duration"]= ClassDuration::find($id);
        return view("Backend.school_management.class_duration.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',

            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status'=>'error',
                    'errors'=>$validator->errors()->all()
                ]);
        }
    try{
        DB::beginTransaction();
        $class_duration = ClassDuration::find($id);
        $class_duration->name = $request->name;
        $class_duration->start_time = $request->start_time;
        $class_duration->end_time = $request->end_time;
        $class_duration->save();

        DB::commit();
        return response()->json([
            'status'=>'yes',
            'msg'=>'Class Duration Update Successfully'
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
            $class_duration =  ClassDuration::find($request->class_duration_id);
            $class_duration->delete();
             
             return response()->json([
                 'status'=>'yes',
                 'msg'=>'Class Duration Deleted Successfully'
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
         $class_duration = ClassDuration::find($id);
         if ($class_duration) {
             if ($class_duration->status == 0) {
                 $class_duration->status = 1;
             } elseif ($class_duration->status == 1) {
                 $class_duration->status = 0;
             }
             $class_duration->update();
 
             $statusMessage = $class_duration->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';
 
             return response()->json([
                 'status'=>'yes',
                 'msg'=>$statusMessage
             ]);
         }
 
        
         return response()->json([
             'status'=>'no',
             'msg'=>'Class Duration not found'
         ]);
     }
}
