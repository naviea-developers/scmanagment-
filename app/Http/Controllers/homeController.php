<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function viewCategory(){

        $category = DB::table('category')
        ->get();
        return view('backend.setting.category', compact('category'));

    }

    public function insertCategory(Request $req){

        $user = DB::table('category')->insert([
            'categoryName' => $req->categoryName,
            'categoryPosition' => $req->categoryPosition,
            'status' => $req->status,
        ]);

        if($user > 0)
        {

            return Redirect::to('/viewCategory')
            ->with('msg', 'Category Add Successfully');
        }

    }

    public function editCategory($id){

        $editCategory = DB::table('category')->where('catId',$id)
        ->get();
        return view('backend.setting.editCategory', compact('editCategory'));

    }
    public function updateCategory(Request $req,$id){

        $updateData = DB::table('category')->where('id',$id)->update([
            'categoryName' => $req->categoryName,
            'categoryPosition' => $req->categoryPosition,
            'status' => $req->status,
        ]);

        if($updateData > 0)
        {

            return Redirect::to('/viewCategory')
            ->with('msg', 'Category updated Successfully');
        }

    }


    public function deleteCat($id){

        $product = DB::table('category')->where('id', '=' , $id)->delete();

        return Redirect::to('/viewCategory')
        ->with('msg', 'Category Delete Successfully');
    }


    public function viewSubCategory(){

        $category = DB::table('category')
        ->get();
        $sub_category = DB::table('sub_category')
        ->get();
        return view('backend.setting.subCategory', compact('category' , 'sub_category'));

    }



    public function addSubCategory(){

        $category = DB::table('category')
        ->get();
        return view('backend.setting.addSubCategory', compact('category'));

    }


    public function insertSubCategory(Request $req){


        $user = DB::table('sub_category')->insert([
            'category_id' => $req->category,
            'subCategoryName' => $req->subcat,
        ]);

        return Redirect::to('/viewSubCategory')
        ->with('msg', 'Sub-Category Added Successfully');

    }

    public function editsubCategory($id){

        $category = DB::table('category')
        ->get();

        $editsubCategory = DB::table('sub_category')
        ->where('sub_category.id',$id)
        ->get();

        return view('backend.setting.editSubCategory', compact('editsubCategory','category'));

    }
    public function updatesubCategory(Request $req,$id){


        $subCat = DB::table('sub_category')
        ->where('sub_category.id',$id)
        ->first();


        $updateData = DB::table('sub_category')->where('id',$id)->update([
            'category_id' => $req->category,
            'subCategoryName' => $req->subcat,
            'created_at' => now(),
        ]);
        
        $updateCourseData = DB::table('course')->where('subcatId',$subCat->subCategoryName)->update([
            'subcatId' => $req->subcat,
        ]);
        
        

        if($updateData > 0)
        {

            return Redirect::to('/viewSubCategory')
            ->with('msg', 'Sub Category updated Successfully');
        }

    }



    public function deleteSubCat($id){

        $product = DB::table('sub_category')->where('id', '=' , $id)->delete();

        return Redirect::to('/viewSubCategory')
        ->with('msg', 'Sub-Category Delete Successfully');
    }


    public function viewBrand(){
        $brand = DB::table('brand')->get();
        $category = DB::table('category')->get();
        $sub_category = DB::table('sub_category')->get();
        return view('backend.setting.brands', compact('brand' , 'category' , 'sub_category'));

    }


    public function getBrandsubCategory(Request $request){
        $subcategory = DB::table('sub_category')
        ->where('category_id', $request->id)
        ->get();

        // echo $subcategory;

        if(count($subcategory) > 0)
        {
            foreach ($subcategory as $key => $subcate) {
                echo "<option value='$subcate->subCategoryName'>". $subcate->subCategoryName ."</option>";
               }
        }
        else{
            echo "<option>No Data found</option>";
        }


    }

    public function insertBrand(Request $req){

        $file= $req->file('logo');
        $filename = date('YmdHi').$file->getClientOriginalName();
        $destinationPath = '/backend/brand';
        $file->move(public_path($destinationPath),$filename);


        $user = DB::table('brand')->insert([
            'catId'=>$req->catId,
            'subcatId'=>$req->subcatId,
            'brandName' => $req->name,
            'logo' => $filename,
            'created_at' => now(),
        ]);

        return Redirect::to('/viewBrand')
        ->with('msg', 'Brand Added Successfully');


    }


    public function editBrand($id){
        $editbrand = DB::table('brand')
        ->leftJoin('category','category.catid','=','brand.catId')
        ->where('brand.bid',$id)
        ->get();

        // echo $editbrand;
        return view('backend.setting.editBrand', compact('editbrand'));

    }


    public function updateBrand(Request $req,$id){
        $fileName = $req->prev_file;

        if (!empty($req->file('logo'))) {
        $file= $req->file('logo');
        $filename = date('YmdHi').$file->getClientOriginalName();
        $destinationPath = '/backend/brand';
        $file->move(public_path($destinationPath),$filename);
        DB::table('brand')->where('bid',$id)->update([
            'logo'=>$filename
        ]);

        }

        $user = DB::table('brand')->where('bid',$id)->update([
            'catId'=>$req->catId,
            'subcatId'=>$req->subcatId,
            'brandName' => $req->name,
            'logo' => $fileName,
            'created_at' => now(),
        ]);

        return Redirect::to('/viewBrand')
        ->with('msg', 'Brand Updated Successfully');



    }


    public function deletebrand($id){

        $product = DB::table('brand')->where('bid', '=' , $id)->delete();

        return Redirect::to('/viewBrand')
        ->with('msg', 'Brand Delete Successfully');


    }




}
