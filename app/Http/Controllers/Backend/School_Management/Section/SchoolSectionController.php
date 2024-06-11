<?php

namespace App\Http\Controllers\Backend\School_management\Section;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\SchoolSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SchoolSectionController extends Controller
{
    public function index()
    {
        $data['classes'] = Classe::where('status', 1)->get();
        return view("Backend.school_management.section.manage",$data);
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'class_id',
            2 => 'name',
            3 => 'status',
        );
        $totalData = SchoolSection::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = SchoolSection::query();
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
                    $nestedData['status'] .= '<a href="'.route('admin.school_section.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.school_section.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.school_section.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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
    //     $data['classes'] = Classe::where('status', 1)->get();
    //     return view("Backend.school_management.section.create", $data);
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
            $section = New SchoolSection;
            $section->class_id = $request->class_id;
            $section->name = $request->name;
            $section->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Section Add Successfully'
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
        $data["section"]= SchoolSection::find($id);
        $data['classes'] = Classe::where('status', 1)->get();
        return view("Backend.school_management.section.update",$data);
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
            $section = SchoolSection::find($id);
            $section->class_id = $request->class_id;
            $section->name = $request->name;
            $section->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Section Update Successfully'
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
            $section =  SchoolSection::find($request->school_section_id);
        $section->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Section Deleted Successfully'
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
        $section = SchoolSection::find($id);
        if ($section) {
            if ($section->status == 0) {
                $section->status = 1;
            } elseif ($section->status == 1) {
                $section->status = 0;
            }
            $section->update();

            $statusMessage = $section->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Section not found'
        ]);
    }
}
