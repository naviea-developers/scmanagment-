<?php

namespace App\Http\Controllers\Backend\School_management\TopperStudent;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Admission;
use App\Models\Classe;
use App\Models\Examination;
use App\Models\Group;
use App\Models\SchoolSection;
use App\Models\Session;
use App\Models\TopperStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TopperStudentController extends Controller
{
    public function index()
    { 
        $data['toppers'] = TopperStudent::all();
        $data['students'] = Admission::where('is_new', 0)->where('status', 1)->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['academic_years'] = AcademicYear::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        $data['examinations'] = Examination::where('exam_priority', 'main')->where('status', 1)->get();
        return view('Backend.school_management.topper_student.manage', $data);
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'academic_year',
            2 => 'examination',
            3 => 'image',
            4 => 'student_name',
            5 => 'class',
            6 => 'section',
            6 => 'group',
            7 => 'status',
        );
        $totalData = TopperStudent::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = TopperStudent::query();
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
                $nestedData['id'] = @$data_v->id;
                $nestedData['academic_year'] = @$data_v->academic_year->year;
                $nestedData['examination'] = @$data_v->examination->name;
                $nestedData['image'] = @$data_v->class->name;
                $nestedData['student_name'] = @$data_v->student->student_name;
                $nestedData['class'] = @$data_v->class->name;
                $nestedData['section'] = @$data_v->section->name;
                $nestedData['group'] = @$data_v->group->name;

                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.topper_student.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.topper_student.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.topper_student.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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

    // public function create()
    // {
    //     $data['students'] = Admission::where('is_new', 0)->where('status', 1)->get();
    //     $data['classes'] = Classe::where('status', 1)->get();
    //     $data['academic_years'] = AcademicYear::where('status', 1)->get();
    //     $data['sessions'] = Session::where('status', 1)->get();
    //     $data['sections'] = SchoolSection::where('status', 1)->get();
    //     $data['groups'] = Group::where('status', 1)->get();
    //     $data['examinations'] = Examination::where('exam_priority', 'main')->where('status', 1)->get();
    //     return view('Backend.school_management.topper_student.create', $data);
    // }

    // public function store(Request $request)
    // {
    //     $topper = new TopperStudent();
    //     $topper->academic_year_id = $request->academic_year_id ?? 0;
    //     $topper->session_id = $request->session_id ?? 0;
    //     $topper->student_id = $request->student_id ?? 0;
    //     $topper->class_id = $request->class_id ?? 0;
    //     $topper->section_id = $request->section_id ?? 0;
    //     $topper->group_id = $request->group_id ?? 0;
    //     $topper->examination_id = $request->examination_id ?? 0;
    //     $topper->result = $request->result;
    //     $topper->details = $request->details;
    //     $topper->save();
    //     return redirect()->route('admin.topper_student.index')->with('message', 'Topper student added successfully, thank you.');
    // }

    public function store(Request $request)
    {
      // dd($request->all());
        
        $validator = Validator::make($request->all(), [
            'academic_year_id' => 'required',
            'student_id' => 'required',
            'examination_id' => 'required',
            'result' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $topper = new TopperStudent();
            $topper->academic_year_id = $request->academic_year_id ?? 0;
            $topper->session_id = $request->session_id ?? 0;
            $topper->student_id = $request->student_id ?? 0;
            $topper->class_id = $request->class_id ?? 0;
            $topper->section_id = $request->section_id ?? 0;
            $topper->group_id = $request->group_id ?? 0;
            $topper->examination_id = $request->examination_id ?? 0;
            $topper->result = $request->result;
            $topper->details = $request->details;
            $topper->save();

            DB::commit();
           
            return response()->json([
                'status'=>'yes',
                'msg'=>'Topper Student Add Successfully'
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

    public function edit($id)
    { 
        $data['topper'] = $class = TopperStudent::find($id);
        $data['students'] = Admission::where('class_id', $class->class_id)->where('is_new', 0)->where('status', 1)->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['academic_years'] = AcademicYear::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('class_id', $class->class_id)->where('status', 1)->get();
        $data['groups'] = Group::where('class_id', $class->class_id)->where('status', 1)->get();
        $data['examinations'] = Examination::where('exam_priority', 'main')->where('status', 1)->get();
        return view('Backend.school_management.topper_student.update', $data);
    }

    // public function update(Request $request, $id)
    // {
    //     $topper = TopperStudent::find($id);
    //     $topper->academic_year_id = $request->academic_year_id ?? 0;
    //     $topper->session_id = $request->session_id ?? 0;
    //     $topper->student_id = $request->student_id ?? 0;
    //     $topper->class_id = $request->class_id ?? 0;
    //     $topper->section_id = $request->section_id ?? 0;
    //     $topper->group_id = $request->group_id ?? 0;
    //     $topper->examination_id = $request->examination_id ?? 0;
    //     $topper->result = $request->result;
    //     $topper->details = $request->details;
    //     $topper->save();
    //     return redirect()->route('admin.topper_student.index')->with('message', 'Update topper student info successfully, thank you.');
    // }

    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'examination_id' => 'required',
            'academic_year_id' => 'required',
            'student_id' => 'required',
            'result' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $topper = TopperStudent::find($id);
            $topper->academic_year_id = $request->academic_year_id ?? 0;
            $topper->session_id = $request->session_id ?? 0;
            $topper->student_id = $request->student_id ?? 0;
            $topper->class_id = $request->class_id ?? 0;
            $topper->section_id = $request->section_id ?? 0;
            $topper->group_id = $request->group_id ?? 0;
            $topper->examination_id = $request->examination_id ?? 0;
            $topper->result = $request->result;
            $topper->details = $request->details;
            $topper->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Topper Student Update Successfully'
            ]);
            
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }

    // public function destroy(Request $request)
    // {
    //     $topper =  TopperStudent::find($request->topper_id);
    //     $topper->delete();
    //     return redirect()->route('admin.topper_student.index')->with('message','Topper student info deleted successfully');
    // }

    public function destroy(Request $request)
    {
        //dd($request);
        try{
            $topper =  TopperStudent::find($request->topper_id);
            $topper->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Topper Student Deleted Successfully'
            ]);
        }catch(\Exception $e){
            //DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }

    // public function status($id)
    // {
    //     $topper = TopperStudent::find($id);
    //     if($topper->status == 0)
    //     {
    //         $topper->status = 1;
    //     }elseif($topper->status == 1)
    //     {
    //         $topper->status = 0;
    //     }
    //     $TopperStudent->update();
    //     return redirect()->route('admin.topper_student.index')->with('message', 'Status Updated');
    // }

    public function status($id)
    {
        $topper = TopperStudent::find($id);
        if ($topper) {
            if ($topper->status == 0) {
                $topper->status = 1;
            } elseif ($topper->status == 1) {
                $topper->status = 0;
            }
            $topper->update();

            $statusMessage = $topper->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Topper Student not found'
        ]);
    }




}
