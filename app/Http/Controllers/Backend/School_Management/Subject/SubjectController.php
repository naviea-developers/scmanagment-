<?php

namespace App\Http\Controllers\Backend\School_management\Subject;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Group;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function index()
    {
        $data['classes'] = Classe::where('status', 1)->orderBy('id','asc')->get();
        $data['groups'] = Group::where('status', 1)->orderBy('id','desc')->get();
        return view("Backend.school_management.subject.manage",$data);
    }


    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'imahe',
            2 => 'name',
            3 => 'class_id',
            4 => 'group_id',
            5 => 'status',
        );
        $totalData = Subject::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Subject::query();
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
                $nestedData['image'] = '<img src="' . $data_v->image_show . '" alt="subject Image" width="50" height="50">';
                $nestedData['name'] = $data_v->name;
                $nestedData['class_id'] = @$data_v->class->name;
                $nestedData['group_id'] = @$data_v->group->name;
              
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.subject.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.subject.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.subject.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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
    //     $data['classes'] = Classe::where('status', 1)->orderBy('id','asc')->get();
    //     $data['groups'] = Group::where('status', 1)->orderBy('id','desc')->get();
    //     return view("Backend.school_management.subject.create",$data);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'name' => 'required',
            'class_id' => 'required',
            // 'group_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $subject = New Subject;
            $subject->class_id = $request->class_id;
            $subject->name = $request->name;
            $subject->group_id = $request->group_id ?? 0;

            if($request->hasFile('image')){
                $fileName = rand().time().'_subject_image.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/subject/'),$fileName);
                $subject->image = $fileName;
            }
            $subject->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Subject Add Successfully'
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
        $data["subject"]=$class=  Subject::find($id);
        $data['classes'] = Classe::where('status', 1)->orderBy('id','asc')->get();
        $data['groups'] = Group::where('class_id', $class->class_id)->where('status', 1)->orderBy('id','desc')->get();
        return view("Backend.school_management.subject.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            // 'image' => 'required',
            'name' => 'required',
            'class_id' => 'required',
            // 'group_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $subject = Subject::find($id);
            $subject->class_id = $request->class_id;
            $subject->name = $request->name;
            $subject->group_id = $request->group_id ?? 0;
            if($request->hasFile('image')){
                @unlink(public_path('upload/subject/'.$subject->image));
                $fileName = rand().time().'_subject_image.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/subject/'),$fileName);
                $subject->image = $fileName;
            }
            $subject->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Subject Update Successfully'
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
            $subject =  Subject::find($request->subject_id);
            $subject->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Subject Deleted Successfully'
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
        $subject = Subject::find($id);
        if ($subject) {
            if ($subject->status == 0) {
                $subject->status = 1;
            } elseif ($subject->status == 1) {
                $subject->status = 0;
            }
            $subject->update();

            $statusMessage = $subject->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Subject not found'
        ]);
    }
}
