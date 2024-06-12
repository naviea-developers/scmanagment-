<?php

namespace App\Http\Controllers\Backend\School_management\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gallery;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index()
    {
        $data['gallerys'] = Gallery::orderBy('id', 'desc')->get();
        return view("Backend.school_management.gallery.manage",$data);
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'image',
            3 => 'status',
        );
        $totalData = Gallery::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Gallery::query();
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
                $nestedData['image'] = '<img src="' . $data_v->image_show . '" alt="subject Image" width="50" height="50">';
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.gallery.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.gallery.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.gallery.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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
        $data['gallery'] = Gallery::orderBy('id', 'desc')->get();
        return view("Backend.school_management.gallery.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //   // dd($request->all());
    //     $request->validate([
    //         // 'image' => 'required',

    //     ]);
    //     try{
    //         DB::beginTransaction();
    //         $gallery = New Gallery;
    //         $gallery->name = $request->name;
    //         $gallery->media_type = $request->media_type;
    //         if($request->hasFile('image')){
    //             $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
    //             request()->image->move(public_path('upload/gallery/'),$fileName);
    //             $gallery->image = $fileName;
    //         }
    //         if($request->hasFile('thumbnail')){
    //             $fileName = rand().time().'.'.request()->thumbnail->getClientOriginalExtension();
    //             request()->thumbnail->move(public_path('upload/gallery/thumbnail/'),$fileName);
    //             $gallery->thumbnail = $fileName;
    //         }
    //         if($request->hasFile('video')){
    //             $fileName = rand().time().'.'.request()->video->getClientOriginalExtension();
    //             request()->video->move(public_path('upload/gallery/video/'),$fileName);
    //             $gallery->video = $fileName;
    //         }
    //         $gallery->save();

    //         DB::commit();
    //         return redirect()->route('admin.gallery.index')->with('message','Item Add Successfully');
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
            $gallery = New Gallery;
            $gallery->name = $request->name;
            $gallery->media_type = $request->media_type;
            if($request->hasFile('image')){
                $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/gallery/'),$fileName);
                $gallery->image = $fileName;
            }
            if($request->hasFile('thumbnail')){
                $fileName = rand().time().'.'.request()->thumbnail->getClientOriginalExtension();
                request()->thumbnail->move(public_path('upload/gallery/thumbnail/'),$fileName);
                $gallery->thumbnail = $fileName;
            }
            if($request->hasFile('video')){
                $fileName = rand().time().'.'.request()->video->getClientOriginalExtension();
                request()->video->move(public_path('upload/gallery/video/'),$fileName);
                $gallery->video = $fileName;
            }
            $gallery->save();

            DB::commit();
           
            return response()->json([
                'status'=>'yes',
                'msg'=>'Item Add Successfully'
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
        $data["item"]= Gallery::find($id);
        return view("Backend.school_management.gallery.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
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
            $gallery = Gallery::find($id);
            $gallery->name = $request->name;
            if($request->hasFile('image')){
                @unlink(public_path("upload/gallery/".$gallery->image));
                $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/gallery/'),$fileName);
                $gallery->image = $fileName;
            }
            if($request->hasFile('thumbnail')){
                @unlink(public_path("upload/gallery/thumbnail/".$gallery->thumbnail));
                $fileName = rand().time().'.'.request()->thumbnail->getClientOriginalExtension();
                request()->thumbnail->move(public_path('upload/gallery/thumbnail/'),$fileName);
                $gallery->thumbnail = $fileName;
            }
            if($request->hasFile('video')){
                @unlink(public_path("upload/gallery/video/".$gallery->video));
                $fileName = rand().time().'.'.request()->video->getClientOriginalExtension();
                request()->video->move(public_path('upload/gallery/video/'),$fileName);
                $gallery->video = $fileName;
            }
            $gallery->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Item Update Successfully'
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
            $gallery =  Gallery::find($request->gallery_id);
            @unlink(public_path("upload/gallery/".$gallery->image));
            @unlink(public_path("upload/gallery/video/".$gallery->video));
            $gallery->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Item Deleted Successfully'
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
        $gallery = Gallery::find($id);
        if ($gallery) {
            if ($gallery->status == 0) {
                $gallery->status = 1;
            } elseif ($gallery->status == 1) {
                $gallery->status = 0;
            }
            $gallery->update();

            $statusMessage = $gallery->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Item not found'
        ]);
    }







    // public function update(Request $request, string $id)
    // {
    //     //dd($request->all());
    //    $request->validate([
    //     // 'name' => 'required',

    // ]);
    // try{
    //     DB::beginTransaction();
    //     $gallery = Gallery::find($id);
    //     $gallery->name = $request->name;
    //     if($request->hasFile('image')){
    //         @unlink(public_path("upload/gallery/".$gallery->image));
    //         $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
    //         request()->image->move(public_path('upload/gallery/'),$fileName);
    //         $gallery->image = $fileName;
    //     }
    //     if($request->hasFile('thumbnail')){
    //         @unlink(public_path("upload/gallery/thumbnail/".$gallery->thumbnail));
    //         $fileName = rand().time().'.'.request()->thumbnail->getClientOriginalExtension();
    //         request()->thumbnail->move(public_path('upload/gallery/thumbnail/'),$fileName);
    //         $gallery->thumbnail = $fileName;
    //     }
    //     if($request->hasFile('video')){
    //         @unlink(public_path("upload/gallery/video/".$gallery->video));
    //         $fileName = rand().time().'.'.request()->video->getClientOriginalExtension();
    //         request()->video->move(public_path('upload/gallery/video/'),$fileName);
    //         $gallery->video = $fileName;
    //     }
    //     $gallery->save();

    //     DB::commit();
    //     return redirect()->route('admin.gallery.index')->with('message','Item Update Successfully');
    // }catch(\Exception $e){
    //     DB::rollBack();
    //    // dd($e);
    //     return back()->with ('error_message', $e->getMessage());
    // }
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Request $request)
    // {

    //     $gallery =  Gallery::find($request->gallery_id);
    //     @unlink(public_path("upload/gallery/".$gallery->image));
    //     @unlink(public_path("upload/gallery/video/".$gallery->video));
    //     $gallery->delete();
    //     return back()->with('message','Image Deleted Successfully');
    // }


    // public function status($id)
    // {
    //     $gallery = gallery::find($id);
    //     if($gallery->status == 0)
    //     {
    //         $gallery->status = 1;
    //     }elseif($gallery->status == 1)
    //     {
    //         $gallery->status = 0;
    //     }
    //     $gallery->update();
    //     return redirect()->route('admin.gallery.index');
    // }
}
