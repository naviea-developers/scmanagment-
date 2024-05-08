<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class resultController extends Controller
{
    //--------------Result----------------//

    public function viewResult(){

        $getData = DB::table('result')
                ->join('student_infos','student_infos.userID', '=', 'result.studentId')
                ->join('user','user.id','=','result.studentId')
                ->get();

        return view('backend.result.manageResult',compact('getData'));
    }

    public function addResult()
    {
        $className = DB::table('classlist')->get();

        $student = DB::table('user')
            ->where('role', 'student')->get();


        $subject = DB::table('teacher_info')
        ->join('user','user.id','=','teacher_info.userid')
        ->first(['sub']);

        $examName = DB::table('exam')->get();

            return view('backend.result.addResult',compact('subject','student','examName','className'));
    }

    public function getStudent(Request $request){
        $allStudent = DB::table('student_infos')
        ->join('user','user.id','=','student_infos.userId')
        ->where('student_infos.class',$request->id)
        ->get();

        if(count($allStudent) > 0)
        {
            foreach ($allStudent as $key => $student) {
                echo "<option value='$student->userId'>". $student->name ."</option>";
               }
        }
        else{
            echo "<option>No Data found</option>";
        }


    }

    public function resultInfo(Request $request){
        // echo $request->id;

        $student_info = DB::table('student_infos')
        ->where('userId', $request->id)->first(['roll']);

        // echo $student_info;

        return response()->json(['roll' => $student_info->roll]);


    }

    public function storeResult(Request $request){
        $storeData = DB::table('result')->insert(array(
            'studentId'=> $request->studentName,
            'class'=> $request->class,
            'roll'=> $request->roll,
            'examId'=> $request->exam,
            'subjectId'=> $request->subject,
            'totalMarks'=> $request->total,
            'obtainedMarks'=> $request->obtained,
            'PracticalMarks'=> $request->practical,
        ));

        return redirect()->back();
    }

    public function showResult(){

        $getData = DB::table('result')
                ->join('student_infos','student_infos.userId', '=', 'result.studentId')
                ->get('id');




        // echo $getData;

    }

    public function deleteResult($id){
        DB::table('result')
        ->where('id',$id)
        ->delete();

        return redirect()->back();
    }
}
