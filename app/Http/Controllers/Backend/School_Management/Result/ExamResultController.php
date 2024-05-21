<?php

namespace App\Http\Controllers\Backend\School_management\Result;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Classe;
use App\Models\Examination;
use App\Models\ExamResult;
use App\Models\Group;
use App\Models\SchoolSection;
use App\Models\Session;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    public function index()
    {
        $data['results'] = ExamResult::where('is_publis',0)->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['academic_years'] = AcademicYear::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        $data['examinations'] = Examination::where('status', 1)->get();
        return view('Backend.school_management.result.index', $data);
    }


    function getResultByAjax(Request $request){
        // dd($request->all());
         $columns = array(
            0 => 'id',
            1 => 'examination_id',
            2 => 'teacher_id',
            3 => 'class_id',
            4 => 'roll_number',
            5 => 'student_id',
            6 => 'session_id',
            7 => 'section_id',
            8 => 'marke',
            9 => 'pass_marke',
            10 => 'obtained_marke',
            11 => 'status',
            12 => 'options',
        );
        $totalData = ExamResult::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        // dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $results = ExamResult::where('is_publis',0);
        if(!empty($search)){
 
            $results =$results->where("roll_number","LIKE","%{$search}%");
           
        }
         if($request->examination_id !=''){
             $results =$results->where("examination_id",$request->examination_id);
         }
         if($request->session_id !=''){
             $results =$results->where("session_id",$request->session_id);
         }
         if($request->class_id !=''){
             $results =$results->where("class_id",$request->class_id);
         }
         if($request->section_id !=''){
             $results =$results->where("section_id",$request->section_id);
         }
 
         $results = $results->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        $totalFiltered = $results->count();
 
        $data = array();
        if(!empty($results))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($results as $result)
            {
                $nestedData['id'] = $i++;
                $nestedData['examination_id'] = $result->examination->name;
                $nestedData['teacher_id'] = $result->teacher->name;
                $nestedData['class_id'] = $result->class->name;
                $nestedData['roll_number'] = $result->roll_number;
                $nestedData['student_id'] = $result->student->student_name;
                $nestedData['session_id'] = $result->session->start_year ." - ". $result->session->end_year;
                $nestedData['section_id'] = $result->section->name;
                $nestedData['marke'] = $result->marke;
                $nestedData['pass_marke'] = $result->pass_marke;
                $nestedData['obtained_marke'] = $result->obtained_marke;
 
                $nestedData['status'] = '';
                if ($result->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.exam_result.status', $result->id).'" class="btn btn-sm btn-warning">Inactive</a>';
                } elseif ($result->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.exam_result.status', $result->id).'" class="btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.exam_result.edit',$result->id).'"><i class="fa fa-edit"></i></a>';
  
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

    public function edit($id)
    {
        $data['result'] = ExamResult::find($id);
        return view('Backend.school_management.result.update', $data);
    }
}
