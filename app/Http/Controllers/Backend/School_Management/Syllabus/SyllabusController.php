<?php

namespace App\Http\Controllers\Backend\School_management\Syllabus;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Examination;
use App\Models\Lession;
use App\Models\Session;
use App\Models\Subject;
use App\Models\Syllabus;
use App\Models\Tp_option;
use Carbon\Carbon;
use Mpdf\Mpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SyllabusController extends Controller
{
    public function index()
    {
        $data['classes']= Classe::where('status', 1)->orderBy('id','asc')->get();
        $data['subjects'] = Subject::where('status', 1)->orderBy('id','desc')->get();  
        $data['sessions'] = Session::orderBy('id', 'asc')->get();   
        $data['examinations'] = Examination::where('exam_priority', 'main')
        // ->where('end_date', Carbon::today())
        ->where('status', 1)
        ->orderBy('id', 'desc')
        ->get();       
        return view("Backend.school_management.syllabus.manage",$data);
    }


    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'examination_id',
            2 => 'class_id',
            3 => 'subject_id',
            4 => 'lession_id',
            5 => 'status',
        );
        $totalData = Syllabus::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Syllabus::query();
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
                $nestedData['examination_id'] = @$data_v->examination->name;
                $nestedData['class_id'] = @$data_v->class->name;
                $nestedData['subject_id'] = @$data_v->subject->name;
                $nestedData['lession_id'] = @$data_v->lession->name;
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.syllabus.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.syllabus.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.syllabus.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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




    // public function index()
    // {
    //     $data['syllabuses'] = Syllabus::orderBy('id', 'asc')->get();
    //     $data['classes'] = Classe::orderBy('id', 'asc')->get();
    //     $data['sessions'] = Session::orderBy('id', 'asc')->get();
    //     $data['examinations'] = Examination::where('exam_priority', 'main')
    //     // ->where('end_date', Carbon::today())
    //     ->where('status', 1)
    //     ->orderBy('id', 'desc')
    //     ->get();    
    //     return view("Backend.school_management.syllabus.index",$data);
    // }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $data['classes']= Classe::where('status', 1)->orderBy('id','asc')->get();
    //     $data['subjects'] = Subject::where('status', 1)->orderBy('id','desc')->get();
    //     // $data['examinations'] = Examination::where('status', 1)->orderBy('id', 'desc')->get();        
    //     $data['examinations'] = Examination::where('exam_priority', 'main')
    //     // ->where('end_date', Carbon::today())
    //     ->where('status', 1)
    //     ->orderBy('id', 'desc')
    //     ->get();       
    //     return view("Backend.school_management.syllabus.create",$data);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $validator = Validator::make($request->all(), [
            'examination_id' => 'required',
            'class_id' => 'required',
            'subject_id' => 'required',
            'lession_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $syllabus = New Syllabus;
            $syllabus->class_id = $request->class_id ?? 0;
            $syllabus->subject_id = $request->subject_id ?? 0;
            $syllabus->lession_id = $request->lession_id ?? 0;
            $syllabus->examination_id = $request->examination_id ?? 0;
            $syllabus->lession_item = $request->lession_item;
            $syllabus->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Syllabus Add Successfully'
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
       
        $data["syllabus"]= $syllabus = Syllabus::find($id);
    
        $classId = $syllabus->class_id; 
        $subjectId = $syllabus->subject_id; 
    
        $data['classes'] = Classe::where('status', 1)->orderBy('id', 'asc')->get();
        $data['subjects'] = Subject::where('class_id', $classId)->where('status', 1)->orderBy('id', 'desc')->get();
        $data['lessionses'] = Lession::where('subject_id', $subjectId)->where('status', 1)->get();

        $data['examinations'] = Examination::where('exam_priority', 'main')
        // ->where('end_date', Carbon::today())
        ->where('status', 1)
        ->orderBy('id', 'desc')
        ->get();    
    
        return view("Backend.school_management.syllabus.update", $data);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'examination_id' => 'required',
            'class_id' => 'required',
            'subject_id' => 'required',
            'lession_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $syllabus = Syllabus::find($id);
            $syllabus->class_id = $request->class_id ?? 0;
            $syllabus->subject_id = $request->subject_id ?? 0;
            $syllabus->lession_id = $request->lession_id ?? 0;
            $syllabus->examination_id = $request->examination_id ?? 0;
            $syllabus->lession_item = $request->lession_item;
            $syllabus->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Syllabus Update Successfully'
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
            $syllabus =  Syllabus::find($request->syllabus_id);
        $syllabus->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Syllabus Deleted Successfully'
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
        $syllabus = Syllabus::find($id);
        if ($syllabus) {
            if ($syllabus->status == 0) {
                $syllabus->status = 1;
            } elseif ($syllabus->status == 1) {
                $syllabus->status = 0;
            }
            $syllabus->update();

            $statusMessage = $syllabus->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

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



    public function getSyllabus(Request $request)
    {
        $classId = $request->input('class_id');
        $sessionId = $request->input('session_id');
        // $examId = $request->input('examination_id');
        // return response()->json(['class'=>$classId,'session'=>$sessionId]);
        $data['tpOption'] = Tp_option::where('option_name', 'theme_option_header')->first();
    
        // if ($classId && $sessionId && $examId) {
        //     // Fetch the examinations for the selected session
        //     $examinations = Examination::where('session_id', $sessionId)->pluck('id');
        //     // return response()->json(['examinations'=>$examinations]);
        //     // Fetch the syllabus for the selected class and examinations
        //     $data['syllabus']=$syllabus = Syllabus::where('class_id', $classId)
        //         ->where('examination_id', $examId)
        //         ->whereIn('examination_id', $examinations)
        //         ->get();
        //     // return response()->json(['syllabus'=>$syllabus]);
        // } else
        if ($classId && $sessionId) {
            $examinations = Examination::where('session_id', $sessionId)->pluck('id');
            // return response()->json(['examinations'=>$examinations]);
            // Fetch the syllabus for the selected class and examinations
            $data['syllabus']=$syllabus = Syllabus::where('class_id', $classId)
                ->whereIn('examination_id', $examinations)
                ->get();
        }else {
            $data['syllabus'] = [];
        }
    
        return view('Backend.school_management.syllabus.syllabus_details', $data);
    }


    //syllabus Download Admin
    public function syllabusDownload(Request $request)
    {
    $examinations = Examination::where('session_id',$request->input('session_id'))->get();

    $data['syllabus'] = Syllabus::where('class_id', $request->input('class_id'))
                                ->whereIn('examination_id', $examinations->pluck('id'))
                                ->get();

        //  return view('Backend.school_management.syllabus.syllabus_pdf_download', $data);
        $html = view('Backend.school_management.syllabus.syllabus_pdf_download', $data);
        $mpdf = new Mpdf([
            'mode' => 'UTF-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);

        //For Multilanguage Start
        $mpdf->autoScriptToLang = true;
        $mpdf->baseScript = 1;
        $mpdf->autoLangToFont = true;
        $mpdf->autoVietnamese = true;
        $mpdf->autoArabic = true;

        //For Multilanguage End
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->writeHTML($html);
        $name = 'syllabus_pdf_download ' . date('Y-m-d i:h:s');
        $mpdf->Output($name.'.pdf', 'D');
    }



    

}
