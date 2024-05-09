<?php

namespace App\Http\Controllers\Backend\Class;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\Classe;

class classController extends Controller
{
    public function addNewBatch(){
    //    dd('hi');
        $classList = DB::table('classlist')->get();
        // $classList = Classe::order('id','deac')->get();
        return view('Backend.classes.add', compact('classList'));

    }

    public function viewAllClass(){

        // if(session()->get('userRole') == 'admin') {

            $class = DB::table('classes')->get();
            return view('Backend.classes.view', compact('class'));

        // }else{
        //     return redirect('/deshboard');
        // }

    }


    public function uploadnewClass(Request $req){


        $string=implode(" , ", $req->week);

        $classList = DB::table('classlist')
        ->where('class_name' , $req->bathcName)
        ->first();


        $addProduct = DB::table('classes')->insert([
            'batch_id' => $classList->class_id,
            'batch_name' => $req->bathcName,
            'class_duration' => $req->duration,
            'class_start' => $req->startAt,
            'class_end' => $req->endAt,
            'weekly' => $string,
        ]);

        return redirect('/viewAllClass');

    }




    public function addRoutine(Request $req){

        // if(session()->get('userRole') == 'admin') {

            $classList = DB::table('classlist')->get();
            return view('Backend.classes.routine', compact('classList'));

        // }else{
        //     return redirect('/deshboard');
        // }

    }


    public function uploadRoutine(Request $req){

        $addProduct = DB::table('class_routine')->insert([
            'class_id' => $req->class,
            'class_routine' => $req->routine,
        ]);

        return redirect('/viewAllClass');

    }



    public function classDetails(Request $req){


        // if(session()->get('userRole') == 'admin') {

            $class_routine = DB::table('class_routine')
            ->where('class_id' , $req->id)
            ->get();
            $classes = DB::table('classes')
            ->where('batch_id' , $req->id)
            ->get();

            return view('Backend.classes.classDetails', compact('class_routine' , 'classes'));

        // }else{
        //     return redirect('/deshboard');
        // }

    }



    public function editClassDetailse($id){


        // if(session()->get('userRole') == 'admin') {

            $class_routine = DB::table('class_routine')
            ->where('class_id' , $id)->limit(1)
            ->get();

            $classes = DB::table('classes')
            ->where('batch_id' , $id)
            ->get();

            return view('Backend.classes.editClassDetailse',
            compact('class_routine' , 'classes'));

        // }else{
        //     return redirect('/deshboard');
        // }

    }



    public function updateClassDetailes(Request $req){

        $string=implode(" , ", $req->week);

        $class = DB::table('classes')->where('batch_id', $req->class_id)->update(array(
            'batch_name' => $req->bathcName,
            'class_duration' => $req->duration,
            'class_start' => $req->startAt,
            'class_end' => $req->endAt,
            'weekly' => $string,
        ));


        $class_routine = DB::table('class_routine')
        ->where('class_id', $req->class_id)->update(array(
            'class_routine' => $req->class_routine,
        ));


        return redirect('/viewAllClass');

    }


    public function deleteClassDetailse($id){

        // if(session()->get('userRole') == 'admin') {
            $classes = DB::table('classes')->where('batch_id', '=' , $id)->delete();
            $class_routine = DB::table('class_routine')->where('class_id', '=' , $id)->delete();
            return redirect('/viewAllClass');

        // }else{
        //     return redirect('/deshboard');
        // }
    }



    public function getHomework(){

        $all_homework = DB::table('homework')->get();
        return view('Backend.classes.getHomework', compact('all_homework'));

    }


    public function addHomework(){

        // if(session()->get('userRole') == 'teacher') {
            $classList = DB::table('classlist')->get();
            $subject = DB::table('teacher_info')
            ->join('user','user.id','=','teacher_info.userid')
            ->where('user.id',session()->get('userId'))
            ->first(['sub']);

            return view('Backend.classes.addHomework', compact('classList','subject'));
        // }else{

        //     return Redirect::back()->with('msg', 'Only Teacher Can Add Homework');
        // }

    }

    public function storeHomework(Request $request){
        if (!empty($request->file('image'))) {
            $file = $request->file('image');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $destinationPath = '/homework';
            $file->move(public_path($destinationPath), $fileName);
        }

        $blogData = DB::table('homework')->insert(
            array(
                [
                    'classId' => $request->classId,
                    'teacherId' => $request->teacherId,
                    'image' => $fileName,
                    'details' => $request->details,
                ]
            )
        );

        return redirect()->back();
    }

    public function addClassTest(){

        // if(session()->get('userRole') == 'teacher') {
            $classList = DB::table('classlist')->get();
            $subject = DB::table('teacher_info')
            ->join('user','user.id','=','teacher_info.userid')
            ->where('user.id',session()->get('userId'))
            ->first(['sub']);

            // echo $subject->sub;
            return view('Backend.classes.addClassTest', compact('classList','subject'));
        // }else{
        //     return redirect('/deshboard');
        // }
    }

    public function storeClassTest(Request $request){
        if (!empty($request->file('image'))) {
            $file = $request->file('image');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $destinationPath = '/homework';
            $file->move(public_path($destinationPath), $fileName);
        }

        $blogData = DB::table('class_test')->insert(
            array(
                [
                    'classId' => $request->classId,
                    'subjectName' => $request->subjectName,
                    'image' => $fileName,
                    'details' => $request->details,
                    'duration' => $request->duration,
                ]
            )
        );

        return redirect()->back();
    }


    public function viewClassTest(){

        $classTest = DB::table('class_test')->get();
        return view('Backend.classes.viewClassTest', compact('classTest'));

    }


    public function addNewStudent(){


        $classlist = DB::table('classlist')
        ->get();
        return view('backend.student.addNewStudent', compact('classlist'));


    }

    public function addNewStudentByAdmin(Request $req){

        $file= $req->file('profilePicture');
        $filename = date('YmdHi').$file->getClientOriginalName();
        $destinationPath = '/backend/profile_picture';
        $file->move(public_path($destinationPath),$filename);


        $user = DB::table('user')->insert([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'addres' => $req->adds,
            'img' => $filename,
            'pass' => md5($req->pass),
            'role' => 'student',
        ]);

        if($user > 0){

            $un = DB::table('user')
            ->where('pass' , md5($req->pass))
            ->where('email' , $req->email)
            ->first();

            $user = DB::table('student_infos')->insert([
                'userId' => $un->id,
                'class' => $req->class,
                'fatherName' => $req->fname,
                'motherName' => $req->mname,
            ]);

        }


        return redirect()->back()->with('msg', 'Student Add Successfully');

    }


}
