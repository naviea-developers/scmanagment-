<?php

namespace App\Http\Controllers\Backend\School_management\DailyClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Session;
use App\Models\Classe;
use App\Models\DailyClass;
use App\Models\Ebook;
use App\Models\EbookAudioContent;
use App\Models\EbookContent;
use App\Models\EbookVideoContent;
use App\Models\Group;
use App\Models\SchoolSection;
use App\Models\Subject;

class DailyClassController extends Controller
{
    public function index()
    {
        $data['daily_classes'] = DailyClass::orderBy('id', 'desc')->get();
        return view("Backend.school_management.daily_class.index",$data);
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
    public function store(Request $request)
    {
      // dd($request->all());
        $request->validate([
            'teacher_id' => 'required',
            'class_id' => 'required',

        ]);
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
            $daily_class->lesson = $request->lesson ?? 0;
            $daily_class->page_number = $request->page_number ?? 0;
            $daily_class->details = $request->details ?? "";


            if($request->hasFile('image')){
                $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/blog/'),$fileName);
                $daily_class->image = $fileName;
            }
    
            if($request->hasFile('video_thumbnail')){
                $fileName = rand().time().'.'.request()->video_thumbnail->getClientOriginalExtension();
                request()->video_thumbnail->move(public_path('upload/daily_class/'),$fileName);
                $daily_class->video_thumbnail = $fileName;
            }

            $daily_class->save();

            DB::commit();
            return redirect()->route('admin.daily_class.index')->with('message','Daily Class Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
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
        $daily_class->lesson = $request->lesson ?? 0;
        $daily_class->page_number = $request->page_number ?? 0;
        $daily_class->details = $request->details ?? "";

        if($request->hasFile('image')){
            @unlink(public_path("upload/daily_class/".$daily_class->image));
            $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/daily_class/'),$fileName);
            $daily_class->image = $fileName;
        }

        if($request->hasFile('video_thumbnail')){
            @unlink(public_path("upload/daily_class/".$daily_class->video_thumbnail));
            $fileName = rand().time().'.'.request()->video_thumbnail->getClientOriginalExtension();
            request()->video_thumbnail->move(public_path('upload/daily_class/'),$fileName);
            $daily_class->video_thumbnail = $fileName;
        }

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
        @unlink(public_path("upload/daily_class/".$daily_class->image));
        @unlink(public_path("upload/daily_class/".$daily_class->video_thumbnail));
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
