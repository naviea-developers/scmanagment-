<?php

namespace App\Http\Controllers\Backend\School_management\Lession;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Lession;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LessionController extends Controller
{
    public function index()
    {
        $data['classes']= Classe::where('status', 1)->orderBy('id','asc')->get();
        $data['subjects'] = Subject::where('status', 1)->orderBy('id','desc')->get();
        return view("Backend.school_management.lession.manage",$data);
    }


    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'class_id',
            2 => 'subject_id',
            3 => 'name',
            4 => 'status',
        );
        $totalData = Lession::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Lession::query();
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
                $nestedData['subject_id'] = @$data_v->subject->name;
                $nestedData['name'] = $data_v->name;
              
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.lession.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.lession.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.lession.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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
    //     $data['classes']= Classe::where('status', 1)->orderBy('id','asc')->get();
    //     $data['subjects'] = Subject::where('status', 1)->orderBy('id','desc')->get();
    //     return view("Backend.school_management.lession.create",$data);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
            'subject_id' => 'required',
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
            $lession = New Lession;
            $lession->class_id = $request->class_id ?? 0;
            $lession->subject_id = $request->subject_id ?? 0;
            $lession->name = $request->name;
            $lession->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Lession Add Successfully'
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
    // public function edit(string $id)
    // {
    //     $data["lession"] = $class = Lession::find($id);
    //     $data['classes'] = Classe::where('status', 1)->orderBy('id','asc')->get();
    //     $data['subjects'] = Subject::where('class_id', $class)->where('status', 1)->orderBy('id','desc')->get();
    //     return view("Backend.school_management.lession.update",$data);
    // }


    public function edit(string $id)
    {
        $lession = Lession::find($id);
        $data["lession"] = $lession;
    
        $classId = $lession->class_id; 
    
        $data['classes'] = Classe::where('status', 1)->orderBy('id', 'asc')->get();
    
        $data['subjects'] = Subject::where('class_id', $classId)->where('status', 1)->orderBy('id', 'desc')->get();
    
        return view("Backend.school_management.lession.update", $data);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
             'subject_id' => 'required',
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
            $lession = Lession::find($id);
            $lession->class_id = $request->class_id ?? 0;
            $lession->subject_id = $request->subject_id ?? 0;
            $lession->name = $request->name;
            $lession->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Lession Update Successfully'
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
            $lession =  Lession::find($request->lession_id);
            $lession->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Lession Deleted Successfully'
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
        $lession = Lession::find($id);
        if ($lession) {
            if ($lession->status == 0) {
                $lession->status = 1;
            } elseif ($lession->status == 1) {
                $lession->status = 0;
            }
            $lession->update();

            $statusMessage = $lession->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Lession not found'
        ]);
    }
}
