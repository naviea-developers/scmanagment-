<?php

namespace App\Http\Controllers\Backend\School_management\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    public function index()
    {
        // $data['groups'] = Group::orderBy('id', 'desc')->get();
        $data['classes'] = Classe::orderBy('id', 'desc')->get();
        return view("Backend.school_management.group.manage",$data);
    }


    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'class_id',
            2 => 'name',
            3 => 'status',
        );
        $totalData = Group::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Group::query();
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
                $nestedData['name'] = $data_v->name;
              
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.group.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.group.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.group.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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
    //     $data['classes'] = Classe::orderBy('id', 'desc')->get();
    //     return view("Backend.school_management.group.create",$data);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
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
            $group = New Group;
            $group->name = $request->name;
            $group->class_id = $request->class_id;
            $group->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Group Add Successfully'
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
        $data["group"]= Group::find($id);
        $data['classes'] = Classe::orderBy('id', 'desc')->get();
        return view("Backend.school_management.group.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
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
            $group = Group::find($id);
            $group->name = $request->name;
            $group->class_id = $request->class_id;
            $group->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Group Update Successfully'
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
            $group =  Group::find($request->group_id);
            $group->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Group Deleted Successfully'
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
        $group = Group::find($id);
        if ($group) {
            if ($group->status == 0) {
                $group->status = 1;
            } elseif ($group->status == 1) {
                $group->status = 0;
            }
            $group->update();

            $statusMessage = $group->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Group not found'
        ]);
    }
}
