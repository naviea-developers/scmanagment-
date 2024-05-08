<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class galleryController extends Controller
{
    public function galleryIndex(){
        $category = DB::table('category')->get();
        return view('gallery.addgallery',compact('category'));
    }

    public function storeImages(Request $request){
        $input = $request->all();
        $images = array();
        if($files=$request->file('image')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $images[]=$name;
            }
        }
        /*Insert your data*/

        DB::table('gallery')->insert( [
            'cateId'=>$request->category,
            'title'=>$request->title,
            'image'=>  implode("|",$images),
            //you can put other insertion here
        ]);


        return redirect()->back();
    }

    public function showImages(){
        $images = DB::table('gallery')->get();

        return view('gallery.totalgallery', compact('images'));
    }
}
