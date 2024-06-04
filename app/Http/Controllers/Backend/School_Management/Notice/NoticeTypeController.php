<?php

namespace App\Http\Controllers\Backend\School_management\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bulding;
use App\Models\NoticeType;
use Illuminate\Support\Facades\DB;

class NoticeTypeController extends Controller
{
    public function index()
    {
        $data['noticeTypes'] = NoticeType::orderBy('id', 'desc')->get();
        return view("Backend.school_management.notice_type.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.school_management.notice_type.create");
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
            $notice_type = New NoticeType;
            $notice_type->name = $request->name;
            $notice_type->save();

            DB::commit();
            return redirect()->route('admin.notice_type.index')->with('message','Notice Type Add Successfully');
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
        $data["noticeType"]= NoticeType::find($id);
        return view("Backend.school_management.notice_type.update",$data);
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
        $notice_type = NoticeType::find($id);
        $notice_type->name = $request->name;
        $notice_type->save();

        DB::commit();
        return redirect()->route('admin.notice_type.index')->with('message','Notice Type Update Successfully');
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

        $notice_type =  NoticeType::find($request->notice_type_id);
        $notice_type->delete();
        return back()->with('message','Notice Type Deleted Successfully');
    }


    public function status($id)
    {
        $notice_type = NoticeType::find($id);
        if($notice_type->status == 0)
        {
            $notice_type->status = 1;
        }elseif($notice_type->status == 1)
        {
            $notice_type->status = 0;
        }
        $notice_type->update();
        return redirect()->route('admin.notice_type.index');
    }
}
