<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class teacherController extends Controller
{
    public function teacherSignUp(){
        return view('backend.auth.teacherSignUp');
    }
    public function addTeacher(Request $request){


        if ($request->Cpass != $request->pass) {
            return Redirect::to('/teacherSignUp')
            ->with('msg', 'Password Not Match !');
        }


        $user = DB::table('user')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'teacher',
            'addres' => $request->address,
            'pass' =>md5($request->pass),
        ]);

        $userId = DB::table('user')->where('email', $request->email)->where('pass', md5($request->pass))
            ->first();


        $teacher = DB::table('teacher_info')->insert([
            'userId' => $userId->id,
            'edu_deg' => $request->edu_deg,
            'exp' => $request->exp,
            'sub' => $request->sub
        ]);
            session(['userId' => $userId->id]);
            session(['userName' => $userId->name]);
            session(['userEmail' => $userId->email]);
            session(['userRole' => $userId->role]);
            session(['userImg' => $userId->img]);
            session(['status' => $userId->status]);

        return redirect('/teacher_profile');
    }
    public function signin(){

        return view('backend.auth.teacherLogin');
    }

    public function teacherlogout(){

        DB::table('attendance')->where('userid',session()->get('userId'))->update([
            'exittime'=>date('H:m:s')
        ]);
        Session::flush();
        return Redirect::to('/signin');

    }

    public function teacherLogin(Request $request){
        $user = DB::table('user')
                ->where('email' , $request->email)
                ->where('pass' , md5($request->pass))
                ->first();

            if(!empty($user)){

                session(['userId' => $user->id]);
                session(['userName' => $user->name]);
                session(['userEmail' => $user->email]);
                session(['userRole' => 'teacher']);
                session(['userImg' => $user->img]);
                session(['status' => $user->status]);

                DB::table('attendance')->insert([
                    'userid'=>session()->get('userId'),
                    'attime'=>date('H:i:s'),
                    'atdate'=>date('Y-m-d')
                ]);

                return Redirect::to('/teacher_profile')
                    ->with('msg', 'Welcome Back  ' . ucwords($user->role));
            }else{
                return Redirect::back()
                ->with('msg', 'Wrong username/password');
            }

    }
    public function viewAllTeacher(){

        $user = DB::table('user')
        ->leftJoin('teacher_info' , 'teacher_info.userid' , 'user.id')
        ->where('user.role' , 'teacher')
        ->get();
        return view('backend.teacher.view', compact('user'));

    }


    public function teacherInfo($id) {
        $user = DB::table('user')
        ->where('id',$id)
        ->get();

        $teacher = DB::table('teacher_info')
        ->where('userid',$id)
        ->get();

        return view('backend.teacher.manage', compact('user' , 'teacher'));

    }



    public function addTeacherForClass(Request $req){

        $classlist = DB::table('classlist')->get();
        $teacher_info = DB::table('teacher_info')->get();
        return view('backend.teacher.manageSubject',
        compact('classlist' , 'teacher_info'));

    }


    public function getClassWiseSub(Request $req){

        $subject = DB::table('allsubject')
        ->where('class_id',$req->id)
        ->get(['subject' , 'id']);

        if(count($subject) > 0)
        {
            foreach ($subject as $key => $sub) {
                echo "<option value='$sub->id,$sub->subject'>". $sub->subject ."</option>";
               }
        }
        else{
            echo "<option>No Data found</option>";
        }

    }

    public function getSubwiseTeach(Request $req){

        $subData = (explode(",",$req->id));

        $subject = DB::table('teacher_info')
        ->where('sub',$subData['1'])
        ->get();


        $tech_id = DB::table('teacher_info')
        ->where('sub',$subData['1'])
        ->get();

        // $user = '';
        foreach ($tech_id as $tid) {

            $user = DB::table('user')
            ->where('id',$tid->userid)
            ->get(['name' , 'id']);


            foreach ($user as $us) {
                echo "<option value='$us->id'>". $us->name ."</option>";
            }

        }


    }



    public function uploadTeacherForClass(Request $req){

        $subData = (explode(",",$req->sub));
        $addvendor = DB::table('class_wise_teacher')->insert([
            'class_id' => $req->class,
            'subject_id' => $subData['0'],
            'teacher_id' => $req->teacher,
        ]);

        return Redirect::back()
        ->with('msg', 'Class Wise Teacher Add Successfully');

    }



    public function viewClassWiseTeacher(Request $req){

        $classlist = DB::table('classlist')->get();

        return view('backend.teacher.viewClassWiseTeacher',
        compact('classlist'));


    }


    public function getClassWiseTeacherInfo(Request $req){

        $class = DB::table('class_wise_teacher')
        ->where('class_id' , $req->id)
        ->get();

        $classData = $req->id;

        if(count($class) > 0){


            $users = DB::table('class_wise_teacher')
            ->leftJoin('allsubject', 'allsubject.id', '=', 'class_wise_teacher.subject_id')
            ->leftJoin('user', 'user.id', '=', 'class_wise_teacher.teacher_id')
            ->where('class_wise_teacher.class_id' , $req->id)
            ->get();

            return view('backend.teacher.ClasswiseTeacherAfterLoad',
            compact('users' , 'classData'));


        }else {
            echo " <center> NO DATA FOUND ! </center> " ;
        }


    }



}
