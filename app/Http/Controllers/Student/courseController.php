<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class courseController extends Controller
{
    public function viewCourse()
    {
        $course = DB::table('course')->first('id');
        $buyCourse = DB::table('cart')
        ->join('user','user.id', '=', 'cart.userId')
        ->join('course','course.id','=','cart.courseId')
        ->where('cart.userId',session()->get('userId'))
        ->get();

        // echo $buyCourse;

        return view('backend.student.pages.course', compact('buyCourse'));
    }

    public function studentViewDetails($id){
        $courseDetails = DB::table('course')
        ->join('category','category.id','=','course.catId')
        ->where('course.id',$id)->get();
        return view('backend.student.pages.coursedetails',compact('courseDetails'));
    }

    public function addCourse()
    {
        $category = DB::table('category')->get();

        return view('backend.course.courseAdd',compact('category'));
    }

    public function getSubcategory(Request $request){
        $subcategory = DB::table('sub_category')
        ->where('category_id', $request->id)
        ->get();



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

    public function manageCourse(Request $request)
    {
        if ($request->file('video')) {
            $video = $request->file('video');
            $extension = date('YmdHi') . $video->getClientOriginalName();
            $destinationPath = '/video';
            $video->move(public_path($destinationPath), $extension);
        }
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageFile = date('YmdHi') . $image->getClientOriginalName();
            $destinationPath = '/video';
            $image->move(public_path($destinationPath), $imageFile);

        }
        $course = DB::table('course')->insert(
            array(
                [
                    'catId' => $request->catId,
                    'subcatId' => $request->subcatId,
                    'name' => $request->name,
                    'video' => $extension,
                    'image' => $imageFile,
                    'feature' => implode('||',$request->feature),
                    'short_description' => $request->short_description,
                    'long_description' => $request->long_description,
                    'price' => $request->price,
                    'course_hour' => $request->course_hour,
                    'course_routine' => $request->course_routine,
                    'total_days' => $request->total_days,
                    'status' => $request->status,
                ]
            )
        );
        return redirect()->route('totalCourse');
    }

    public function totalCourse()
    {
        $totalcourse = DB::table('course')
            ->get();
        return view('backend.course.totalCourse', compact('totalcourse'));
    }

    public function editCourse($id)
    {
        $category = DB::table('category')->get();

        $editData = DB::table('course')->where('id', $id)->get();

        return view('backend.course.editCourse', compact('editData','category'));
    }

    public function updateCourse(Request $request, $id)
    {

        $input = DB::table('course')->where('id', $id)->first();
        if ($request->file('video')) {
            $video = $request->file('video');
            $extension = date('YmdHi') . $video->getClientOriginalName();
            $destinationPath = '/video';
            $video->move(public_path($destinationPath), $extension);

        } else {
            $extension = $input->video;
        }
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageFile = date('YmdHi') . $image->getClientOriginalName();
            $destinationPath = '/video';
            $image->move(public_path($destinationPath),$extension);

        } else {
            $imageFile = $input->image;
        }

        DB::table('course')->where('id', $id)->update([
            'video' => $extension,
        ]);

        DB::table('course')->where('id', $id)->update([
            'image' => $imageFile,
        ]);

        $course = DB::table('course')->where('id', $id)->update([

            'name' => $request->name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'price' => $request->price,
            'feature' =>implode('\n',$request->feature),
            'course_hour' => $request->course_hour,
            'total_days' => $request->total_days,
            'course_routine' => $request->course_routine,
            'status' => $request->status,

        ])
        ;


        // dd($input);

        return redirect()->route('totalCourse');
    }

    public function deleteCourse($id)
    {
        $data = DB::table('course')->where('id', $id)->delete();
        return redirect()->route('totalCourse');
    }
}
