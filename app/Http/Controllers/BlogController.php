<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{

    public function allBlog(){
        $blog = DB::table('blog')->leftJoin('category','category.catId','=','blog.categoryId')->get();
        return view('backend.blog.all_blog',compact('blog'));
    }

    public function addBlog(){
        return view('backend.blog.add_blog');
    }

    public function storeBlog(Request $request){

        if (!empty($request->file('file'))) {
            $file = $request->file('file');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $destinationPath = '/video';
            $file->move(public_path($destinationPath), $fileName);
        }

        $blogData = DB::table('blog')->insert(
            array(
                [
                    'title' => $request->title,
                    'categoryId' => $request->catId,
                    'subcateId' => $request->subcatId,
                    'file' => $fileName,
                    'short_descp' => $request->short_descp,
                    'long_descp' => $request->long_descp,
                    'status' => $request->status,
                ]
            )
        );

        return redirect()->route('allBlog');
    }

    public function editBlog($id){

        $editData = DB::table('blog')->leftJoin('category','category.catId','=','blog.categoryId')->where('bid', $id)->get();
        return view('backend.blog.edit_blog', compact('editData'));
    }

    public function updateBlog(Request $request, $id){

        $fileName = $request->prev_file;
        if (!empty($request->file('file'))) {
            $file = $request->file('file');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $destinationPath = '/video';
            $file->move(public_path($destinationPath), $fileName);
            unlink('/video'.$fileName);
            DB::table('blog')->where('bid', $id)->update([
                'file' => $fileName
            ]);
        }


         DB::table('blog')->where('bid',$id)->update(
                [
                    'title' => $request->title,
                    'categoryId' => $request->catId,
                    'subcateId' => $request->subcatId,
                    'file' => $fileName,
                    'short_descp' => $request->short_descp,
                    'long_descp' => $request->long_descp,
                    'status' => $request->status,
                ]
        );

        return redirect()->route('allBlog');

    }

    public function deleteBlog($id){
        DB::table('blog')->where('bid', $id)->delete();

        return redirect()->route('allBlog');
    }

}
