<?php

namespace App\Http\Controllers\Backend\School_management\ExamSchedules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ExamSchedule;
use App\Models\Classe;
use App\Models\Subject;

class ExamSchedulesController extends Controller
{
    public function manageClasses(){

        $class = DB::table('classlist')->get();

        return view('Backend.school_management.examschedule.manage', compact('class'));

    }

    public function addAClass(Request $req){

        $class = DB::table('classlist')
        ->where('class_name' , $req->className)
        ->get();

        if(!count($class) > 0){
            $addProduct = DB::table('classlist')->insert([
                'class_id'      => strtolower(str_replace(" ",".",$req->className)),
                'class_name'    => $req->className,
            ]);
        }

        return redirect('/manageClasses');

    }

    public function deleteClass($id){
        $data = DB::table('classlist')->where('id', $id)->delete();


    }


    public function manageSubject(Request $req){

        $subj = DB::table('allsubject')->get();

        return view('Backend.school_management.examschedule.manageSubject', compact('subj'));

    }

     //------------------------ Notice Methods-----------------------------//

     public function addNotice(){
        return view('Backend.school_management.examschedule.addNotice');
    }

    public function storeNotice(Request $request){
        $notice = DB::table('notice')->insert(array([
            'notice'        => $request->notice,
            'name'          => $request->name,
            'description'   => $request->description
        ]));
        // dd($notice);
        return redirect()->route('viewNotice');
    }

    public function viewNotice(){

        $notice = DB::table('notice')->get();

        return view('Backend.school_management.examschedule.manageNotice',compact('notice'));

    }

    public function editNotice($id){

        $editNotice = DB::table('notice')->where('id', $id)->get();


        return view('Backend.school_management.examschedule.editNotice', compact('editNotice'));
    }

    public function updateNotice(Request $request,$id){



        $notice = DB::table('notice')
        ->where('id', $id)
        ->update(array(
            'notice' => $request->notice,
            'name' => $request->name,
            'description' => $request->description,
        ));

        // echo $course;
        // // dd($course);

        return redirect()->route('viewNotice');

}


    //--------------Exam------------//

    public function allExam(){
        // $allData = DB::table('exam')->
        // select('title','className')->
        // distinct()->
        // get();
        $allData=ExamSchedule::orderBy('id', 'desc')->get();
        return view('Backend.school_management.examschedule.manageExam',compact('allData'));
    }

    // public function examDetails(){

    //     return view('Backend.school_management.examschedule.viewExam');
    // }

    public function addExam(){
        // $className = DB::table('classlist')->get();
        // $subjectName = DB::table('allsubject')->get();
        
        $className=Classe::orderBy('id', 'desc')->get(); 
        $subjectName=Subject::orderBy('id', 'desc')->get();

        return view('Backend.school_management.examschedule.addExam',compact('className','subjectName'));
    }

    public function storeExam( Request $request){

        $input = $request->input();


        foreach ($input['subjectName'] as $subject => $subjectName) {

            $exam = DB::table('exam')->insert(
                array(
                    [
                        'title' => $request->title,
                        'className' => $request->className,
                        'subjectName' => $input['subjectName'][$subject],
                        'date' => $input['date'][$subject],
                        'startAt' => $input['startAt'][$subject],
                        'endAt' => $input['endAt'][$subject],
                    ]
                )
            );
        }

        return redirect()->back();
    }

    public function examDetails(Request $request){

        $examRoutine = DB::table('exam')->where('title',$request->title)->where('className',$request->className)->get();

        return view('Backend.school_management.examschedule.viewExam',
        compact('examRoutine'));
    }

    public function edit($id){

        $editData = DB::table('exam')->where('className', $id)->get();


        return view('Backend.school_management.examschedule.editExamdetails', compact('editData'));
    }

    public function update(Request $request,$id){



        $course = DB::table('exam')
        ->where('className', $id)
        ->where('id', $request->id)
        ->update(array(
            'title' => $request->title,
            'className' => $request->className,
            'subjectName' => $request->subjectName,
            'date' => $request->date,
            'startAt' => $request->startAt,
            'endAt' => $request->endAt,
        ));

        // echo $course;
        // // dd($course);

        return redirect()->route('allExam');

}

     //------------------------ Subject Methods-----------------------------//

    public function addSubject(){

        $class = DB::table('classlist')->get();
        return view('Backend.school_management.examschedule.addsub',
        compact('class'));

    }


    public function addASubj(Request $req){

        if (!empty($req->file('image'))) {
            $file = $req->file('image');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $destinationPath = '/backend/subject';
            $file->move(public_path($destinationPath), $fileName);
        }

        $addProduct = DB::table('allsubject')->insert([
            'class_id' => strtolower(str_replace(" ",".",$req->className)),
            'class_name' => $req->className,
            'iamge' => $fileName,
            'subject' => $req->subject,
        ]);

        // echo $fileName;

        return redirect('/manageSubject');


    }

    public function editSubject($id){
        $editData = DB::table('allsubject')->where('id', $id)->get();

        return view('Backend.school_management.examschedule.editsubject',compact('editData'));

    }

    public function updateSubj(Request $request, $id){

        $fileName = $request->prev_file;

        if (!empty($request->file('image'))) {
            $file = $request->file('image');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $destinationPath = '/backend/subject';
            $file->move(public_path($destinationPath), $fileName);

            DB::table('allsubject')->where('id', $id)->update([
                'iamge' => $fileName
            ]);
        }


         DB::table('allsubject')->where('id',$id)->update(
                [
                    'class_id' => strtolower(str_replace(" ",".",$request->className)),
                    'class_name' => $request->className,
                    'iamge' => $fileName,
                    'subject' => $request->subject,
                ]
        );

        return redirect()->route('manageSubject');

    }

    public function deleteSubj($id){
        DB::table('allsubject')
        ->where('id',$id)
        ->delete();

        return redirect()->route('manageSubject');
    }
}
