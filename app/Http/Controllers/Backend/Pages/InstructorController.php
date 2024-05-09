<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InstructorPageSetup;
use App\Models\InstructorPageContent;


class InstructorController extends Controller
{
    public function instructorPage()
    {

       $data['instructor'] = InstructorPageSetup::first();
       return view('Backend.setting.page.instructor',$data);
    }

    public function instructorPageSetup(Request $request)
    {
        //dd('hi');
        $instructor = InstructorPageSetup::first();
       if($instructor == null){
           $instructor = new InstructorPageSetup();
       }

       $instructor->top_title = $request->top_title;
       $instructor->description1 = $request->description1;
       $instructor->button1 = $request->button1;

       if($request->hasFile('image1')){
        @unlink(public_path('upload/instructor/'.$instructor->image1));
        $fileName = time().'_image.'.$request->image1->getClientOriginalExtension();
        $request->image1->move(public_path('upload/instructor'), $fileName);
        $instructor->image1 =$fileName;
        }
        $instructor->videolink1 = $request->videolink1;


       $instructor->text1 = $request->text1;
       $instructor->text2 = $request->text2;

       $instructor->text3 = $request->text3;

       $instructor->ptext1 = $request->ptext1;
       $instructor->ptext2 = $request->ptext2;
       $instructor->ptext3 = $request->ptext3;
       $instructor->ptext4 = $request->ptext4;

       $instructor->text4 = $request->text4;
       $instructor->email = $request->email;
       $instructor->button2 = $request->button2;

       $instructor->save();

        //     // LEARNER  Conten start

            if($request->content_name){
            $contentimage=[];
            foreach($request->file('contentimage') as $k=>$image){
                $filename=time().$k.'.'.$image->getClientOriginalExtension();
                $image->move(public_path('upload/instructor/contentimage/'), $filename);
                $contentimage[]=$filename;
            }
            foreach( $request->content_name as $k=>$value){
                $instructorconten = new InstructorPageContent();
                $instructorconten ->instructor_id = $instructor->id;
                $instructorconten ->content_name = $value;
                $instructorconten ->contentimage =$contentimage[$k];
                $instructorconten ->save();
            }
        }

        if($request->old_content_name){
            foreach($request->old_content_name as $k => $value){
                $instructorconten  = InstructorPageContent::find($k);
                $instructorconten ->instructor_id = $instructor->id;
                $instructorconten ->content_name = $value;

                if(isset($request->file('old_contentimage')[$k])){
                    @unlink(public_path('upload/contentimage/'.$instructorconten ->contentimage));
                    $filename=time().$k.'.'.$request->file('old_contentimage')[$k]->getClientOriginalExtension();
                    $request->file('old_contentimage')[$k]->move(public_path('upload/instructor/contentimage/'), $filename);
                    $instructorconten ->contentimage==$filename;
                }
                // $paywith->pay_image = $request->old_pay_image[$k];
                $instructorconten ->save();
            }
        }

        if($request->delete_instructor){
            foreach($request->delete_instructor as $key => $value){
                $instructorconten = InstructorPageContent::find($value);
                $instructorconten->delete();

            }
        }
    // LEARNER  Conten End

    return back()->with("success", "Update Successfully!");

    }
}
