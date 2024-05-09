<?php

namespace App\Http\Controllers\Backend\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CourseCareerOutcome;
use App\Models\CourseSkill;
use App\Models\CourseConten;
use App\Models\CourseLesson;
use App\Models\CourseLessonVideo;

use App\Models\Event;
use App\Models\CourseLanguage;
use App\Models\CourseRequisite;
use App\Models\CourseLearn;
use App\Models\Category;
use App\Models\User;
use App\Models\EventSchedule;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['events'] = Event::orderBy('id','desc')->get();
        return view("Backend.events.event.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['hosts'] = User::where('status','1')->where('type','4')->get();
        $data['instrutors'] = User::where('status','1')->where('type','3')->get();
        $data["categorys"] = Category::where('parent_id', '=' ,0)->where('type','event')->get();
        $data['languages'] = CourseLanguage::orderBy('id', 'desc')->where('status',1)->get();
        return view("Backend.events.event.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
         $request->validate([
            'name' => 'required',
            'host_id' => 'required',
            'fee' => 'required',
            'category_id' => 'required',
            'release_id' => 'required',
        ]);

        try{
            DB::beginTransaction();

        $event = New Event();
        // $car->slug = SlugService::createSlug(Car::class, 'slug', $request->name);
        $event->category_id = $request->category_id ?? 0;
        $event->host_id = $request->host_id ?? 0;

        $event->name = $request->name ?? "";

        $event->startdate = $request->startdate ?? "";
        $event->enddate = $request->enddate ?? "";

        $event->language_id = $request->language_id ?? 0;
        $event->release_id = $request->release_id;
        $event->organization_name = $request->organization_name;
        $event->location = $request->location;
        $event->eventstarttime = $request->eventstarttime;
        $event->fee = $request->fee;
        $event->about = $request->about ?? "";

        $event->save();

            //CourseRequisite Start
            if($request->requisites){
                foreach( $request->requisites as $value){
                    $courserequisite = new CourseRequisite();
                    $courserequisite->event_id = $event->id;
                    $courserequisite->name = $value;
                    $courserequisite->save();
                }
            }
            //CourseRequisite End

            //CourseLearn Start
            if($request->course_learn){
                foreach( $request->course_learn as $value){
                    $courselearn = new CourseLearn();
                    $courselearn->event_id = $event->id;
                    $courselearn->name = $value;
                    $courselearn->save();
                }
            }
            //CourseLearn End

            // Schedule Start
               if($request->schedulename){
                foreach( $request->schedulename as $k=>$value){
                    $schedule = new EventSchedule();
                    $schedule->event_id = $event->id;
                    $schedule->schedulename = $value;
                    $schedule->instrutor_id = $request->instrutor_id[$k];
                    $schedule->day_id = $request->day_id[$k];
                    $schedule->scheduledate = $request->scheduledate[$k];
                    $schedule->schedulestart_time = $request->schedulestart_time[$k];
                    $schedule->scheduleend_time = $request->scheduleend_time[$k];
                    $schedule->save();
                }
            }
            //Schedule End


        DB::commit();
        return redirect()->route('admin.event.index')->with('message','Event Create Successfully');
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
        $data['events']=Event::find($id);
        $data['hosts'] = User::where('status','1')->where('type','4')->get();
        $data['instrutors'] = User::where('status','1')->where('type','3')->get();
        $data["categorys"] = Category::where('parent_id', '=' ,0)->where('type','event')->get();
        $data['languages'] = CourseLanguage::orderBy('id', 'desc')->where('status',1)->get();
        return view("Backend.events.event.update", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'host_id' => 'required',
            'fee' => 'required',
            'category_id' => 'required',
            'release_id' => 'required',
        ]);

        try{
            DB::beginTransaction();

        $event = Event::find($id);
        // $car->slug = SlugService::createSlug(Car::class, 'slug', $request->name);
        $event->category_id = $request->category_id ?? 0;
        $event->host_id = $request->host_id ?? 0;

        $event->name = $request->name ?? "";
        $event->startdate = $request->startdate ?? "";
        $event->enddate = $request->enddate ?? "";
        $event->release_id = $request->release_id;
        $event->organization_name = $request->organization_name;
        $event->location = $request->location;
        $event->eventstarttime = $request->eventstarttime;

        $event->language_id = $request->language_id ?? 0;
        $event->fee = $request->fee;
        $event->about = $request->about ?? "";
        $event->save();


        //CourseRequisite Start
        if($request->requisites){
            foreach( $request->requisites as $value){
                $courserequisite = new CourseRequisite();
                $courserequisite->event_id = $event->id;
                $courserequisite->name = $value;
                $courserequisite->save();
            }
        }

        if($request->old_requisites){
            foreach($request->old_requisites as $k=> $value){
                $courserequisite = CourseRequisite::find($k);
                $courserequisite->event_id = $event->id;
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
                $courselearn->event_id = $event->id;
                $courselearn->name = $value;
                $courselearn->save();
            }
        }

        if($request->old_course_learn){
            foreach($request->old_course_learn as $k=> $value){
                $courselearn = CourseLearn::find($k);
                $courselearn->event_id = $event->id;
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

        // Schedule Start
        if($request->schedulename){
            foreach( $request->schedulename as $k=>$value){
                $schedule = new EventSchedule();
                $schedule->event_id = $event->id;
                $schedule->schedulename = $value;
                $schedule->instrutor_id = $request->instrutor_id[$k];
                $schedule->day_id = $request->day_id[$k];
                $schedule->scheduledate = $request->scheduledate[$k];
                $schedule->schedulestart_time = $request->schedulestart_time[$k];
                $schedule->scheduleend_time = $request->scheduleend_time[$k];
                $schedule->save();
            }
        }

        if($request->old_schedulename){
            foreach( $request->old_schedulename as $k=>$value){
                $schedule =EventSchedule::find($k);
                $schedule->event_id = $event->id;
                $schedule->schedulename = $value;
                $schedule->instrutor_id = $request->old_instrutor_id[$k];
                $schedule->day_id = $request->old_day_id[$k];
                $schedule->scheduledate = $request->old_scheduledate[$k];
                $schedule->schedulestart_time = $request->old_schedulestart_time[$k];
                $schedule->scheduleend_time = $request->old_scheduleend_time[$k];
                $schedule->save();
            }
        }

        if($request->delete_eventschedule){
            foreach($request->delete_eventschedule as $k => $value){
                $courselearn = EventSchedule::find($value);
                $courselearn->delete();

            }
        }
        //Schedule End


        DB::commit();
        return redirect()->route('admin.event.index')->with('message','Event Update Successfully');
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
        $event = Event::find($request->event_id);
        // @unlink(public_path('upload/car/'.$car->image));

        foreach($event->courserequisites as $courserequisite){
            $courserequisite->delete();
        }

        foreach($event->courselearns as $courselearn){
            $courselearn->delete();
        }

        foreach($event->eventschedules as $eventschedule){
            $eventschedule->delete();
        }
        $event->delete();
        return back()->with('message','Event Deleted Successfully');
    }

    public function status($id)
    {
        $event = Event::find($id);
        if($event->status == 0)
        {
            $event->status = 1;
        }elseif($event->status == 1)
        {
            $event->status = 0;
        }
        $event->update();
        return redirect()->route('admin.event.index');
    }



}
