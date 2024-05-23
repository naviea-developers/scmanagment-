<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseCareerOutcome;
use App\Models\CourseConten;
use App\Models\CourseLanguage;
use App\Models\CourseLearn;
use App\Models\CourseLesson;
use App\Models\CourseLessonFile;
use App\Models\CourseLessonVideo;
use App\Models\CourseQuizFile;
use App\Models\CourseRequisite;
use App\Models\CourseResourceFile;
use App\Models\CourseSave;
use App\Models\CourseSkill;
use App\Models\CoursezprojectFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RelatedCourse;
use App\Models\HomeWork;
use App\Models\Classe;
use App\Models\Subject;
use App\Models\Examination;
use App\Models\ClassTestExam;
use App\Models\ExamClass;
use App\Models\ExamResult;
use App\Models\Session;
use App\Models\Student;
use App\Models\SubjectTeacherAssent;

class InstructorCourseController extends Controller
{
    public function manageCourse()
    {
        $data['courses'] = Course::where('teacher_id', auth()->user()->id)->orderBy('id','desc')->get();
        return view('user.instructor.course_index', $data);
    }
    public function addCourse()
    {
        $data["master_categories"] = Category::where('parent_id', '=' ,0)->where('type','master_course')->get();
        // $data['teachers'] = User::where('type','2')->orderBy('id', 'desc')->get();
        $data["categorys"] = Category::where('parent_id', '=' ,0)->where('type','home')->get();
        $data["sub_categories"] = Category::where('parent_id', '!=' ,0)->where('type','home')->where('is_sub',0)->orderBy('id', 'desc')->get();
        $data['languages'] = CourseLanguage::orderBy('id', 'desc')->where('status',1)->get();
        $data['courses'] = Course::where('teacher_id',auth()->user()->id )->where('is_master', 0)->orderBy('id','desc')->get();
        //dd('hi');
        return view('user.instructor.course_create', $data);
    }
    
    public function storCourse(Request $request)
    {
        try{
            DB::beginTransaction();

            $course = New Course();
            // $car->slug = SlugService::createSlug(Car::class, 'slug', $request->name);
            if($request->general_category_id){
                $course->category_id = $request->general_category_id;
            }
            if($request->master_category_id){
                $course->category_id = $request->master_category_id;
            }
            $course->sub_category_id = $request->general_sub_category_id ?? 0;
            $course->teacher_id = auth()->user()->id ?? 0;
            $course->name = $request->name ?? "";
            // $course->subject = $request->subject ?? "";
            // $course->pre_fee = $request->discount;
            $course->fee = $request->fee;
            $course->discount =  $request->discount;
            $course->discounttype =  $request->discounttype;
            $course->organization_name =  $request->organization_name;
            $course->course_hours =  $request->course_hours;
            $course->course_level = $request->course_level ?? "";
            $course->coursetype = $request->coursetype;
            $course->trailer_video_url = $request->trailer_video_url ?? "";
            $course->is_master = $request->is_master;
    
            $course->about = $request->about ?? "";
            $course->save();
    
    
        if($request->language){
            foreach( $request->language as $value){
                $courselanguage = new CourseLanguage();
                $courselanguage->course_id = $course->id;
                $courselanguage->name = $value;
                $courselanguage->type = 'course';
                $courselanguage->save();
            }
        }
    
    
        if($request->relatedcourse_id){
            foreach( $request->relatedcourse_id as $value){
                $relatedcourse = new RelatedCourse();
                $relatedcourse->course_id = $course->id;
                $relatedcourse->relatedcourse_id = $value;
                $relatedcourse->save();
            }
        }
    
    
           //   Topics for this course Start
           if($request->capter_name){
    
            foreach($request->capter_name as $k=>$value){
                $courselesson= New CourseLesson;
                $courselesson->course_id=$course->id;
                $courselesson->capter_name = $value;
                $courselesson->save();
    
                foreach($request->lesson_names[$k] as $j=>$value){
                    $courselessonvideo= New CourseLessonVideo;
                    $courselessonvideo->course_lesson_id=$courselesson->id;
                     $courselessonvideo->lesson_video="https://" . preg_replace('#^https?://#', '',$request->lesson_videos[$k][$j]);
                     $courselessonvideo->lesson_name=$request->lesson_names[$k][$j];
                     $courselessonvideo->video_time=$request->video_time[$k][$j];
                    $courselessonvideo->save();
                   }
    
            }
        }
        // Topics for this course End
    
             //Course resource file Start
             if($request->resourcefile){
             foreach($request->file('resourcefile') as $k=>$value){
                $courseresourcefile= New CourseResourceFile;
                $courseresourcefile->course_id=$course->id;
    
                $filename=time().$k.'resourcefile'.'.'.$value->getClientOriginalName();
                $value->move(public_path('upload/course/file/'), $filename);
                 $courseresourcefile->name=$filename;
                 
                $courseresourcefile->save();
               }
            }
            //Course resource file End
    
             //Course lesson file Start
             if($request->lessonfile){
                foreach($request->file('lessonfile') as $k=>$value){
                   $courselessonfile= New CourseLessonFile;
                   $courselessonfile->course_id=$course->id;
                   $filename=time().$k.'lessonfile'.'.'.$value->getClientOriginalName();
                   $value->move(public_path('upload/course/file/'), $filename);
                    $courselessonfile->name=$filename;
                   $courselessonfile->save();
                  }
               }
            //Course lesson file End
    
             //Course Quiz file Start
             if($request->quizfile){
                foreach($request->file('quizfile') as $k=>$value){
                   $coursequizfile= New CourseQuizFile;
                   $coursequizfile->course_id=$course->id;
                   $filename=time().$k.'quizfile'.'.'.$value->getClientOriginalName();
                   $value->move(public_path('upload/course/file/'), $filename);
                    $coursequizfile->name=$filename;
                   $coursequizfile->save();
                  }
               }
            //Course Quiz file End
    
             //Course projectfile file Start
             if($request->projectfile){
                foreach($request->file('projectfile') as $k=>$value){
                   $courseprojectfile= New CoursezprojectFile;
                   $courseprojectfile->course_id=$course->id;
                   $filename=time().$k.'projectfile'.'.'.$value->getClientOriginalName();
                   $value->move(public_path('upload/course/file/'), $filename);
                    $courseprojectfile->name=$filename;
                   $courseprojectfile->save();
                  }
               }
            //Course projectfile file End
    
            //CourseRequisite Start
            if($request->requisites){
                foreach( $request->requisites as $value){
                    $courserequisite = new CourseRequisite();
                    $courserequisite->course_id = $course->id;
                    $courserequisite->name = $value;
                    $courserequisite->save();
                }
            }
            //CourseRequisite End
    
            //CourseLearn Start
            if($request->course_learn){
                foreach( $request->course_learn as $value){
                    $courselearn = new CourseLearn();
                    $courselearn->course_id = $course->id;
                    $courselearn->name = $value;
                    $courselearn->save();
                }
            }
            //CourseLearn End
    
              //CourseCareerOutcome Start
              if($request->course_outcome){
                foreach( $request->course_outcome as $value){
                    $course_outcome = new CourseCareerOutcome();
                    $course_outcome->course_id = $course->id;
                    $course_outcome->name = $value;
                    $course_outcome->save();
                }
             }
            //CourseCareerOutcome End
    
            //CourseSkill Start
            if($request->course_skill){
                foreach( $request->course_skill as $value){
                    $course_skill = new CourseSkill();
                    $course_skill->course_id = $course->id;
                    $course_skill->name = $value;
                    $course_skill->save();
                }
            }
            //CourseSkill End
    
             //CourseConten Start
             //dd($request->conten_name);
             if($request->conten_name){
                foreach( $request->conten_name as $k=>$value){
                    $courseconten = new CourseConten();
                    $courseconten->course_id = $course->id;
                    $courseconten->name = $value;
                    $courseconten->conten_url = $request->conten_url[$k];
                    $courseconten->save();
                }
            }

        DB::commit();
        return redirect()->route('instructor.manage_course')->with('message','Course Create Successfully');
         }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }
    public function editCourse($id)
    {   $data['course']=Course::find($id);
        $data["master_categories"] = Category::where('parent_id', '=' ,0)->where('type','master_course')->get();
        // $data['teachers'] = User::where('type','2')->orderBy('id', 'desc')->get();
        $data["categories"] = Category::where('parent_id',0)->where('type','home')->get();
        $data["sub_categories"] = Category::where('parent_id', '!=' ,0)->where('type','home')->where('is_sub',0)->orderBy('id', 'desc')->get();
        $data['languages'] = CourseLanguage::orderBy('id', 'desc')->where('status',1)->get();
        $data['courses'] = Course::where('teacher_id',auth()->user()->id )->where('is_master', 0)->orderBy('id','desc')->get();
        return view('user.instructor.course_update', $data);
    }
    public function updateCourse(Request $request, $id)
    {
        try{
            DB::beginTransaction();

            $course = Course::find($id);
            // $car->slug = SlugService::createSlug(Car::class, 'slug', $request->name);
            // $course->category_id = $request->category_id ?? 0;
            if($request->general_category_id){
                $course->category_id = $request->general_category_id;
            }
            if($request->master_category_id){
                $course->category_id = $request->master_category_id;
            }
    
            $course->sub_category_id = $request->general_sub_category_id ?? 0;
            // $course->sub_category_id = $request->sub_category_id ?? 0;
            $course->teacher_id = auth()->user()->id ?? 0;
            $course->name = $request->name ?? "";
            // $course->subject = $request->subject ?? "";
            // $course->pre_fee = $request->pre_fee;
            $course->fee = $request->fee;
            $course->discount =  $request->discount;
            $course->discounttype =  $request->discounttype;
            $course->organization_name =  $request->organization_name;
            $course->course_level = $request->course_level ?? "";
            $course->coursetype = $request->coursetype;
            $course->course_hours =  $request->course_hours;
            $course->trailer_video_url = $request->trailer_video_url ?? "";
            $course->is_master = $request->is_master;
            $course->about = $request->about ?? "";
    
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
    
    
        CourseLanguage::where('course_id',$id)->get()->each->delete();
    
        if($request->language){
            foreach( $request->language as $value){
                $courselanguage = new CourseLanguage();
                $courselanguage->course_id = $course->id;
                $courselanguage->name = $value;
                $courselanguage->type = 'course';
                $courselanguage->save();
            }
        }
    
         // Topics for this course Start
         if($request->capter_name){
            foreach($request->capter_name as $k=>$value){
                $courselesson= New CourseLesson;
                $courselesson->course_id=$course->id;
                $courselesson->capter_name = $value;
                $courselesson->save();
    
                foreach($request->lesson_names[$k] as $j=>$value){
                    $courselessonvideo= New CourseLessonVideo;
                    $courselessonvideo->course_lesson_id=$courselesson->id;
                     $courselessonvideo->lesson_video="https://" . preg_replace('#^https?://#', '',$request->lesson_videos[$k][$j]);
                     $courselessonvideo->lesson_name=$request->lesson_names[$k][$j];
                     $courselessonvideo->video_time=$request->video_time[$k][$j];
                    $courselessonvideo->save();
                   }
            }
        }
    
        //Topics for this course End
        if($request->old_capter_name){
    
            foreach($request->old_capter_name as $k=>$value){
                $courselesson=CourseLesson::find($k);
                $courselesson->course_id=$course->id;
                $courselesson->capter_name = $value;
                $courselesson->save();
    
               foreach($request->old_lesson_names[$k] as $j=>$value){
                $courselessonvideo= CourseLessonVideo::find($j);
                $courselessonvideo->course_lesson_id=$courselesson->id;
                $courselessonvideo->lesson_video="https://" . preg_replace('#^https?://#', '',$request->old_lesson_videos[$k][$j]);
                $courselessonvideo->lesson_name=$request->old_lesson_names[$k][$j];
                $courselessonvideo->video_time=$request->old_video_time[$k][$j];
                $courselessonvideo->save();
               }
    
               if(isset($request->lesson_names[$k])){
               foreach($request->lesson_names[$k] as $j=>$value){
                $courselessonvideo= New CourseLessonVideo;
                $courselessonvideo->course_lesson_id=$courselesson->id;
                 $courselessonvideo->lesson_video="https://" . preg_replace('#^https?://#', '',$request->lesson_videos[$k][$j]);
                 $courselessonvideo->lesson_name=$request->lesson_names[$k][$j];
                 $courselessonvideo->video_time=$request->video_time[$k][$j];
                $courselessonvideo->save();
               }
            }
    
            }
        }
    
          //dd($request->all());
          if($request->delete_courselessonvideo){
            foreach($request->delete_courselessonvideo as $value){
                $courselessonvideo= CourseLessonVideo::find($value);
                $courselessonvideo->delete();
            }
          }
    
        if($request->delete_courselesson){
            foreach($request->delete_courselesson as $val){
                $courselesson= CourseLesson::find($val);
    
                foreach($courselesson->courselessonvideos as $courselessonvideo){
                    @unlink(public_path('upload/coursevideo/'.$courselessonvideo->lesson_video));
                    $courselessonvideo->delete();
                }
                $courselesson->delete();
            }
        }
    
        //Topics for this course End
    
          //Course resource file Start
          if($request->resourcefile){
          foreach($request->file('resourcefile') as $k=>$value){
            $courseresourcefile= New CourseResourceFile;
            $courseresourcefile->course_id=$course->id;
            $filename=time().$k.'resourcefile'.'.'.$value->getClientOriginalName();
            $value->move(public_path('upload/course/file/'), $filename);
             $courseresourcefile->name=$filename;
            $courseresourcefile->save();
           }
        }
    
        if($request->old_resourcefile){
            foreach($request->file('old_resourcefile') as $k=>$value){
              $courseresourcefile=CourseResourceFile::find($k);
              @unlink(public_path('upload/course/file/'.$courseresourcefile->name));
              $courseresourcefile->course_id=$course->id;
              $filename=time().$k.'resourcefile'.'.'.$value->getClientOriginalName();
              $value->move(public_path('upload/course/file/'), $filename);
               $courseresourcefile->name=$filename;
              $courseresourcefile->save();
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
    
            //Course lesson file Start
            if($request->lessonfile){
                foreach($request->file('lessonfile') as $k=>$value){
                   $courselessonfile= New CourseLessonFile;
                   $courselessonfile->course_id=$course->id;
                   $filename=time().$k.'lessonfile'.'.'.$value->getClientOriginalName();
                   $value->move(public_path('upload/course/file/'), $filename);
                    $courselessonfile->name=$filename;
                   $courselessonfile->save();
                  }
               }
    
            if($request->old_lessonfile){
                foreach($request->file('old_lessonfile') as $k=>$value){
                   $courselessonfile=CourseLessonFile::find($k);
                   @unlink(public_path('upload/course/file/'.$courselessonfile->name));
                   $courselessonfile->course_id=$course->id;
                   $filename=time().$k.'lessonfile'.'.'.$value->getClientOriginalName();
                   $value->move(public_path('upload/course/file/'), $filename);
                    $courselessonfile->name=$filename;
                   $courselessonfile->save();
                  }
               }
    
    
            if($request->delete_lessonfile){
                foreach($request->delete_lessonfile as $k => $value){
                    $courselessonfile = CourseLessonFile::find($value);
                    @unlink(public_path('upload/course/file/'.$courselessonfile->name));
                    $courselessonfile->delete();
    
                }
            }
            //Course lesson file End
    
            //Course Quiz file Start
            if($request->quizfile){
                foreach($request->file('quizfile') as $k=>$value){
                   $coursequizfile= New CourseQuizFile;
                   $coursequizfile->course_id=$course->id;
                   $filename=time().$k.'quizfile'.'.'.$value->getClientOriginalName();
                   $value->move(public_path('upload/course/file/'), $filename);
                    $coursequizfile->name=$filename;
                   $coursequizfile->save();
                  }
               }
    
            if($request->old_quizfile){
                foreach($request->file('old_quizfile') as $k=>$value){
                   $coursequizfile=CourseQuizFile::find($k);
                   @unlink(public_path('upload/course/file/'.$coursequizfile->name));
                   $coursequizfile->course_id=$course->id;
                   $filename=time().$k.'quizfile'.'.'.$value->getClientOriginalName();
                   $value->move(public_path('upload/course/file/'), $filename);
                    $coursequizfile->name=$filename;
                   $coursequizfile->save();
                  }
               }
    
            if($request->delete_quizfile){
                foreach($request->delete_quizfile as $k => $value){
                    $coursequizfile = CourseQuizFile::find($value);
                    @unlink(public_path('upload/course/file/'.$coursequizfile->name));
                    $coursequizfile->delete();
    
                }
            }
            //Course Quiz file End
    
            //Course projectfile file Start
    
            if($request->projectfile){
                foreach($request->file('projectfile') as $k=>$value){
                   $courseprojectfile= New CoursezprojectFile;
                   $courseprojectfile->course_id=$course->id;
                   $filename=time().$k.'projectfile'.'.'.$value->getClientOriginalName();
                   $value->move(public_path('upload/course/file/'), $filename);
                    $courseprojectfile->name=$filename;
                   $courseprojectfile->save();
                  }
               }
    
               if($request->old_projectfile){
                foreach($request->file('old_projectfile') as $k=>$value){
                   $courseprojectfile= CoursezprojectFile::find($k);
                   @unlink(public_path('upload/course/file/'.$courseprojectfile->name));
                   $courseprojectfile->course_id=$course->id;
                   $filename=time().$k.'projectfile'.'.'.$value->getClientOriginalName();
                   $value->move(public_path('upload/course/file/'), $filename);
                    $courseprojectfile->name=$filename;
                   $courseprojectfile->save();
                  }
               }
    
            if($request->delete_projectfile){
                foreach($request->delete_projectfile as $k => $value){
                    $courseprojectfile = CoursezprojectFile::find($value);
                    @unlink(public_path('upload/course/file/'.$courseprojectfile->name));
                    $courseprojectfile->delete();
    
                }
            }
            //Course projectfile file End
    
            //CourseRequisite Start
            if($request->requisites){
                foreach( $request->requisites as $value){
                    $courserequisite = new CourseRequisite();
                    $courserequisite->course_id = $course->id;
                    $courserequisite->name = $value;
                    $courserequisite->save();
                }
            }
    
            if($request->old_requisites){
                foreach($request->old_requisites as $k=> $value){
                    $courserequisite = CourseRequisite::find($k);
                    $courserequisite->course_id = $course->id;
                    $courserequisite->name = $value;
                    $courserequisite->save();;
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
            if($request->course_learn){
                foreach( $request->course_learn as $value){
                    $courselearn = new CourseLearn();
                    $courselearn->course_id = $course->id;
                    $courselearn->name = $value;
                    $courselearn->save();
                }
            }
    
            if($request->old_course_learn){
                foreach($request->old_course_learn as $k=> $value){
                    $courselearn = CourseLearn::find($k);
                    $courselearn->course_id = $course->id;
                    $courselearn->name = $value;
                    $courselearn->save();;
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
              if($request->course_outcome){
                foreach( $request->course_outcome as $value){
                    $course_outcome = new CourseCareerOutcome();
                    $course_outcome->course_id = $course->id;
                    $course_outcome->name = $value;
                    $course_outcome->save();
                }
            }
    
            if($request->old_course_outcome){
                foreach($request->old_course_outcome as $k=> $value){
                    $course_outcome = CourseCareerOutcome::find($k);
                    $course_outcome->course_id = $course->id;
                    $course_outcome->name = $value;
                    $course_outcome->save();;
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
            if($request->course_skill){
                foreach( $request->course_skill as $value){
                    $course_skill = new CourseSkill();
                    $course_skill->course_id = $course->id;
                    $course_skill->name = $value;
                    $course_skill->save();
                }
            }
    
            if($request->old_course_skill){
                foreach($request->old_course_skill as $k=> $value){
                    $course_skill = CourseSkill::find($k);
                    $course_skill->course_id = $course->id;
                    $course_skill->name = $value;
                    $course_skill->save();;
                }
            }
    
            if($request->delete_skill){
                foreach($request->delete_skill as $k => $value){
                    $course_skill = CourseSkill::find($value);
                    $course_skill->delete();
    
                }
            }
    
            //CourseSkill End
    
    
            //CourseConten Start
    
            if($request->conten_name){
    
                foreach( $request->conten_name as $k=>$value){
                    $courseconten = new CourseConten();
                    $courseconten->course_id = $course->id;
                    $courseconten->name = $value;
                    $courseconten->conten_url = $request->conten_url[$k];
                    $courseconten->save();
                }
            }
            if($request->old_conten_name){
                foreach($request->old_conten_name as $k => $value){
                    $courseconten = CourseConten::find($k);
                    $courseconten->course_id = $course->id;
                    $courseconten->name = $value;
                    $courseconten->conten_url = $request->old_conten_url[$k];
                    $courseconten->save();
                }
            }
    
            if($request->delete_conten){
                foreach($request->delete_conten as $key => $value){
                    $courseconten = CourseConten::find($value);
                    $courseconten->delete();
    
                }
            }
    
             //CourseConten  End

        DB::commit();
        return redirect()->route('instructor.manage_course')->with('message','Course Update Successfully');
         }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }   
    }


    public function deleteCourse(Request $request)
    {
        //dd($request->all());
        $course = Course::find($request->course_id);
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
            $item->delete();
        }

        foreach($course->courseresourcefiles as $courseresourcefile){
            @unlink(public_path('upload/course/file/'.$courseresourcefile->name));
            $item->delete();
        }

        foreach($course->coursequizfiles as $coursequizfile){
            @unlink(public_path('upload/course/file/'.$coursequizfile->name));
            $item->delete();
        }

        foreach($course->courseprojectfiles as $courseprojectfile){
            @unlink(public_path('upload/course/file/'.$courseprojectfile->name));
            $item->delete();
        }

        foreach($course->courselessons as $courselesson){

            foreach($courselesson->courselessonvideos as $courselessonvideo){
                @unlink(public_path('upload/coursevideo/'.$courselessonvideo->lesson_video));
                $courselessonvideo->delete();
            }
            $courselesson->delete();
        }


        $course->delete();
        return back()->with('message','Course Deleted Successfully');
    }

// home work start

    public function indexHomeWork()
    {
         //dd('hi');
        $data['home_works'] = HomeWork::where('teacher_id', auth()->user()->id)->orderBy('id','desc')->get();
        return view('user.instructor.home_worke_index', $data);
    }

    public function createHomeWork()
    {
        // dd('hi');
        $data['sessions']=Session::orderBy('id', 'desc')->where('status', 1)->get(); 
        $data['teacherAssents']=SubjectTeacherAssent::where('teacher_id', auth()->user()->id)->orderBy('id', 'desc')->where('status', 1)->get(); 
        $data['classs']=Classe::orderBy('id', 'desc')->where('status', 1)->get(); 
        $data['subjects']=Subject::orderBy('id', 'desc')->where('status', 1)->get();
        return view('user.instructor.home_worke_create', $data);
    }

    public function storeHomeWork(Request $request)
    {
        // dd('hi');
        $request->validate([
            'class_id' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $home_work = New HomeWork();
            $home_work->teacher_id = auth()->user()->id;
            $home_work->session_id = $request->session_id;
            $home_work->class_id = $request->class_id;
            $home_work->subject_id = $request->subject_id;
            if($request->hasFile('image')){
                $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/home_work/'),$fileName);
                $home_work->image = $fileName;
            }
            // $home_work->image = $request->image;
            $home_work->details = $request->details;
            $home_work->save();
            DB::commit();
            return redirect()->route('instructor.homework.index')->with('message','Home Work Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function editHomeWork(string $id)
    {
        // dd('hi');
        $data["home_work"]= HomeWork::find($id);
        $data['sessions']=Session::orderBy('id', 'desc')->where('status', 1)->get(); 
        $data['teacherAssents']=SubjectTeacherAssent::where('teacher_id', auth()->user()->id)->orderBy('id', 'desc')->where('status', 1)->get(); 
        $data['classs']=Classe::orderBy('id', 'desc')->where('status', 1)->get(); 
        $data['subjects']=Subject::orderBy('id', 'desc')->where('status', 1)->get();
        return view("user.instructor.home_worke_update",$data);
    }

   
    public function updateHomeWork(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $home_work = HomeWork::find($id);
            $home_work->teacher_id = auth()->user()->id;
            $home_work->class_id = $request->class_id;
            $home_work->session_id = $request->session_id;
            $home_work->subject_id = $request->subject_id;
            if($request->hasFile('image')){
                @unlink(public_path("upload/home_work/".$home_work->image));
                $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/home_work/'),$fileName);
                $home_work->image = $fileName;
            }
            $home_work->details = $request->details;
            $home_work->save();

           

            DB::commit();
            return redirect()->route('instructor.homework.index')->with('message','Home Work Update Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function destroyHomeWork(Request $request)
    {
        // dd('hi');
        $home_work =  HomeWork::find($request->homework_id);
        $home_work->delete();
        return redirect()->route('instructor.homework.index')->with('message','Home Work Deleted Successfully');
    }
// home work End


// home Class Exam

    public function indexClassExam()
    {
        //dd('hi');
        $data['class_tests'] = ClassTestExam::where('teacher_id', auth()->user()->id)->orderBy('id','desc')->get();
        return view('user.instructor.class_exam_index', $data);
    }

    public function createClassExam()
    {
        //  dd('hi');
        $data['classs']=Classe::orderBy('id', 'asc')->where('status', 1)->get(); 
        $data['subjects']=Subject::orderBy('id', 'asc')->where('status', 1)->get();
        $data['exams'] = Examination::orderBy('id', 'desc')->get();
        return view('user.instructor.class_exam_create', $data);
    }

    public function storeClassExam(Request $request)
    {
        //  dd('hi');
        $request->validate([
            'class_id' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $class_test_exam = New ClassTestExam();
            $class_test_exam->teacher_id = auth()->user()->id;
            $class_test_exam->class_id = $request->class_id;
            $class_test_exam->subject_id = $request->subject_id;
            if($request->hasFile('image')){
                $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/class_test_exam/'),$fileName);
                $class_test_exam->image = $fileName;
            }
            // $home_work->image = $request->image;
            $class_test_exam->class_test_duration = $request->class_test_duration;
            $class_test_exam->details = $request->details;
            $class_test_exam->save();
            DB::commit();
            return redirect()->route('instructor.class_exam.index')->with('message','Class Test Exam Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function editClassExam(string $id)
    {
        // dd('hi');
        $data["class_test"]= ClassTestExam::find($id);
        $data['classs']=Classe::orderBy('id', 'desc')->where('status', 1)->get(); 
        $data['subjects']=Subject::orderBy('id', 'desc')->where('status', 1)->get();
        return view("user.instructor.class_exam_update",$data);
    }


    public function updateClassExam(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $class_test_exam = ClassTestExam::find($id);
            $class_test_exam->teacher_id = auth()->user()->id;
            $class_test_exam->class_id = $request->class_id;
            $class_test_exam->subject_id = $request->subject_id;
            if($request->hasFile('image')){
                @unlink(public_path("upload/class_test_exam/".$class_test_exam->image));
                $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/class_test_exam/'),$fileName);
                $class_test_exam->image = $fileName;
            }
            $class_test_exam->details = $request->details;
            $class_test_exam->class_test_duration = $request->class_test_duration;
            $class_test_exam->save();

        

            DB::commit();
            return redirect()->route('instructor.class_exam.index')->with('message','Class Exam Update Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function destroyClassExam(Request $request)
    {
        // dd('hi');
        $home_work =  HomeWork::find($request->homework_id);
        $home_work->delete();
        return redirect()->route('instructor.class_exam.index')->with('message','Class Exam Deleted Successfully');
    }
    // home Class Exam


    // Result Exam start
    public function createResultExam()
    {
        // dd('hi');
        $data['examinations']=Examination::orderBy('id', 'desc')->get();
        $data['teacherAssents']=SubjectTeacherAssent::where('teacher_id',auth()->user()->id)->get();
        return view('user.instructor.exam_result_create',$data);
    }

    public function indexResultExam()
    {
        // dd('hi');
        $data['teacherAssents']=$teacherAssents=SubjectTeacherAssent::where('teacher_id',auth()->user()->id)->first();
        $data['examResults']=ExamResult::where('teacher_id',$teacherAssents->teacher_id)
                                         ->orWhere('class_id',$teacherAssents->class_id)
                                         ->orwhere('section_id',$teacherAssents->section_id)
                                         ->orwhere('session_id',$teacherAssents->session_id)
                                         ->orwhere('subject_id',$teacherAssents->subject_id)
                                        ->orderBy('id', 'desc')->get();
        // $data['examinations']=Examination::orderBy('id', 'desc')->get();
        return view('user.instructor.exam_result_index',$data);
    }

    public function editResultExam($id)
    {
        $data['examResult']=ExamResult::find($id);
        // $data['teacherAssents']=SubjectTeacherAssent::where('teacher_id',auth()->user()->id)->get();
        return view('user.instructor.exam_result_update',$data);
    }

    public function updateResultExam(Request $request, $id)
    {
        $request->validate([
            'obtained_marke' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $examResult = ExamResult::find($id);
            $examResult->obtained_marke = $request->obtained_marke;    
            $examResult->save();
            DB::commit();
            return redirect()->route('instructor.exam_result.index')->with('message','Exam Result Update Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }


    //ajax get subject
    public function getTeacherAssentSubject($id){
        $subject = SubjectTeacherAssent::where("class_id",$id)->where('teacher_id',auth()->user()->id)->with('subject')->get();
        return $subject;
	}  

     //ajax get Teacher Assent School Section
     public function getTeacherAssentSchoolSection($id){
        $section = SubjectTeacherAssent::where("class_id",$id)->where('teacher_id',auth()->user()->id)->with('schoolsection')->get();
        return $section;
	}  

     //ajax get Teacher Assent School Section
     public function getTeacherAssentSession($id){
        $session = SubjectTeacherAssent::where("class_id",$id)->where('teacher_id',auth()->user()->id)->with('session')->get();
        return $session;
	}  


    public function getTeacherAssentResult(Request $request)
    {
        $examinationId = $request->input('examination_id');
        $classId = $request->input('class_id');
        $sectionId = $request->input('section_id');
        $sessionId = $request->input('session_id');
        $subjectId = $request->input('subject_id');
        // return response()->json(['examination_id' => $examinationId,'classId' => $classId,'sectionId' => $sectionId,'subject_id' => $subjectId,'sessionId' => $sessionId]);
        if( $classId && $sectionId && $sessionId && $examinationId && $subjectId){
            $data['students']=$students = Admission::where('class_id',$classId)->where('section_id', $sectionId)->where('session_id', $sessionId)->get();
            $data['Examclass']= ExamClass::where('examination_id',$examinationId)->where("class_id",$classId)->where('subject_id',$subjectId)->first();

        }
        // elseif( $classId && $sessionId && $examinationId && $subjectId){
        //     $data['students']=$students = Admission::where('class_id',$classId)->where('session_id', $sessionId)->get();
        //     $data['Examclass']= ExamClass::where('examination_id',$examinationId)->where("class_id",$classId)->where('subject_id',$subjectId)->first();
        // }

        // if( $classId && $sectionId && $sessionId){
        //     $data['students']=$students = Admission::where('class_id',$classId)->where('section_id', $sectionId)->where('session_id', $sessionId)->get();
        // }elseif( $classId && $sessionId ){
        //     $data['students']=$students = Admission::where('class_id',$classId)->where('session_id', $sessionId)->get();
        //     $data['Examclass']= ExamClass::where('examination_id',$examinationId)->where("class_id",$classId)->where('subject_id',$subjectId)->first();
        // }
        
        return view('user.instructor.student_show',$data);
    }

    // public function getTeacherAssentResult(Request $request)
    // {
    //     try {
    //         // Retrieve input parameters
    //         $examinationId = $request->input('examination_id');
    //         $classId = $request->input('class_id');
    //         $sectionId = $request->input('section_id');
    //         $sessionId = $request->input('session_id');
    //         $subjectId = $request->input('subject_id');

    //         // Log the input parameters for debugging purposes
    //         // \Log::info('Received parameters', [
    //         //     'examination_id' => $examinationId,
    //         //     'class_id' => $classId,
    //         //     'section_id' => $sectionId,
    //         //     'session_id' => $sessionId,
    //         //     'subject_id' => $subjectId,
    //         // ]);

    //         // Initialize the query
    //         // $query = Admission::query();

    //         // // Add conditions to the query based on the received parameters
    //         // if ($classId) {
    //         //     $query->where('class_id', $classId);
    //         // }
    //         // if ($sectionId) {
    //         //     $query->where('section_id', $sectionId);
    //         // }
    //         // if ($sessionId) {
    //         //     $query->where('session_id', $sessionId);
    //         // }

    //         // // Execute the query and get the data
    //         // $alldata = $query->get();

    //         if( $classId && $sectionId && $sessionId){
    //             $alldata = Admission::where('class_id',$classId)->where('section_id', $sectionId)->where('session_id', $sessionId)->get();
                
    //         }elseif( $classId && $sessionId ){
    //             $alldata = Admission::where('class_id',$classId)->where('session_id', $sessionId)->get();
            
    //         }

    //         // Check if data is found
    //         if ($alldata->isEmpty()) {
    //             return response()->json([
    //                 'status' => 404,
    //                 'message' => 'No data found'
    //             ], 404);
    //         }

    //         // Return the data
    //         return response()->json([
    //             'status' => 200,
    //             'data' => $alldata
    //         ]);

    //     } catch (\Exception $e) {
    //         // Log the exception for debugging purposes
    //         // \Log::error('Error fetching teacher assent results', ['error' => $e->getMessage()]);

    //         // Return a JSON response indicating an internal server error
    //         return response()->json([
    //             'status' => 500,
    //             'error' => 'Internal Server Error'
    //         ], 500);
    //     }
    // }

    public function storeStudentResult(Request $request)
    {
        // $marks = $request->input('marks');
        //  dd($request->all());
        $request->validate([
            'obtained_marke' => 'required',
        ]);

        try{
            DB::beginTransaction();

        // Loop through each student's data
        foreach ($request->obtained_marke as $studentId => $marks) {
            $examResult = new ExamResult();
            $examResult->student_id = $studentId;
            $examResult->obtained_marke = $marks;
           
            $examResult->roll_number =  $request->roll_number[$studentId] ?? 0;
            // $examResult->student_name = $request->student_name[$studentId];
            // $examResult->father_name = $request->father_name[$studentId];
            $examResult->class_id = $request->class_id[$studentId] ?? 0;
            $examResult->session_id = $request->session_id[$studentId] ?? 0;
            $examResult->section_id =$request->section_id[$studentId] ?? 0;
            $examResult->subject_id =$request->subject_id[$studentId] ?? 0;
            $examResult->academic_year_id = $request->academic_year_id[$studentId] ?? 0;
            $examResult->marke = $request->marke[$studentId] ?? 0;
            $examResult->pass_marke = $request->pass_marke[$studentId] ?? 0;
            $examResult->examination_id = $request->examination_id[$studentId] ?? 0;
            $examResult->exam_class_id = $request->exam_class_id[$studentId] ?? 0;
            $examResult->teacher_id = auth()->user()->id;
            $examResult->is_publis = '0';
            $examResult->save();
        }
            DB::commit();
            return redirect()->route('instructor.exam_result.index')->with('message','Exam Result Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }
   // Result Exam end


}
