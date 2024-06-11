<?php

namespace App\Http\Controllers\Backend\School_management\Examination;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Classe;
use App\Models\Examination;
use App\Models\ExamResult;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Admission;

class ExaminationController extends Controller
{
    public function index()
    {
        $data['academin_years'] = AcademicYear::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        return view("Backend.school_management.examination.manage",$data);
    }



    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'exam_priority',
            3 => 'academin_year_id',
            4 => 'session_id',
            5 => 'start_date',
            6 => 'status',
        );
        $totalData = Examination::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Examination::query();
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
                $nestedData['exam_priority'] = $data_v->exam_priority;
                $nestedData['academin_year_id'] = @$data_v->academicYear->year;
                $nestedData['session_id'] = @$data_v->session->start_year . ' - ' . @$data_v->session->end_year;
                
                $nestedData['date'] = date('d-m-Y', strtotime($data_v->start_date)) . ' - ' . date('d-m-Y', strtotime($data_v->end_date));

 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.examination.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.examination.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.examination.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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
    //     $data['academin_years'] = AcademicYear::where('status', 1)->get();
    //     $data['sessions'] = Session::where('status', 1)->get();
    //     return view("Backend.school_management.examination.create", $data);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'academin_year_id' => 'required',
            'session_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'exam_priority' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $exam = New Examination();
            $exam->academin_year_id = $request->academin_year_id;
            $exam->session_id = $request->session_id;
            $exam->name = $request->name;
            $exam->start_date = $request->start_date;
            $exam->end_date = $request->end_date;
            $exam->exam_priority = $request->exam_priority;
            $exam->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Examination Add Successfully'
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
        $data["exam"]= Examination::find($id);
        $data['academin_years'] = AcademicYear::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        return view("Backend.school_management.examination.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'academin_year_id' => 'required',
            'session_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'exam_priority' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $exam = Examination::find($id);
            $exam->academin_year_id = $request->academin_year_id;
            $exam->session_id = $request->session_id;
            $exam->name = $request->name;
            $exam->start_date = $request->start_date;
            $exam->end_date = $request->end_date;
            $exam->exam_priority = $request->exam_priority;
            $exam->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Examination Update Successfully'
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
            $exam =  Examination::find($request->examination_id);
            $exam->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Examination Deleted Successfully'
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
        $exam = Examination::find($id);
        if ($exam) {
            if ($exam->status == 0) {
                $exam->status = 1;
            } elseif ($exam->status == 1) {
                $exam->status = 0;
            }
            $exam->update();

            $statusMessage = $exam->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Exam not found'
        ]);
    }

    public function publish()
    {

        DB::table('examinations')
        ->join('exam_results', 'examinations.id', '=', 'exam_results.examination_id')
        ->where('exam_results.is_publis', '=', 0) 
        ->update(['exam_results.is_publis' => 1]);
        return redirect()->back()->with('message','Exam Results Publish Successfully');

    }

    // public function publish()
    // {
    //     // DB::table('examinations')
    //     // ->join('exam_results', 'examinations.id', '=', 'exam_results.examination_id')
    //     // ->where('exam_results.is_publis', '=', 0) 
    //     // ->update(['exam_results.is_publis' => 1]);

    //     $admissions = Admission::all();

    //     foreach ($admissions as $student) {
           
    //         $examResults = ExamResult::where('student_id', $student->id)->get();
    //         // dd($examResults);
    //         $failedSubject = $examResults->first(function ($result) {
    //             return $result->obtained_marke < $result->pass_marke;
    //         });

            
    //         if (!$failedSubject) {
    //             $currentClass = $student->class;
    //             $nextClass = Classe::where('id', $currentClass->id + 1)->first();

    //             if ($nextClass) {
    //                 // $student->class_id = $nextClass->id;
    //                 // $student->save();

    //                 Admission::create([
    //                     'user_id' => $student->id,
    //                     'class_id' => $nextClass->id,
    //                 ]);
    //             }
    //         }
    //     }

        


    //     return redirect()->back()->with('message','Exam Results Publish Successfully');

    // }


}
