<?php

namespace App\Http\Controllers\Backend\School_management\Admit;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Classe;
use App\Models\Examination;
use App\Models\Group;
use App\Models\SchoolSection;
use App\Models\User;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdmitController extends Controller
{
 
    public function create()
    {
        $data['students'] = Admission::where('is_new', 0)->where('status', 1)->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        $data['examinations'] = Examination::where('status', 1)->where('end_date', '>=', Carbon::today())->get();
        return view("Backend.school_management.admit_card.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(Request $request)
    {
        // $validatedData = $request->validate([
        //     'class_id' => 'required|exists:classes,id',
        //     'group_id' => 'required|exists:groups,id',
        //     'examination_id' => 'required|exists:examinations,id',
        //     'student_id' => 'nullable|exists:students,id',
        // ]);

        $examination = Examination::findOrFail($request->examination_id);

        // $data['admission'] = $admission = Admission::where('user_id', $user->id)->first();  

        if ($request->filled('student_id')) {
            $student = Admission::findOrFail($request->student_id);

            $data['examRoutine']=$examRoutine = ExamSchedule::where('class_id', $student->class_id)
            ->where('section_id', $student->section_id)
            ->where('examination_id', $request->examination_id)
            ->get();
            return view('Backend.school_management.admit_card.admit', compact('student', 'examination','examRoutine'));
        } else {
            $query = Admission::where('is_new',0)->where('class_id', $request->class_id);
            $examRoutineQuery = ExamSchedule::where('class_id', $request->class_id);

            if ($request->filled('section_id')) {
                $query->where('section_id', $request->section_id);
                $examRoutineQuery->where('section_id', $request->section_id);
            }
            if ($request->filled('group_id')) {
                $query->where('group_id', $request->group_id);
            }

            if ($request->filled('examination_id')) {
                $examRoutineQuery->where('examination_id', $request->examination_id);
            }

            $students = $query->get();
            $examRoutine = $examRoutineQuery->get();

            return view('Backend.school_management.admit_card.admit_all', compact('students', 'examination','examRoutine'));
        }
    }

   
}
