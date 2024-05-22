<?php

namespace App\Http\Controllers\Backend\School_management\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $data['gallerys'] = Gallery::orderBy('id', 'desc')->get();
        return view("Backend.school_management.gallery.index",$data);
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
    public function store(Request $request)
    {
      // dd($request->all());
        $request->validate([
            'image' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $gallery = New Gallery;
            $gallery->name = $request->name;
            if($request->hasFile('image')){
                $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/gallery/'),$fileName);
                $gallery->image = $fileName;
            }
            $gallery->save();

            DB::commit();
            return redirect()->route('admin.gallery.index')->with('message','Image Add Successfully');
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
        $data["gallery"]= Gallery::find($id);
        return view("Backend.school_management.gallery.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
       $request->validate([
        // 'name' => 'required',

    ]);
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
        $gallery->save();

        DB::commit();
        return redirect()->route('admin.gallery.index')->with('message','Image Update Successfully');
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

        $gallery =  Gallery::find($request->gallery_id);
        $gallery->delete();
        return back()->with('message','Image Deleted Successfully');
    }


    public function status($id)
    {
        $gallery = gallery::find($id);
        if($gallery->status == 0)
        {
            $gallery->status = 1;
        }elseif($gallery->status == 1)
        {
            $gallery->status = 0;
        }
        $gallery->update();
        return redirect()->route('admin.gallery.index');
    }
}
