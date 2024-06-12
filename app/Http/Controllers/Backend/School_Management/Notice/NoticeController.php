<?php

namespace App\Http\Controllers\Backend\School_management\Notice;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\NoticeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NoticeController extends Controller
{
    public function index()
    {
        $data['notices'] = Notice::orderBy('id', 'desc')->get();
        $data['noticeTypes'] = NoticeType::orderBy('id', 'desc')->get();
        return view("Backend.school_management.notice.manage",$data);
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'notice_type',
            2 => 'title',
            3 => 'status',
        );
        $totalData = Notice::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Notice::query();
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
                $nestedData['notice_type'] = $data_v->noticeType->name;
                $nestedData['title'] = $data_v->name;
              
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.notice.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.notice.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.notice.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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
        $data['noticeTypes'] = NoticeType::orderBy('id', 'desc')->get();
        return view("Backend.school_management.notice.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //   // dd($request->all());
    //     $request->validate([
    //         'name' => 'required',

    //     ]);
    //     try{
    //         DB::beginTransaction();
    //         $notice = New Notice;
    //         $notice->noticetype_id=$request->noticetype_id;
    //         $notice->name = $request->name;
    //         $notice->description = $request->description;
    //         if($request->hasFile('notice_file')){
    //             $fileName = $request->name.time().'.'.request()->notice_file->getClientOriginalExtension();
    //             request()->notice_file->move(public_path('upload/notice_file/'),$fileName);
    //             $notice->notice_file = $fileName;
    //         }
    //         $notice->save();

    //         DB::commit();
    //         return redirect()->route('admin.notice.index')->with('message','Notice Add Successfully');
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
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
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
           
            return response()->json([
                'status'=>'yes',
                'msg'=>'Notice Add Successfully'
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
        $data["notice"]= Notice::find($id);
        $data['noticeTypes'] = NoticeType::orderBy('id', 'desc')->get();
        return view("Backend.school_management.notice.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //dd($request->all());
    //    $request->validate([
    //     'name' => 'required',

    // ]);
    // try{
    //     DB::beginTransaction();
    //     $notice = Notice::find($id);
    //     $notice->noticetype_id=$request->noticetype_id;
    //     $notice->name = $request->name;
    //     $notice->description = $request->description;

    //     if($request->hasFile('notice_file')){
    //         @unlink(public_path("upload/notice_file/".$notice->notice_file));
    //         $fileName = $request->name.time().'.'.request()->notice_file->getClientOriginalExtension();
    //         request()->notice_file->move(public_path('upload/notice_file/'),$fileName);
    //         $notice->notice_file = $fileName;
    //     }
    //     $notice->save();

    //     DB::commit();
    //     return redirect()->route('admin.notice.index')->with('message','Notice Update Successfully');
    // }catch(\Exception $e){
    //     DB::rollBack();
    //    // dd($e);
    //     return back()->with ('error_message', $e->getMessage());
    // }
    // }


    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
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
            return response()->json([
                'status'=>'yes',
                'msg'=>'Notice Update Successfully'
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
    // public function destroy(Request $request)
    // {
    //     $notice =  Notice::find($request->notice_id);
    //     @unlink(public_path("upload/notice_file/".$notice->notice_file));
    //     $notice->delete();
    //     return back()->with('message','Notice Deleted Successfully');
    // }


    public function destroy(Request $request)
    {
        //dd($request);
        try{
            $notice =  Notice::find($request->notice_id);
            @unlink(public_path("upload/notice_file/".$notice->notice_file));
            $notice->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Notice Deleted Successfully'
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
    //     $notice = Notice::find($id);
    //     if($notice->status == 0)
    //     {
    //         $notice->status = 1;
    //     }elseif($notice->status == 1)
    //     {
    //         $notice->status = 0;
    //     }
    //     $notice->update();
    //     return redirect()->route('admin.notice.index');
    // }

    public function status($id)
    {
        $notice = Notice::find($id);
        if ($notice) {
            if ($notice->status == 0) {
                $notice->status = 1;
            } elseif ($notice->status == 1) {
                $notice->status = 0;
            }
            $notice->update();

            $statusMessage = $notice->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Notice not found'
        ]);
    }




}
