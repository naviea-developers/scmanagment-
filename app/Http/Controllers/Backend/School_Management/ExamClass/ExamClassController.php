<?php

namespace App\Http\Controllers\Backend\School_management\ExamClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ExamSchedule;
use App\Models\Classe;
use App\Models\Subject;
use App\Models\Examination;
use App\Models\ExamScheduleItem;
use App\Models\Bulding;
use App\Models\Room;
use App\Models\Floor;
use App\Models\Session;
use App\Models\ExamType;
use App\Models\Group;
use App\Models\ExamClass;
use Illuminate\Support\Facades\Validator;

class ExamClassController extends Controller
{
    //--------------Exam------------//

    public function index(){
        $data['className']=Classe::where('status', 1)->orderBy('id', 'asc')->get(); 
        $data['subjectName']=Subject::where('status', 1)->orderBy('id', 'desc')->get();
        $data['examinations']=Examination::where('status', 1)->orderBy('id', 'desc')->get();
        $data['examTypes'] = ExamType::where('status', 1)->orderBy('id','desc')->get();

        $data['buldings'] = Bulding::where('status', 1)->orderBy('id', 'desc')->get();
        $data['rooms'] = Room::where('status', 1)->orderBy('id', 'desc')->get();
        $data['floors'] = Floor::where('status', 1)->orderBy('id', 'desc')->get();
        $data['sessions']=Session::where('status', 1)->orderBy('id', 'desc')->get(); 
        // $data['groups'] = Group::where('status', 1)->orderBy('id','desc')->get();
        $data['allData'] =ExamClass::orderBy('id', 'desc')->get();
        return view('Backend.school_management.exam_class.manage',$data);
    }


    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'examination_id',
            2 => 'class_id',
            3 => 'subject_id',
            4 => 'exam_type',
            5 => 'date',
            6 => 'time',
            7 => 'status',
        );
        $totalData = ExamClass::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = ExamClass::query();
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
                $nestedData['examination_id'] = $data_v->examination->name;
                $nestedData['class_id'] = $data_v->class->name;
                $nestedData['subject_id'] = $data_v->subject->name;
                $nestedData['exam_type'] = $data_v->examtype->name;
                $nestedData['date'] = date('d,F,Y', strtotime($data_v->date ?? '')); 
                $nestedData['time'] = date('h:i A', strtotime($data_v->start_time ?? '')) . '-' . date('h:i A', strtotime($data_v->end_time ?? ''));          
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.examclass.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.examclass.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.examclass.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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

    public function create(){
        // dd('hi');
        $data['className']=Classe::where('status', 1)->orderBy('id', 'asc')->get(); 
        $data['subjectName']=Subject::where('status', 1)->orderBy('id', 'desc')->get();
        $data['examinations']=Examination::where('status', 1)->orderBy('id', 'desc')->get();
        $data['buldings'] = Bulding::where('status', 1)->orderBy('id', 'desc')->get();
        $data['rooms'] = Room::where('status', 1)->orderBy('id', 'desc')->get();
        $data['floors'] = Floor::where('status', 1)->orderBy('id', 'desc')->get();
        $data['sessions']=Session::where('status', 1)->orderBy('id', 'desc')->get(); 
        $data['examTypes'] = ExamType::where('status', 1)->orderBy('id','desc')->get();
        // $data['groups'] = Group::where('status', 1)->orderBy('id','desc')->get();

        return view('Backend.school_management.exam_class.create',$data);
    }

 

    // public function store(Request $request)
    // {
    //   // dd($request->all());
    //     $request->validate([
    //         'class_id' => 'required',
    //         'examination_id' => 'required',

    //     ]);
    //     try{
    //         DB::beginTransaction();
    //         $exam_class = new ExamClass();
    //         $exam_class->examination_id = $request->examination_id;
    //         $exam_class->class_id = $request->class_id;
    //         $exam_class->group_id = $request->group_id ?? 0;
    //         $exam_class->subject_id = $request->subject_id;
    //         $exam_class->examtype_id = $request->examtype_id;
    //         $exam_class->marke = $request->marke;
    //         $exam_class->pass_marke = $request->pass_marke;
    //         $exam_class->date = $request->date;
    //         $exam_class->start_time = $request->start_time;
    //         $exam_class->end_time = $request->end_time;
    //         $exam_class->save();
    //         DB::commit();
    //         return redirect()->route('admin.examclass.index')->with('message','Exam Subjext Add Successfully');
    //     }catch(\Exception $e){
    //         DB::rollBack();
    //         dd($e);
    //         return back()->with ('error_message', $e->getMessage());
    //     }
    // }

    public function store(Request $request)
    {
      // dd($request->all());
        
        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
            'examination_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $exam_class = new ExamClass();
            $exam_class->examination_id = $request->examination_id;
            $exam_class->class_id = $request->class_id;
            $exam_class->group_id = $request->group_id ?? 0;
            $exam_class->subject_id = $request->subject_id;
            $exam_class->examtype_id = $request->examtype_id;
            $exam_class->marke = $request->marke;
            $exam_class->pass_marke = $request->pass_marke;
            $exam_class->date = $request->date;
            $exam_class->start_time = $request->start_time;
            $exam_class->end_time = $request->end_time;
            $exam_class->save();

            DB::commit();
           
            return response()->json([
                'status'=>'yes',
                'msg'=>'Bulding Add Successfully'
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

    public function edit($id){
        // dd('hi');
       $data['editData']=$editData =  ExamClass::find($id);
       $data['className']=Classe::where('id',$editData->class_id)->where('status', 1)->orderBy('id', 'desc')->get(); 
       $data['subjectName']=Subject::where('class_id',$editData->class_id)->where('status', 1)->orderBy('id', 'desc')->get();
       $data['examTypes'] = ExamType::where('status', 1)->orderBy('id','desc')->get();
       $data['examinations']=Examination::where('status', 1)->orderBy('id', 'desc')->get();

       $data['buldings'] = Bulding::where('status', 1)->orderBy('id', 'desc')->get();
       $data['rooms'] = Room::where('status', 1)->orderBy('id', 'desc')->get();
       $data['floors'] = Floor::where('status', 1)->orderBy('id', 'desc')->get();
       $data['sessions']=Session::where('status', 1)->orderBy('id', 'desc')->get(); 
    
    //    $data['groups'] = Group::where('status', 1)->orderBy('id','desc')->get();
        return view('Backend.school_management.exam_class.update',$data);
    }

    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
          'class_id' => 'required',
          'examination_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $exam_class = ExamClass::find($id);
            $exam_class->examination_id = $request->examination_id;
            $exam_class->class_id = $request->class_id;
            // $exam_class->group_id = $request->group_id ?? 0;
            $exam_class->subject_id = $request->subject_id;
            $exam_class->examtype_id = $request->examtype_id;
            $exam_class->marke = $request->marke;
            $exam_class->pass_marke = $request->pass_marke;
            $exam_class->date = $request->date;
            $exam_class->start_time = $request->start_time;
            $exam_class->end_time = $request->end_time;
            $exam_class->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Exam Subjext Update Successfully'
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
            $exam_class =  ExamClass::find($request->exam_class_id);
            $exam_class->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Exam Subjext Deleted Successfully'
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
        $exam_class = ExamClass::find($id);
        if ($exam_class) {
            if ($exam_class->status == 0) {
                $exam_class->status = 1;
            } elseif ($exam_class->status == 1) {
                $exam_class->status = 0;
            }
            $exam_class->update();

            $statusMessage = $exam_class->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

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

    // public function update(Request $request,$id)
    // {
    // // dd($request->all());
    //     $request->validate([
    //         'class_id' => 'required',
    //         'examination_id' => 'required',

    //     ]);
    //     try{
    //         DB::beginTransaction();
    //         $exam_class = ExamClass::find($id);
    //         $exam_class->examination_id = $request->examination_id;
    //         $exam_class->class_id = $request->class_id;
    //         $exam_class->group_id = $request->group_id ?? 0;
    //         $exam_class->subject_id = $request->subject_id;
    //         $exam_class->examtype_id = $request->examtype_id;
    //         $exam_class->marke = $request->marke;
    //         $exam_class->pass_marke = $request->pass_marke;
    //         $exam_class->date = $request->date;
    //         $exam_class->start_time = $request->start_time;
    //         $exam_class->end_time = $request->end_time;
    //         $exam_class->save();

    //         DB::commit();
    //         return redirect()->route('admin.examclass.index')->with('message','Exam Subjext Add Successfully');
    //     }catch(\Exception $e){
    //         DB::rollBack();
    //         dd($e);
    //         return back()->with ('error_message', $e->getMessage());
    //     }
    // }

    // public function destroy(Request $request)
    // {
    //     // dd('hi');
    //     $exam_class =  ExamClass::find($request->exam_class_id);
    //     // dd($examschedule);
    //     $exam_class->delete();
    //     return back()->with('message','exam Subjext Deleted Successfully');
    // }

    // public function status($id)
    // {
    //     $exam_class = ExamClass::find($id);
    //     if($exam_class->status == 0)
    //     {
    //         $exam_class->status = 1;
    //     }elseif($exam_class->status == 1)
    //     {
    //         $exam_class->status = 0;
    //     }
    //     $exam_class->update();
    //     return redirect()->route('admin.examclass.index')->with('message','Exam Subjext Status Update Successfully');
    // }

   
}
