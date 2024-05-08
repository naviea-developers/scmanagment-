<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class studentController extends Controller
{
    public function getTotalStudent(){

        $user = DB::table('user')
        ->where('role' , 'student')
        ->leftjoin('student_infos' , 'student_infos.userId' , 'user.id')
        ->get();
        return view('backend.student.allStudent', compact('user'));

    }


    public function studentInfo($id){

        $user = DB::table('user')
        ->leftjoin('student_infos' , 'student_infos.userId' , 'user.id')
        ->leftjoin('classes' , 'classes.batch_id' , 'student_infos.class')
        ->leftjoin('class_routine' , 'class_routine.class_id' , 'student_infos.class')
        ->where('user.id' , $id)
        ->get();
        return view('backend.student.studentInfo', compact('user'));

    }


    public function viewClassWiseStudent(Request $req){

        $classlist = DB::table('classlist')->get();

        return view('backend.student.pages.backend.classWiseStudent',
        compact('classlist'));


    }


    public function getClassWiseStudent(Request $req){


        $class = DB::table('student_infos')
        ->where('class' , $req->id)
        ->get();

        $classData = $req->id;

         if(!empty($class)){

          $students = DB::table('student_infos')
          ->leftJoin('user', 'user.id', '=', 'student_infos.userId')
            ->where('student_infos.class' , $req->id)
            ->get();
            
            echo '<table class="table"><thead><tr><th scope="col">Class Name</th><th scope="col">Student Name</th><th scope="col">Student Image</th></tr></thead><tbody>';
            
            foreach ($students as $student) {
              echo '<tr> 
                        <td>'. $student->class . ' </td> 
                        <td>'. $student->name . ' </td> 
                        <td><img src="/backend/profile_picture/'. $student->img . '" style="height: 30px;" ></td> 
                    </tr>';
            }
            
            
           echo '</tbody></table>';
            

        }else {
            echo " <center> NO DATA FOUND ! </center> " ;
         }


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


        return Redirect::back()
        ->with('msg', 'Student Add Successfully');
        
    }
    
    
   

}
