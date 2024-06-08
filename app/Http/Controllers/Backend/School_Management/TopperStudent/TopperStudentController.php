<?php

namespace App\Http\Controllers\Backend\School_management\TopperStudent;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Admission;
use App\Models\Classe;
use App\Models\Examination;
use App\Models\Group;
use App\Models\SchoolSection;
use App\Models\Session;
use App\Models\TopperStudent;
use Illuminate\Http\Request;

class TopperStudentController extends Controller
{
    public function index()
    { 
        $data['toppers'] = TopperStudent::all();
        return view('Backend.school_management.topper_student.index', $data);
    }

    public function create()
    {
        $data['students'] = Admission::where('is_new', 0)->where('status', 1)->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['academic_years'] = AcademicYear::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        $data['examinations'] = Examination::where('exam_priority', 'main')->where('status', 1)->get();
        return view('Backend.school_management.topper_student.create', $data);
    }

    public function store(Request $request)
    {
        $topper = new TopperStudent();
        $topper->academic_year_id = $request->academic_year_id ?? 0;
        $topper->session_id = $request->session_id ?? 0;
        $topper->student_id = $request->student_id ?? 0;
        $topper->class_id = $request->class_id ?? 0;
        $topper->section_id = $request->section_id ?? 0;
        $topper->group_id = $request->group_id ?? 0;
        $topper->examination_id = $request->examination_id ?? 0;
        $topper->result = $request->result;
        $topper->details = $request->details;
        $topper->save();
        return redirect()->route('admin.topper_student.index')->with('message', 'Topper student added successfully, thank you.');
    }

    public function edit($id)
    { 
        $data['topper'] = TopperStudent::find($id);
        $data['students'] = Admission::where('is_new', 0)->where('status', 1)->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['academic_years'] = AcademicYear::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        $data['examinations'] = Examination::where('exam_priority', 'main')->where('status', 1)->get();
        return view('Backend.school_management.topper_student.update', $data);
    }

    public function update(Request $request, $id)
    {
        $topper = TopperStudent::find($id);
        $topper->academic_year_id = $request->academic_year_id ?? 0;
        $topper->session_id = $request->session_id ?? 0;
        $topper->student_id = $request->student_id ?? 0;
        $topper->class_id = $request->class_id ?? 0;
        $topper->section_id = $request->section_id ?? 0;
        $topper->group_id = $request->group_id ?? 0;
        $topper->examination_id = $request->examination_id ?? 0;
        $topper->result = $request->result;
        $topper->details = $request->details;
        $topper->save();
        return redirect()->route('admin.topper_student.index')->with('message', 'Update topper student info successfully, thank you.');
    }

    public function destroy(Request $request)
    {
        $topper =  TopperStudent::find($request->topper_id);
        $topper->delete();
        return redirect()->route('admin.topper_student.index')->with('message','Topper student info deleted successfully');
    }

    public function status($id)
    {
        $topper = TopperStudent::find($id);
        if($topper->status == 0)
        {
            $topper->status = 1;
        }elseif($topper->status == 1)
        {
            $topper->status = 0;
        }
        $topper->update();
        return redirect()->route('admin.topper_student.index')->with('message', 'Status Updated');
    }
}
