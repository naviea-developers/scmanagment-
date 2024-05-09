<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["child_categories"] = Category::where('type',"blog")->where('parent_id', '!=' ,0)->where('is_sub','!=',0)->orderBy('position','asc')->get();
        return view("Backend.blog.child_category.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data["categories"] = Category::where('type',"home")->where('parent_id',0)->get();
        $data["categories"] = Category::where('type',"blog")->where('parent_id',0)->get();
        return view("Backend.blog.child_category.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|max:255',
            // 'category' => 'required',
            'sub_category' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->sub_category;
        $category->is_sub = 1;
        $category->position = $request->position;
        $category->color_code = $request->color_code;
        $category->type = 'blog';
        $category->slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        if($request->hasFile('image')){
            $fileName = rand().time().'_pharmacy_chil_category.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/category/'),$fileName);
            $category->icon = $fileName;
        }
        $category->save();
        return redirect()->route('phar-child-category.index')->with('message','Category Add Successfully');
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
        $data["sub_categories"] = Category::where('type',"blog")->where('parent_id','!=',0)->where('is_sub',0)->get();
        $data["child_category"] = Category::find($id);
        return view("Backend.blog.child_category.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'name' => 'required|max:255',
            // 'category' => 'required',
            'sub_category' => 'required',
        ]);

        $category =  Category::find($id);
        $category->name = $request->name;
        $category->parent_id = $request->sub_category;
        $category->position = $request->position;
        $category->color_code = $request->color_code;
        //dd($request);
        if($request->hasFile('image')){
            @unlink(public_path('upload/category/'.$category->image));
            $fileName = rand().time().'_pharmacy_chil_category.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/category/'),$fileName);
            $category->icon = $fileName;
        }
        $category->type = 'blog';
        $category->slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        $category->status = $request->status;
        
        // dd($category);
        $category->save();
        return redirect()->route('phar-child-category.index')->with('message','Category Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $category= Category::find($request->category_id);
        @unlink(public_path('upload/category/'.$category->icon));
        $category->delete();
        return back()->with('message','Category Delete Successfully');
    }
}
