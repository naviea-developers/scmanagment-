<?php

namespace App\Http\Controllers\Backend\Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Course;
use App\Models\CourseLanguage;
use App\Models\CourseRequisite;
use App\Models\CourseLearn;
use App\Models\CourseCareerOutcome;
use App\Models\CourseSkill;
use App\Models\CourseConten;
use App\Models\CourseLesson;
use App\Models\CourseLessonVideo;
use App\Models\Category;
use App\Models\CourseResourceFile;
use App\Models\CourseLessonFile;
use App\Models\CourseQuizFile;
use App\Models\CoursezprojectFile;
use App\Models\RelatedCourse;

use App\Models\Department;
use App\Models\University;
use App\Models\User;
use App\Models\Degree;
use App\Models\Section;

use App\Models\Semester;
use App\Models\SemesterDetails;
use Illuminate\Support\Facades\DB;

class UniversityCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['courses'] = Course::where('type','university')->orderBy('id','desc')->get();
        return view("Backend.courses.u_course.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data["master_categories"] = Category::where('parent_id', '=' ,0)->where('type','master_course')->get();
        // $data['teachers'] = User::where('type','2')->where('status','1')->orderBy('id', 'desc')->get();
        $data["categorys"] = Category::where('parent_id', '=' ,0)->where('type','home')->get();
        // $data["sub_categories"] = Category::where('parent_id', '!=' ,0)->where('type','home')->where('is_sub',0)->orderBy('id', 'desc')->get();
        $data['languages'] = CourseLanguage::orderBy('id', 'desc')->where('type','university')->where('status',1)->get();
        $data['courses'] = Course::where('is_master', 0)->where('type','university')->orderBy('id','desc')->get();
        $data['departments'] = Department::orderBy('id', 'desc')->get();
        $data['universities'] = University::orderBy('id', 'desc')->get();
        $data['sections'] = Section::orderBy('id', 'desc')->get();
 
      
        return view("Backend.courses.u_course.create",$data);
    }


    //ajax getDegree
    public function getDegree($id){
        if($id == 0){
            return [];
        }
    $degree = Degree::where("department_id",$id)->get();
    return $degree;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
         $request->validate([
             'course_name' => 'required',
            //  'organization_name' => 'required',
        ]);

        try{
            DB::beginTransaction();

        $course = New Course();
        // $car->slug = SlugService::createSlug(Car::class, 'slug', $request->name);
        $course->category_id = $request->category_id;
        $course->sub_category_id = $request->sub_category_id ?? 0;
        $course->child_category_id = $request->child_category_id ?? 0;
        $course->pro_child_category_id = $request->pro_child_category_id ?? 0;

        $course->type = 'university';
        $course->department_id = $request->department_id ?? "";
        $course->degree_id = $request->degree_id;
        $course->university_id = $request->university_id ?? "";
        $course->language_id = $request->language_id ?? 0;
        $course->section_id = $request->section_id ?? 0;

        $course->name = $request->course_name ?? "";
        $course->tuition_fee = $request->tuition_fee;
        $course->semester_fee = $request->semester_fee;
        $course->year_fee = $request->year_fee;
        $course->discount =  $request->discount;
        $course->discounttype =  $request->discount_type;

        $course->organization_name =  $request->organization_name;
        $course->coursetype = $request->course_type;

        $course->course_duration = $request->course_duration;
        $course->next_start_date = $request->next_start_date;
        $course->application_deadline = $request->application_deadline;

        $course->admission_process = $request->admission_process ?? "";
        $course->accommodation = $request->accommodation ?? "";
        $course->about = $request->about ?? "";
        $course->introduction = $request->introduction ?? "";
        $course->trailer_video_url = $request->trailer_video_url ?? "";
        $course->consultancy_fee = $request->consultancy_fee ?? "";
        $course->save();


    // if($request->language){
    //     foreach( $request->language as $value){
    //         $courselanguage = new CourseLanguage();
    //         $courselanguage->course_id = $course->id;
    //         $courselanguage->name = $value;
    //         $courselanguage->type = 'course';
    //         $courselanguage->save();
    //     }
    // }


    if($request->relatedcourse_id){
        foreach( $request->relatedcourse_id as $value){
            $relatedcourse = new RelatedCourse();
            $relatedcourse->course_id = $course->id;
            $relatedcourse->relatedcourse_id = $value;
            $relatedcourse->save();
        }
    }

    // dd($request->semester_name);
    //   Topics for this course Start
    if(isset($request->semester_name) && count($request->semester_name) > 0 && $request->semester_name != null){
        foreach($request->semester_name as $k=>$value){
            if($value != null && $value != ""){
                $semester= New Semester;
                $semester->course_id=$course->id;
                $semester->semester_name = $value;
                $semester->duration = $request->duration[$k];
                $semester->save();

                foreach($request->subject_name[$k] as $j=>$value){
                    $semesterdetails= New SemesterDetails;
                    $semesterdetails->semester_id=$semester->id;
                    //  $courselessonvideo->lesson_video="https://" . preg_replace('#^https?://#', '',$request->lesson_videos[$k][$j]);
                    $semesterdetails->subject_name=$request->subject_name[$k][$j];
                    $semesterdetails->credit=$request->credit[$k][$j];
                    $semesterdetails->save();
                }

            }
        }
    }
        // Topics for this course End

         //Course resource file Start
         if(isset($request->resourcefile) && count($request->resourcefile) > 0 && $request->resourcefile != null){
        //  if($request->resourcefile){
            foreach($request->file('resourcefile') as $k=>$value){
                // if($value != null && $value != ""){
                    $courseresourcefile= New CourseResourceFile;
                    $courseresourcefile->course_id=$course->id;
                    $filename=time().$k.'resourcefile'.'.'.$value->getClientOriginalName();
                    $value->move(public_path('upload/course/file/'), $filename);
                    $courseresourcefile->name=$filename;
                    
                    $courseresourcefile->save();
                // }
            }
        }
        //Course resource file End

        //CourseRequisite Start
        if(isset($request->requisites) && count($request->requisites) > 0 && $request->requisites != null){
        // if($request->requisites){
            foreach( $request->requisites as $value){
                if($value != null && $value != ""){
                    $courserequisite = new CourseRequisite();
                    $courserequisite->course_id = $course->id;
                    $courserequisite->name = $value;
                    $courserequisite->save();
                }
            }
        }
        //CourseRequisite End

        //CourseLearn Start
        if(isset($request->course_learn) && count($request->course_learn) > 0 && $request->semester_name != null){
        // if($request->course_learn){
            foreach( $request->course_learn as $value){
                if($value != null && $value != ""){
                    $courselearn = new CourseLearn();
                    $courselearn->course_id = $course->id;
                    $courselearn->name = $value;
                    $courselearn->save();
                }
            }
        }
        //CourseLearn End

          //CourseCareerOutcome Start
          if(isset($request->course_outcome) && count($request->course_outcome) > 0 && $request->semester_name != null){
        //   if($request->course_outcome){
            foreach( $request->course_outcome as $value){
                if($value != null && $value != ""){
                    $course_outcome = new CourseCareerOutcome();
                    $course_outcome->course_id = $course->id;
                    $course_outcome->name = $value;
                    $course_outcome->save();
                }
            }
         }
        //CourseCareerOutcome End

        //CourseSkill Start
        if(isset($request->course_skill) && count($request->course_skill) > 0 && $request->semester_name != null){
        // if($request->course_skill){
            foreach( $request->course_skill as $value){
                if($value != null && $value != ""){
                    $course_skill = new CourseSkill();
                    $course_skill->course_id = $course->id;
                    $course_skill->name = $value;
                    $course_skill->save();
                }
            }
        }
        //CourseSkill End

         //CourseConten Start
         //dd($request->conten_name);
         if(isset($request->conten_name) && count($request->conten_name) > 0 && $request->semester_name != null){
        //  if($request->conten_name){
            foreach( $request->conten_name as $k=>$value){
                if($value != null && $value != ""){
                    $courseconten = new CourseConten();
                    $courseconten->course_id = $course->id;
                    $courseconten->name = $value;
                    $courseconten->conten_url = $request->conten_url[$k];
                    $courseconten->save();
                }
            }
        }


        DB::commit();
        return redirect()->route('admin.u_course.index')->with('message','University Program  Create Successfully');
         }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       // dd('hi');
        $data['course']=$course=Course::find($id);
        $data["categories"] = Category::where('parent_id',0)->where('type','home')->get();
        $data["sub_categories"] = Category::where('parent_id',$course->category_id)->orderBy('id', 'desc')->get();
        $data["child_categories"] = Category::where('parent_id',$course->sub_category_id)->orderBy('id', 'desc')->get();
        $data["pro_child_categories"] = Category::where('parent_id',$course->child_category_id)->orderBy('id', 'desc')->get();
        $data['languages'] = CourseLanguage::orderBy('id', 'desc')->where('type','university')->where('status',1)->get();

        $data['courses'] = Course::where('is_master', 0)->where('type','university')->orderBy('id','desc')->get();
        $data['departments'] = Department::orderBy('id', 'desc')->get();
        $data['universities'] = University::orderBy('id', 'desc')->get();
        $data['degrees'] = Degree::orderBy('id', 'desc')->get();
        $data['sections'] = Section::orderBy('id', 'desc')->get();
        return view("Backend.courses.u_course.update", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $request->validate([
            // 'name' => 'required',
            // 'teacher_id' => 'required',
        ]);

        try{
            DB::beginTransaction();

        $course = Course::find($id);
        $course->category_id = $request->category_id;
        $course->sub_category_id = $request->sub_category_id ?? 0;
        $course->child_category_id = $request->child_category_id ?? 0;
        $course->pro_child_category_id = $request->pro_child_category_id ?? 0;

        $course->type = 'university';
        $course->department_id = $request->department_id ?? "";
        $course->degree_id = $request->degree_id;
        $course->university_id = $request->university_id ?? "";
        $course->language_id = $request->language_id ?? 0;
        $course->section_id = $request->section_id ?? 0;

        $course->name = $request->course_name ?? "";
        $course->tuition_fee = $request->tuition_fee;
        $course->semester_fee = $request->semester_fee;
        $course->year_fee = $request->year_fee;
        $course->discount =  $request->discount;
        $course->discounttype =  $request->discount_type;

        $course->organization_name =  $request->organization_name;
        $course->coursetype = $request->course_type;

        $course->course_duration = $request->course_duration;
        $course->next_start_date = $request->next_start_date;
        $course->application_deadline = $request->application_deadline;

        $course->admission_process = $request->admission_process ?? "";
        $course->accommodation = $request->accommodation ?? "";
        $course->about = $request->about ?? "";
        $course->introduction = $request->introduction ?? "";
        $course->trailer_video_url = $request->trailer_video_url ?? "";
        $course->consultancy_fee = $request->consultancy_fee ?? "";
        $course->save();

    RelatedCourse::where('course_id',$id)->get()->each->delete();
    // dd($request->type_age);
    if($request->relatedcourse_id){
        foreach( $request->relatedcourse_id as $value){
            $relatedcourse = new RelatedCourse();
            $relatedcourse->course_id = $course->id;
            $relatedcourse->relatedcourse_id = $value;
            $relatedcourse->save();
        }
    }


    // CourseLanguage::where('course_id',$id)->get()->each->delete();

    // if($request->language){
    //     foreach( $request->language as $value){
    //         $courselanguage = new CourseLanguage();
    //         $courselanguage->course_id = $course->id;
    //         $courselanguage->name = $value;
    //         $courselanguage->type = 'course';
    //         $courselanguage->save();
    //     }
    // }
    
     // Topics for this course Start
     if(isset($request->semester_name) && count($request->semester_name) > 0 && $request->semester_name != null){
        foreach($request->semester_name as $k=>$value){
            if($value != null && $value != ""){
                $semester= New Semester;
                $semester->course_id=$course->id;
                $semester->semester_name = $value;
                $semester->duration = $request->duration[$k];
                $semester->save();

                foreach($request->subject_name[$k] as $j=>$value){
                    $semesterdetails= New SemesterDetails;
                    $semesterdetails->semester_id=$semester->id;
                    //  $courselessonvideo->lesson_video="https://" . preg_replace('#^https?://#', '',$request->lesson_videos[$k][$j]);
                    $semesterdetails->subject_name=$request->subject_name[$k][$j];
                    $semesterdetails->credit=$request->credit[$k][$j];
                    $semesterdetails->save();
                }
            }
        }
    }

    //Topics for this course End
    if(isset($request->old_semester_name) && count($request->old_semester_name) > 0 && $request->old_semester_name != null){
        foreach($request->old_semester_name as $k=>$value){
            if($value != null && $value != ""){
                $semester=Semester::find($k);
                $semester->course_id=$course->id;
                $semester->semester_name = $value;
                $semester->duration = $request->old_duration[$k];
                $semester->save();

                foreach($request->old_subject_name[$k] as $j=>$value){
                    $semesterdetails= SemesterDetails::find($j);
                    $semesterdetails->semester_id=$semester->id;
                    //  $courselessonvideo->lesson_video="https://" . preg_replace('#^https?://#', '',$request->lesson_videos[$k][$j]);
                    $semesterdetails->subject_name=$request->old_subject_name[$k][$j];
                    $semesterdetails->credit=$request->old_credit[$k][$j];
                    $semesterdetails->save();
                }

                if(isset($request->subject_name[$k])){
                    foreach($request->subject_name[$k] as $j=>$value){
                        $semesterdetails= New SemesterDetails;
                        $semesterdetails->semester_id=$semester->id;
                        //  $courselessonvideo->lesson_video="https://" . preg_replace('#^https?://#', '',$request->lesson_videos[$k][$j]);
                        $semesterdetails->subject_name=$request->subject_name[$k][$j];
                        $semesterdetails->credit=$request->credit[$k][$j];
                        $semesterdetails->save();
                    }
                }
            }
        }
    }

      //dd($request->all());
      if($request->delete_courselessonvideo){
        foreach($request->delete_courselessonvideo as $value){
            $courselessonvideo= SemesterDetails::find($value);
            $courselessonvideo->delete();
        }
      }

    if($request->delete_semester){
        foreach($request->delete_semester as $val){
            $semester= Semester::find($val);

            foreach($semester->semesterdetailss as $semesterdetails){
                $semesterdetails->delete();
            }
            $semester->delete();
        }
    }

    //Topics for this course End

      //Course resource file Start
      if(isset($request->resourcefile) && count($request->resourcefile) > 0 && $request->resourcefile != null){
    //   if($request->resourcefile){
      foreach($request->file('resourcefile') as $k=>$value){
            if($value != null && $value != ""){
                $courseresourcefile= New CourseResourceFile;
                $courseresourcefile->course_id=$course->id;
                $filename=time().$k.'resourcefile'.'.'.$value->getClientOriginalName();
                $value->move(public_path('upload/course/file/'), $filename);
                $courseresourcefile->name=$filename;
                $courseresourcefile->save();
            }
        }
    }

    if(isset($request->old_resourcefile) && count($request->old_resourcefile) > 0 && $request->old_resourcefile != null){
    // if($request->old_resourcefile){
        foreach($request->file('old_resourcefile') as $k=>$value){
            if($value != null && $value != ""){
                $courseresourcefile=CourseResourceFile::find($k);
                @unlink(public_path('upload/course/file/'.$courseresourcefile->name));
                $courseresourcefile->course_id=$course->id;
                $filename=time().$k.'resourcefile'.'.'.$value->getClientOriginalName();
                $value->move(public_path('upload/course/file/'), $filename);
                $courseresourcefile->name=$filename;
                $courseresourcefile->save();
                }
            }
      }

    if($request->delete_resourcefile){
        foreach($request->delete_resourcefile as $k => $value){
            $courseresourcefile = CourseResourceFile::find($value);
            @unlink(public_path('upload/course/file/'.$courseresourcefile->name));
            $courseresourcefile->delete();

        }
    }
    //Course resource file End

        //CourseRequisite Start
        if(isset($request->requisites) && count($request->requisites) > 0 && $request->requisites != null){
        // if($request->requisites){
            foreach( $request->requisites as $value){
                if($value != null && $value != ""){
                    $courserequisite = new CourseRequisite();
                    $courserequisite->course_id = $course->id;
                    $courserequisite->name = $value;
                    $courserequisite->save();
                }
            }
        }

        if(isset($request->old_requisites) && count($request->old_requisites) > 0 && $request->old_requisites != null){
        // if($request->old_requisites){
            foreach($request->old_requisites as $k=> $value){
                if($value != null && $value != ""){
                    $courserequisite = CourseRequisite::find($k);
                    $courserequisite->course_id = $course->id;
                    $courserequisite->name = $value;
                    $courserequisite->save();
                }
            }
        }

        if($request->delete_courserequisite){
            foreach($request->delete_courserequisite as $k => $value){
                $courserequisite = CourseRequisite::find($value);
                $courserequisite->delete();

            }
        }

         //CourseRequisite End

        //CourseLearn Start
        if(isset($request->course_learn) && count($request->course_learn) > 0 && $request->course_learn != null){
        // if($request->course_learn){
            foreach( $request->course_learn as $value){
                if($value != null && $value != ""){
                    $courselearn = new CourseLearn();
                    $courselearn->course_id = $course->id;
                    $courselearn->name = $value;
                    $courselearn->save();
                }
            }
        }

        if(isset($request->old_course_learn) && count($request->old_course_learn) > 0 && $request->old_course_learn != null){
        // if($request->old_course_learn){
            foreach($request->old_course_learn as $k=> $value){
                if($value != null && $value != ""){
                    $courselearn = CourseLearn::find($k);
                    $courselearn->course_id = $course->id;
                    $courselearn->name = $value;
                    $courselearn->save();
                }
            }
        }

        if($request->delete_learn){
            foreach($request->delete_learn as $k => $value){
                $courselearn = CourseLearn::find($value);
                $courselearn->delete();

            }
        }
       //CourseRequisite End


          //CourseCareerOutcome
          if(isset($request->course_outcome) && count($request->course_outcome) > 0 && $request->course_outcome != null){
        //   if($request->course_outcome){
            foreach( $request->course_outcome as $value){
                if($value != null && $value != ""){
                    $course_outcome = new CourseCareerOutcome();
                    $course_outcome->course_id = $course->id;
                    $course_outcome->name = $value;
                    $course_outcome->save();
                }
            }
        }

        if(isset($request->old_course_outcome) && count($request->old_course_outcome) > 0 && $request->old_course_outcome != null){
        // if($request->old_course_outcome){
            foreach($request->old_course_outcome as $k=> $value){
                if($value != null && $value != ""){
                    $course_outcome = CourseCareerOutcome::find($k);
                    $course_outcome->course_id = $course->id;
                    $course_outcome->name = $value;
                    $course_outcome->save();
                }
            }
        }

        if($request->delete_outcome){
            foreach($request->delete_outcome as $k => $value){
                $course_outcome = CourseCareerOutcome::find($value);
                $course_outcome->delete();

            }
        }
        //CourseCareerOutcome End


        //CourseSkill Start
        if(isset($request->course_skill) && count($request->course_skill) > 0 && $request->course_skill != null){
        // if($request->course_skill){
            foreach( $request->course_skill as $value){
                if($value != null && $value != ""){
                    $course_skill = new CourseSkill();
                    $course_skill->course_id = $course->id;
                    $course_skill->name = $value;
                    $course_skill->save();
                }
            }
        }

        if(isset($request->old_course_skill) && count($request->old_course_skill) > 0 && $request->old_course_skill != null){
        // if($request->old_course_skill){
            foreach($request->old_course_skill as $k=> $value){
                if($value != null && $value != ""){
                    $course_skill = CourseSkill::find($k);
                    $course_skill->course_id = $course->id;
                    $course_skill->name = $value;
                    $course_skill->save();
                }
            }
        }

        if($request->delete_skill){
            foreach($request->delete_skill as $k => $value){
                $course_skill = CourseSkill::find($value);
                $course_skill->delete();

            }
        }

        //CourseSkill End

        DB::commit();
        return redirect()->route('admin.u_course.index')->with('message','University Program Update Successfully');
         }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //dd($request->all());
        $course = Course::find($request->ucourse_id);
          @unlink(public_path('upload/course/'.$course->image));

        foreach($course->courserequisites as $courserequisite){
            $courserequisite->delete();
        }

        foreach($course->courselearns as $courselearn){
            $courselearn->delete();
        }

        foreach($course->courselanguages as $item){
            $item->delete();
        }

        foreach($course->coursecareeroutcomes as $coursecareeroutcome){
            $coursecareeroutcome->delete();
        }

        foreach($course->courseskills as $courseskill){
            $courseskill->delete();
        }
        foreach($course->course_content as $item){
            $item->delete();
        }

        foreach($course->courselessonfiles as $courselessonfile){
            @unlink(public_path('upload/course/file/'.$courselessonfile->name));
            $courselessonfile->delete();
        }

        foreach($course->courseresourcefiles as $courseresourcefile){
            @unlink(public_path('upload/course/file/'.$courseresourcefile->name));
            $courseresourcefile->delete();
        }


        foreach($course->relatedcourses as $relatedcourse){
            $relatedcourse->delete();
        }

        foreach($course->courselessons as $courselesson){
            foreach($courselesson->courselessonvideos as $courselessonvideo){
                @unlink(public_path('upload/coursevideo/'.$courselessonvideo->lesson_video));
                $courselessonvideo->delete();
            }
            $courselesson->delete();
        }


        foreach($course->semesters as $semester){
            foreach($semester->semesterdetailss as $semesterdetails){
                $semesterdetails->delete();
            }
            $semester->delete();
        }

        // foreach($course->capterquestions as $capterquestion){
        //     foreach($capterquestion->questions as $question){
        //         $question->delete();
        //     }
        //     $capterquestion->delete();
        // }


        $course->delete();
        return back()->with('message','University Program Deleted Successfully');
    }


    ///add new tag
    public function addSelect2Language(Request $request){
        // return $request->all();
         if($request->type == "course"){
             $tag = new CourseLanguage();
             $tag->name = $request->val;
             $tag->type = 'course';
             $tag->save();
             return response()->json(['status'=>'ok','res_data'=>$tag]);
         }

     }

     public function status($id)
     {
         $course = Course::find($id);
         if($course->status == 0)
         {
             $course->status = 1;
         }elseif($course->status == 1)
         {
             $course->status = 0;
         }
         $course->update();
         return redirect()->back()->with('message', 'Status Update Successfully. Thank you.');
     }

    // public function addSelect2(Request $request){
    //     // return $request->all();
    //      if($request->type == "brand"){
    //          $generic = new Brand();
    //          $generic->name = $request->val;
    //          $generic->type = 6;
    //          $generic->save();
    //          return response()->json(['status'=>'ok','res_data'=>$generic]);
    //      }else if($request->type == "color"){
    //          $generic = new Color();
    //          $generic->name = $request->val;
    //          $generic->type = 6;
    //          $generic->save();
    //          return response()->json(['status'=>'ok','res_data'=>$generic]);
    //      }
    //      else if($request->type == "model"){
    //          $brand = new Modeles();
    //          $brand->name = $request->val;
    //          $brand->type = 6;
    //          $brand->save();
    //          return response()->json(['status'=>'ok','res_data'=>$brand]);
    //      }

    //  }
}
