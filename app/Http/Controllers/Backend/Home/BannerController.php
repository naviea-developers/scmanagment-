<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['banners'] = Banner::orderBy('id', 'desc')->get();
        return view("Backend.home.banner.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data["categorys"] = Category::where('parent_id', '=' ,0)->get();
        // $data["sub_categories"] = Category::where('parent_id', '!=' ,0)->where('is_sub',0)->orderBy('id', 'desc')->get();
        return view("Backend.home.banner.create");
    }
      //ajax getSubCategory
    public function getsubcategory($id){
        $sub_cat = Category::where("parent_id",$id)->get();
        return $sub_cat;
	}

     //ajax getChildCategory
     public function getchildcategory($id){
        if($id == 0){
            return [];
        }
        $child_cat = Category::where("parent_id",$id)->get();
        return $child_cat;
	}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //dd($request->all());
         $request->validate([
            // 'category_id' => 'required',
            'title' => 'required',
            'image' => 'required',
            // 'type' => 'required',
        ]);


            // $banner = Banner::first();
            // if($banner == null){
            //     $banner = New Banner;
            // }

        $banner = new Banner();
        $banner->title = $request->title;
        // $banner->category_id = $request->category_id;
        // $banner->subcategory_id = $request->subcategory_id;
       $banner->type = $request->type;
        $banner->details = $request->details;

        if($request->hasFile('image')){
            $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/banner/'),$fileName);
            $banner->image = $fileName;
        }

        $banner->save();
        return redirect()->route('home-banner.index')->with('message','Banner Add Successfully');
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
        $data["banner"]=$banner= Banner::find($id);
        // $data["categorys"] = Category::where('parent_id',0)->get();
        // $data["sub_categorys"] = Category::where('parent_id',$banner->category_id)->orderBy('id', 'desc')->get();
        return view("Backend.home.banner.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //dd($request->all());
         $request->validate([
            // 'category_id' => 'required',
            'title' => 'required',
            'type' => 'required',
        ]);



            // $banner = Banner::first();
            // if($banner == null){
            //     $banner = Banner::find($id);
            // }


        $banner = Banner::find($id);
        $banner->title = $request->title;
        // $banner->category_id = $request->category_id;
        // $banner->subcategory_id = $request->subcategory_id;
        $banner->type = $request->type;
        $banner->details = $request->details;

        if($request->hasFile('image')){
            @unlink(public_path("upload/banner/".$banner->image));
            $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/banner/'),$fileName);
            $banner->image = $fileName;
        }

        $banner->save();
        return redirect()->route('home-banner.index')->with('message','Banner Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $banner= Banner::find($request->home_banner_id);
        $path = public_path("upload/banner/".$banner->image);
        @unlink($path);

        $banner->delete();
        return redirect()->route('home-banner.index');

    }

    public function status_toggle($id)
    {
        $banner = Banner::find($id);
        if($banner->status == 0)
        {
            $banner->status = 1;
        }elseif($banner->status == 1)
        {
            $banner->status = 0;
        }
        $banner->update();
        return redirect()->route('home-banner.index');
    }


    public function BannerImageEdit(Request $request, string $id)
    {
        // dd($id);
         $request->validate([
            // 'category_id' => 'required',
            // 'title' => 'required',
            // 'type' => 'required',
        ]);

        $banner = Banner::find($id);
        @unlink(public_path("upload/banner/".$banner->image));
        $banner->image = Null;
        $banner->save();
        return redirect()->route('home-banner.index')->with('message','Banner Image Delete Successfully');

    }




}
