<?php

namespace App\Http\Controllers\Backend\School_management\Notice;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\NoticeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    public function index()
    {
        $data['notices'] = Notice::orderBy('id', 'desc')->get();
        return view("Backend.school_management.notice.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['noticeTypes'] = NoticeType::orderBy('id', 'desc')->get();
        return view("Backend.school_management.notice.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $request->validate([
            'name' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $notice = New Notice;
            $notice->noticetype_id=$request->noticetype_id;
            $notice->name = $request->name;
            $notice->description = $request->description;
            if($request->hasFile('notice_file')){
                $fileName = $request->name.time().'.'.request()->notice_file->getClientOriginalExtension();
                request()->notice_file->move(public_path('upload/notice_file/'),$fileName);
                $notice->notice_file = $fileName;
            }
            $notice->save();

            DB::commit();
            return redirect()->route('admin.notice.index')->with('message','Notice Add Successfully');
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
        $data["notice"]= Notice::find($id);
        $data['noticeTypes'] = NoticeType::orderBy('id', 'desc')->get();
        return view("Backend.school_management.notice.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
       $request->validate([
        'name' => 'required',

    ]);
    try{
        DB::beginTransaction();
        $notice = Notice::find($id);
        $notice->noticetype_id=$request->noticetype_id;
        $notice->name = $request->name;
        $notice->description = $request->description;

        if($request->hasFile('notice_file')){
            @unlink(public_path("upload/notice_file/".$notice->notice_file));
            $fileName = $request->name.time().'.'.request()->notice_file->getClientOriginalExtension();
            request()->notice_file->move(public_path('upload/notice_file/'),$fileName);
            $notice->notice_file = $fileName;
        }
        $notice->save();

        DB::commit();
        return redirect()->route('admin.notice.index')->with('message','Notice Update Successfully');
    }catch(\Exception $e){
        DB::rollBack();
       // dd($e);
        return back()->with ('error_message', $e->getMessage());
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $notice =  Notice::find($request->notice_id);
        @unlink(public_path("upload/notice_file/".$notice->notice_file));
        $notice->delete();
        return back()->with('message','Notice Deleted Successfully');
    }


    public function status($id)
    {
        $notice = Notice::find($id);
        if($notice->status == 0)
        {
            $notice->status = 1;
        }elseif($notice->status == 1)
        {
            $notice->status = 0;
        }
        $notice->update();
        return redirect()->route('admin.notice.index');
    }
}
