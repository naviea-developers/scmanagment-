<?php

namespace App\Http\Controllers\Backend\School_Management\SubjectTeacherAssent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\User;
use App\Models\Session;
use App\Models\SchoolSection;
use App\Models\SubjectTeacherAssent;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SubjectTeacherAssentController extends Controller
{
    public function index()
    {
        $data['subject_teacher_assents'] = SubjectTeacherAssent::orderBy('id', 'desc')->get();
        $data['teachers'] = User::where('type', 2)->where('status', 1)->get();
        $data['sessions'] = Session::orderBy('id', 'desc')->where('status', 1)->get();
        $data['sections'] = SchoolSection::orderBy('id', 'desc')->where('status', 1)->get();
        $data['classes'] = Classe::orderBy('id', 'asc')->where('status', 1)->get();
        $data['subjectName']=Subject::orderBy('id', 'asc')->get();
        return view("Backend.school_management.subject_teacher_assent.manage",$data);
    }


    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'class_id',
            2 => 'teacher_id',
            3 => 'subject_id',
            4 => 'schoolsection_id',
            5 => 'session_id',
            6 => 'status',

        );
        $totalData = SubjectTeacherAssent::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = SubjectTeacherAssent::query();
        if(!empty($search)){
            $datalist =$datalist->where("class_id","LIKE","%{$search}%");
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
                $nestedData['class_id'] = $data_v->class->name;
                $nestedData['teacher_id'] = $data_v->teacher->name;
                $nestedData['subject_id'] = $data_v->subject->name;
                $nestedData['schoolsection_id'] = $data_v->schoolsection->name;
                $nestedData['session_id'] = $data_v->session->start_year ." - ". $data_v->session->end_year;
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.subject_teacher_assent.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.subject_teacher_assent.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.subject_teacher_assent.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
                $nestedData['options'] .= '<button class="btn text-danger bg-white"  value="'.$data_v->id.'" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>';
 
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['teachers'] = User::where('type', 2)->where('status', 1)->get();
        $data['sessions'] = Session::orderBy('id', 'desc')->where('status', 1)->get();
        $data['sections'] = SchoolSection::orderBy('id', 'desc')->where('status', 1)->get();
        $data['classes'] = Classe::orderBy('id', 'asc')->where('status', 1)->get();
        $data['subjectName']=Subject::orderBy('id', 'asc')->get();
        return view("Backend.school_management.subject_teacher_assent.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
      // dd($request->all());
        
        $validator = Validator::make($request->all(), [
            'teacher_id' => 'required',
            'class_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $subject_teacher_assent = New SubjectTeacherAssent;
            $subject_teacher_assent->teacher_id = $request->teacher_id;
            $subject_teacher_assent->class_id = $request->class_id;
            $subject_teacher_assent->section_id = $request->section_id;
            $subject_teacher_assent->session_id = $request->session_id;
            $subject_teacher_assent->subject_id = $request->subject_id;
            $subject_teacher_assent->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Class Teacher Assent Add Successfully'
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
        $data["subject_teacher_assent"]=$subject_teacher_assent= SubjectTeacherAssent::find($id);
        $data['teachers'] = User::where('type', 2)->where('status', 1)->get();
        $data['sessions'] = Session::orderBy('id', 'desc')->where('status', 1)->get();
        // $data['sections'] = SchoolSection::orderBy('id', 'desc')->where('status', 1)->get();
        $data['subjectName']=Subject::where('class_id',$subject_teacher_assent->class_id)->orderBy('id', 'asc')->get();
        $data['sections']=SchoolSection::where('class_id',$subject_teacher_assent->class_id)->where('status', 1)->orderBy('id', 'asc')->get();
        $data['classes'] = Classe::where('id',$subject_teacher_assent->class_id)->orderBy('id', 'desc')->where('status', 1)->get();
        return view("Backend.school_management.subject_teacher_assent.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'teacher_id' => 'required',
            'class_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $subject_teacher_assent = SubjectTeacherAssent::find($id);
            $subject_teacher_assent->teacher_id = $request->teacher_id;
            $subject_teacher_assent->class_id = $request->class_id;
            $subject_teacher_assent->section_id = $request->section_id;
            $subject_teacher_assent->session_id = $request->session_id;
            $subject_teacher_assent->subject_id = $request->subject_id;
            $subject_teacher_assent->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Class Teacher Assent Update Successfully'
            ]);
            
        }catch(\Exception $e){
            DB::rollBack();
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
            $subject_teacher_assent =  SubjectTeacherAssent::find($request->subject_teacher_assent_id);
            $subject_teacher_assent->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Subject Teacher Assent Deleted Successfully'
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
        $subject_teacher_assent = SubjectTeacherAssent::find($id);
        if ($subject_teacher_assent) {
            if ($subject_teacher_assent->status == 0) {
                $subject_teacher_assent->status = 1;
            } elseif ($subject_teacher_assent->status == 1) {
                $subject_teacher_assent->status = 0;
            }
            $subject_teacher_assent->update();

            $statusMessage = $subject_teacher_assent->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

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
