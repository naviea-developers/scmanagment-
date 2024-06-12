<?php

namespace App\Http\Controllers\Backend\School_management\DailyClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Session;
use App\Models\Classe;
use App\Models\DailyClass;
use App\Models\Lession;
use App\Models\Group;
use App\Models\SchoolSection;
use App\Models\Subject;
use Illuminate\Support\Facades\Validator;

class DailyClassController extends Controller
{
    public function index()
    {
        $data['teachers'] = User::where('type','2')->where('status','1')->orderBy('id', 'desc')->get();
        $data['classes'] = Classe::where('status','1')->orderBy('id', 'asc')->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['daily_classes'] = DailyClass::orderBy('id', 'desc')->get();
        return view("Backend.school_management.daily_class.manage",$data);
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'title',
            2 => 'teacher',
            3 => 'class',
            4 => 'subject',
            5 => 'lession',
            6 => 'page_number',
            7 => 'status',
        );
        $totalData = DailyClass::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = DailyClass::query();
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
                $nestedData['title'] = @$data_v->name;
                $nestedData['teacher'] = @$data_v->teacher->name;
                $nestedData['class'] = @$data_v->class->name;
                $nestedData['subject'] = @$data_v->subject->name;
                $nestedData['lession'] = @$data_v->lession->name;
                $nestedData['page_number'] = @$data_v->page_number;

                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.daily_class.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.daily_class.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.daily_class.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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
    public function create()
    {
        // dd('hi');
        $data['teachers'] = User::where('type','2')->where('status','1')->orderBy('id', 'desc')->get();
        $data['classes'] = Classe::where('status','1')->orderBy('id', 'asc')->get();
        $data['sessions'] = Session::where('status', 1)->get();
        return view("Backend.school_management.daily_class.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //   // dd($request->all());
    //     $request->validate([
    //         'teacher_id' => 'required',
    //         'class_id' => 'required',
    //         'lession_id' => 'required',

    //     ]);
    //     try{
    //         DB::beginTransaction();
    //         $daily_class = new DailyClass();
    //         $daily_class->name = $request->name ?? "";
    //         $daily_class->teacher_id = $request->teacher_id ?? 0;
    //         $daily_class->class_id = $request->class_id ?? 0;
    //         $daily_class->subject_id = $request->subject_id ?? 0;
    //         $daily_class->session_id = $request->session_id ?? 0;
    //         $daily_class->section_id = $request->section_id ?? 0;
    //         $daily_class->group_id = $request->group_id ?? 0;
    //         $daily_class->video_url = "https://" . preg_replace('#^https?://#', '',$request->video_url);
    //         $daily_class->lession_id = $request->lession_id ?? 0;
    //         $daily_class->page_number = $request->page_number ?? 0;
    //         $daily_class->sub_banner = $request->sub_banner ?? 1;
    //         $daily_class->details = $request->details ?? "";


    //         if($request->hasFile('video')){
    //             $fileName = rand().time().'.'.request()->video->getClientOriginalExtension();
    //             request()->video->move(public_path('upload/daily_class/'),$fileName);
    //             $daily_class->video = $fileName;
    //         }
    
    //         // if($request->hasFile('video_thumbnail')){
    //         //     $fileName = rand().time().'.'.request()->video_thumbnail->getClientOriginalExtension();
    //         //     request()->video_thumbnail->move(public_path('upload/daily_class/'),$fileName);
    //         //     $daily_class->video_thumbnail = $fileName;
    //         // }

    //         $daily_class->save();

    //         DB::commit();
    //         return redirect()->route('admin.daily_class.index')->with('message','Daily Class Add Successfully');
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
            'teacher_id' => 'required',
            'class_id' => 'required',
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
            $daily_class = new DailyClass();
            $daily_class->name = $request->name ?? "";
            $daily_class->teacher_id = $request->teacher_id ?? 0;
            $daily_class->class_id = $request->class_id ?? 0;
            $daily_class->subject_id = $request->subject_id ?? 0;
            $daily_class->session_id = $request->session_id ?? 0;
            $daily_class->section_id = $request->section_id ?? 0;
            $daily_class->group_id = $request->group_id ?? 0;
            $daily_class->video_url = "https://" . preg_replace('#^https?://#', '',$request->video_url);
            $daily_class->lession_id = $request->lession_id ?? 0;
            $daily_class->page_number = $request->page_number ?? 0;
            $daily_class->sub_banner = $request->sub_banner ?? 1;
            $daily_class->details = $request->details ?? "";


            if($request->hasFile('video')){
                $fileName = rand().time().'.'.request()->video->getClientOriginalExtension();
                request()->video->move(public_path('upload/daily_class/'),$fileName);
                $daily_class->video = $fileName;
            }
    
            // if($request->hasFile('video_thumbnail')){
            //     $fileName = rand().time().'.'.request()->video_thumbnail->getClientOriginalExtension();
            //     request()->video_thumbnail->move(public_path('upload/daily_class/'),$fileName);
            //     $daily_class->video_thumbnail = $fileName;
            // }

            $daily_class->save();

            DB::commit();
           
            return response()->json([
                'status'=>'yes',
                'msg'=>'Daily Class Add Successfully'
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
       $data['daily_class'] = $daily_class = DailyClass::find($id);
       $data['teachers'] = User::where('type','2')->where('status','1')->orderBy('id', 'desc')->get();
       $data['classes'] = Classe::where('status','1')->orderBy('id', 'asc')->get();
       $data['sessions'] = Session::where('status', 1)->get(); 

       $data['sections'] = SchoolSection::where('class_id',$daily_class->class_id)->where('status', 1)->get();
       $data['groups'] = Group::where('class_id',$daily_class->class_id)->where('status', 1)->get();
       $data['subjects']=Subject::where('class_id',$daily_class->class_id)->where('status', 1)->orderBy('id', 'asc')->get();
       $data['lessions']=Lession::where('subject_id',$daily_class->subject_id)->where('status', 1)->orderBy('id', 'asc')->get();
        return view("Backend.school_management.daily_class.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
       $request->validate([
        'teacher_id' => 'required',
        'class_id' => 'required',
        'lession_id' => 'required',

    ]);
    try{
        DB::beginTransaction();
        $daily_class = DailyClass::find($id);
        $daily_class->name = $request->name ?? "";
        $daily_class->teacher_id = $request->teacher_id ?? 0;
        $daily_class->class_id = $request->class_id ?? 0;
        $daily_class->subject_id = $request->subject_id ?? 0;
        $daily_class->session_id = $request->session_id ?? 0;
        $daily_class->section_id = $request->section_id ?? 0;
        $daily_class->group_id = $request->group_id ?? 0;
        $daily_class->video_url = "https://" . preg_replace('#^https?://#', '',$request->video_url);
        $daily_class->lession_id = $request->lession_id ?? 0;
        $daily_class->page_number = $request->page_number ?? 0;
        $daily_class->sub_banner = $request->sub_banner ?? 1;
        $daily_class->details = $request->details ?? "";

        if($request->hasFile('video')){
            @unlink(public_path("upload/daily_class/".$daily_class->video));
            $fileName = rand().time().'.'.request()->video->getClientOriginalExtension();
            request()->video->move(public_path('upload/daily_class/'),$fileName);
            $daily_class->video = $fileName;
        }

        // if($request->hasFile('video_thumbnail')){
        //     @unlink(public_path("upload/daily_class/".$daily_class->video_thumbnail));
        //     $fileName = rand().time().'.'.request()->video_thumbnail->getClientOriginalExtension();
        //     request()->video_thumbnail->move(public_path('upload/daily_class/'),$fileName);
        //     $daily_class->video_thumbnail = $fileName;
        // }

        $daily_class->save();

        DB::commit();
        return redirect()->route('admin.daily_class.index')->with('message','Daily Class Update Successfully');
    }catch(\Exception $e){
        DB::rollBack();
        dd($e);
        return back()->with ('error_message', $e->getMessage());
    }
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $daily_class =  DailyClass::find($request->daily_class_id);
        @unlink(public_path("upload/daily_class/".$daily_class->video));
        // @unlink(public_path("upload/daily_class/".$daily_class->video_thumbnail));
        $daily_class->delete();
        return back()->with('message','Daily Class Deleted Successfully');
    }


    public function status($id)
    {
        $daily_class = DailyClass::find($id);
        if($daily_class->status == 0)
        {
            $daily_class->status = 1;
        }elseif($daily_class->status == 1)
        {
            $daily_class->status = 0;
        }
        $daily_class->update();
        return redirect()->route('admin.daily_class.index');
    }
}
