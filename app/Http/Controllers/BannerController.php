<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class BannerController extends Controller
{
    public function viewBanner(){
        $bannerData = DB::table('banner')->get();
        return view('backend.banner.total_banner',compact('bannerData'));

    }

    public function addBanner(Request $request){

        return view('backend.banner.add_banner');
    }

    public function storeBanner(Request $request){
        if (!empty($request->file('image'))) {
            $file = $request->file('image');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $destinationPath = '/backend/banner';
            $file->move(public_path($destinationPath), $fileName);
        }
        $blogData = DB::table('banner')->insert(
            array(
                [
                    'title' => $request->title,
                    'categoryId' => $request->categoryId,
                    'image' => $fileName,
                    'status' => $request->status,
                ]
            )
        );

        return redirect()->route('viewBanner');
    }

    public function editBanner($id){
        $editBanner = DB::table('banner')->where('id', $id)->get();

        return view('backend.banner.edit_banner', compact('editBanner'));
    }
    public function updateBanner(Request $request, $id){

        // $input = DB::table('banner')->where('id',$id)->get();

        $fileName = $request->prev_pic;

        if (!empty($request->file('image'))) {
            $file = $request->file('image');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $destinationPath = '/backend/banner';
            $file->move(public_path($destinationPath), $fileName);

            DB::table('banner')->where('id', $id)->update([
                'image' => $fileName
            ]);
        }
         DB::table('blog')->where('id',$id)->update(
                [
                    'title' => $request->title,
                    'categoryId' => $request->categoryId,
                    'file' => $fileName,
                    'status' => $request->status,
                ]
        );

        return redirect()->route('viewBanner');

    }

    public function deleteBanner($id){
        DB::table('banner')->where('id', $id)->delete();

        return redirect()->route('viewBanner');
    }

}
