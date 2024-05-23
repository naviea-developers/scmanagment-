<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use App\Models\HomeContentItem;
use App\Models\HomeContentSetup;
use App\Models\HomeIconContent;
use App\Models\Slider;
use Illuminate\Http\Request;

use App\Models\HomeContentLocation;
use App\Models\City;
use App\Models\Classe;
use App\Models\Continent;
use App\Models\Country;
use App\Models\HomeContentClassList;
use App\Models\State;
use Symfony\Component\Console\Input\Input;

class HomeContentController extends Controller
{
    function getHomeContect(Request $request) {
        $data['home_content'] = HomeContentSetup::FirstorNew();
        $data['faqs']=  Faq::where('type',"homepage")->get();
        $data['learn_texts']=  HomeContentItem::where('type',"homepage")->get();

        $data['home_content_locations']=  HomeContentLocation::get();
        $data['Home_content_class_lists']=  HomeContentClassList::get();
        $data['classs']=  Classe::where('status','1')->get();
        $data['continents'] = Continent::get();
        $data['countrys'] = Country::get();
        $data['states']  = State::get();
        $data['citys']  = City::get();
        return view("Backend.home.content_setup.index", $data);
    }

    public function setHomeLocationSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if($home_content == null){
            $home_content = New HomeContentSetup;
        }
        $home_content->university_location_title=$request->university_location_title;
        $home_content->save();

        if($request->class_id){
            foreach($request->class_id as $key => $value){
                $class_list= New HomeContentClassList();
                $class_list->class_id= $value;
                $class_list->save();
            }
        }

        if(isset($request->old_class_id)){
            if($request->old_class_id){
                foreach($request->old_class_id as $k => $value){
                    $class_list= HomeContentClassList::find($k);
                    $class_list->class_id= $value;
                    $class_list->save();
                }
            }
        }

        if($request->delete_class){
            foreach($request->delete_class as $value){
                $class_list= HomeContentClassList::find($value);
                $class_list->delete();
            }
        }



        // if($request->type_loction_id){
        //     foreach($request->type_loction_id as $key => $value){
        //         $homecontentlocation= New HomeContentLocation;
        //         $homecontentlocation->type_loction_id= $value;
        //         $homecontentlocation->location_id= $request->location_id[$key];
        //         $homecontentlocation->save();

        //     }
        // }

        // if(isset($request->old_type_loction_id)){
        //     if($request->old_type_loction_id){
        //         foreach($request->old_type_loction_id as $k => $value){
        //             $homecontentlocation= HomeContentLocation::find($k);
        //             $homecontentlocation->type_loction_id= $value;
        //             $homecontentlocation->location_id= $request->old_location_id[$k];
        //             $homecontentlocation->save();

        //         }
        //     }
        // }

        // if($request->delete_home_content_location){
        //     foreach($request->delete_home_content_location as $value){
        //         $homecontentlocation= HomeContentLocation::find($value);
        //         $homecontentlocation->delete();
        //     }
        // }
        return redirect()->back()->with('message', 'Class list Section Update successfully, Thank You.');

    }

    
    public function getLocationU($id){
        // if($id == 0){
        //     return [];
        // }
       if($id==1){
        $location = Continent::get();
       }elseif($id==2){
        $location = Country::get();
       }elseif($id==3){
        $location  = State::get();
       }elseif($id==4){
        $location  = City::get();
       }
       
        return $location;
    }

    public function setUniversitySection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if($home_content == null){
            $home_content = New HomeContentSetup;
        }

        $home_content->university_title=$request->sub_banner_title;

        if($request->hasFile('university_image')){
            @unlink(public_path('upload/home_content/'.$home_content->university_image));
            $fileName = time().'_university_image.'.$request->university_image->getClientOriginalExtension();
            $request->university_image->move(public_path('upload/home_content'), $fileName);
            $home_content->university_image =$fileName;
        }
        $home_content->save();

        
        return redirect()->back()->with('message', 'University Section Update successfully, Thank You.');
    }


    public function setBannerSection(Request $request)
    {
        if($request->home_content_old_ques){
            foreach($request->home_content_old_ques as $key => $value){
                $faq= Faq::find($key);
                $faq->question= $value;
                $faq->answer= $request->home_content_old_ans[$key];
                $faq->type="homepage";
                $faq->save();

            }
        }
        if($request->old_delete_faq_data){
            foreach($request->old_delete_faq_data as $value){
                $faq= Faq::find($value);
                $faq->delete();
            }
        }
        if($request->home_content_ques){
            foreach($request->home_content_ques as $key => $value){
                $faq= New Faq;
                $faq->question= $value;
                $faq->answer= $request->home_content_ans[$key];
                $faq->type="homepage";
                $faq->save();

            }
        }

        $home_content = HomeContentSetup::first();
        if($home_content == null){
            $home_content = New HomeContentSetup;
        }
        $home_content->banner_text = $request->banner_text;

        if($request->hasFile('banner_image')){
            @unlink(public_path('upload/home_content/'.$home_content->banner_image));
            $fileName = time().'_banner-image.'.$request->banner_image->getClientOriginalExtension();
            $request->banner_image->move(public_path('upload/home_content'), $fileName);

            $home_content->banner_image =$fileName;
        }
        if($request->hasFile('banner_video')){
            @unlink(public_path('upload/home_content/'.$home_content->banner_video));
            $fileName = time().'_banner_video.'.$request->banner_video->getClientOriginalExtension();
            $request->banner_video->move(public_path('upload/home_content'), $fileName);

            $home_content->banner_video =$fileName;
        }
        $home_content->save();
        return redirect()->back()->with('message', 'Banner Section Update successfully, Thank You.');

    }

    public function setSubBannerSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if($home_content == null){
            $home_content = New HomeContentSetup;
        }

        $home_content->sub_banner_title=$request->sub_banner_title;
        $home_content->sub_banner_video=$request->sub_banner_video; //video URL

        if($request->hasFile('sub_banner_image')){
            @unlink(public_path('upload/home_content/'.$home_content->sub_banner_image));
            $fileName = time().'_sub_banner_image.'.$request->sub_banner_image->getClientOriginalExtension();
            $request->sub_banner_image->move(public_path('upload/home_content'), $fileName);
            $home_content->sub_banner_image =$fileName;
        }
        if($request->hasFile('sub_banner_thumbnail')){
            @unlink(public_path('upload/home_content/'.$home_content->sub_banner_thumbnail));
            $fileName = time().'_sub_banner_thumbnail-logo.'.$request->sub_banner_thumbnail->getClientOriginalExtension();
            $request->sub_banner_thumbnail->move(public_path('upload/home_content'), $fileName);
            $home_content->sub_banner_thumbnail =$fileName;
        }
        $home_content->save();
        return redirect()->back()->with('message', 'Sub Banner Section Update successfully, Thank You.');
    }

    public function setCourseSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if($home_content == null){
            $home_content = New HomeContentSetup;
        }
        $home_content->course_title=$request->course_title;
        $home_content->save();
        return redirect()->back()->with('message', 'Course Section Update successfully, Thank You.');
    }

    public function setPartnerSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if($home_content == null){
            $home_content = New HomeContentSetup;
        }
        $home_content->partner_title=$request->partner_title;
        $home_content->save();
        return redirect()->back()->with('message', 'Partner Section Update successfully, Thank You.');
    }

    public function setLearnSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if($home_content == null){
            $home_content = New HomeContentSetup;
        }
        $home_content->learn_title=$request->learn_title;
        if($request->hasFile('learn_image')){
            @unlink(public_path('upload/home_content/'.$home_content->learn_image));
            $fileName = time().'_learn_image.'.$request->learn_image->getClientOriginalExtension();
            $request->learn_image->move(public_path('upload/home_content'), $fileName);
            $home_content->learn_image =$fileName;
        }

        if($request->title_old){
            foreach($request->title_old as $key => $value){
                $learn_text= HomeContentItem::find($key);
                $learn_text->title = $value;
                $learn_text->url = $request->url_old[$key];
                $learn_text->description = $request->description_old[$key];
                $learn_text->type = "homepage";
                $learn_text->save();

            }
        }

        if($request->old_delete_learn_data){
            foreach($request->old_delete_learn_data as $value){
                $learn_text= HomeContentItem::find($value);
                $learn_text->delete();
            }
        }

        if($request->title){
            foreach($request->title as $key => $value){
                $learn_text= New HomeContentItem();
                $learn_text->title= $value;
                $learn_text->url= $request->url[$key];
                $learn_text->description= $request->description[$key];
                $learn_text->type="homepage";
                $learn_text->save();

            }
        }

        $home_content->save();
        return redirect()->back()->with('message', 'Learn Anything Section Update successfully, Thank You.');
    }

    public function setMediaPartnerSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if($home_content == null){
            $home_content = New HomeContentSetup;
        }
        $home_content->client_title=$request->client_title;
        $home_content->save();
        return redirect()->back()->with('message', 'Media Partner Section Update successfully, Thank You.');
    }

    public function setCountingSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if($home_content == null){
            $home_content = New HomeContentSetup;
        }
        $home_content->counting_title=$request->counting_title;

        $home_content->count_text_1=$request->count_text_1;
        $home_content->count_text_2=$request->count_text_2;
        $home_content->count_text_3=$request->count_text_3;
        $home_content->count_text_4=$request->count_text_4;

        $home_content->count_num_1=$request->count_num_1;
        $home_content->count_num_2=$request->count_num_2;
        $home_content->count_num_3=$request->count_num_3;
        $home_content->count_num_4=$request->count_num_4;
        $home_content->save();
        return redirect()->back()->with('message', 'Counting Section Update successfully, Thank You.');
    }

    public function setTestimonialsSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if($home_content == null){
            $home_content = New HomeContentSetup;
        }
        $home_content->review_title1=$request->review_title1;
        $home_content->review_title2=$request->review_title2;
        $home_content->save();
        return redirect()->back()->with('message', 'Testimonials Section Update successfully, Thank You.');
    }

    public function setPackageSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if($home_content == null){
            $home_content = New HomeContentSetup;
        }        
        $home_content->package_title=$request->package_title;
        $home_content->package_text=$request->package_text;
        $home_content->package_btn=$request->package_btn;
        $home_content->package_btn_url=$request->package_btn_url;
        $home_content->save();
        return redirect()->back()->with('message', 'Package Section Update successfully, Thank You.');
    }

    public function setQuestionSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if($home_content == null){
            $home_content = New HomeContentSetup;
        }
        $home_content->question_title=$request->question_title;
        $home_content->ques_short_des=$request->ques_short_des;
        $home_content->question_button_text=$request->question_button_text;
        $home_content->question_button_url=$request->question_button_url;
        if($request->hasFile('question_image')){
            @unlink(public_path('upload/home_content/'.$home_content->question_image));
            $fileName = time().'_question_image.'.$request->question_image->getClientOriginalExtension();
            $request->question_image->move(public_path('upload/home_content'), $fileName);
            $home_content->question_image =$fileName;
        }
        $home_content->save();
        return redirect()->back()->with('message', 'Question Section Update successfully, Thank You.');
    }

    public function setRegisterSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if($home_content == null){
            $home_content = New HomeContentSetup;
        }
        $home_content->register_title=$request->register_title;
        $home_content->register_des=$request->register_des;
        if($request->hasFile('register_image')){
            @unlink(public_path('upload/home_content/'.$home_content->register_image));
            $fileName = time().'_banner-image.'.$request->register_image->getClientOriginalExtension();
            $request->register_image->move(public_path('upload/home_content'), $fileName);

            $home_content->register_image =$fileName;
        }
        $home_content->save();
        return redirect()->back()->with('message', 'Register Section Update successfully, Thank You.');
    }



























//     function setHomeContect(Request $request) {
//         if($request->home_content_old_ques){
//             foreach($request->home_content_old_ques as $key => $value){
//                 $faq= Faq::find($key);
//                 $faq->question= $value;
//                 $faq->answer= $request->home_content_old_ans[$key];
//                 $faq->type="homepage";
//                 $faq->save();

//             }
//         }
//         if($request->old_delete_faq_data){
//             foreach($request->old_delete_faq_data as $value){
//                 $faq= Faq::find($value);
//                 $faq->delete();
//             }
//         }
//         if($request->home_content_ques){
//             foreach($request->home_content_ques as $key => $value){
//                 $faq= New Faq;
//                 $faq->question= $value;
//                 $faq->answer= $request->home_content_ans[$key];
//                 $faq->type="homepage";
//                 $faq->save();

//             }
//         }




//         if($request->title_old){
//             foreach($request->title_old as $key => $value){
//                 $learn_text= HomeContentItem::find($key);
//                 $learn_text->title = $value;
//                 $learn_text->url = $request->url_old[$key];
//                 $learn_text->description = $request->description_old[$key];
//                 $learn_text->type = "homepage";
//                 $learn_text->save();

//             }
//         }

//         if($request->old_delete_learn_data){
//             foreach($request->old_delete_learn_data as $value){
//                 $learn_text= HomeContentItem::find($value);
//                 $learn_text->delete();
//             }
//         }

//         if($request->title){
//             foreach($request->title as $key => $value){
//                 $learn_text= New HomeContentItem();
//                 $learn_text->title= $value;
//                 $learn_text->url= $request->url[$key];
//                 $learn_text->description= $request->description[$key];
//                 $learn_text->type="homepage";
//                 $learn_text->save();

//             }
//         }


//         $home_content = HomeContentSetup::first();
//         if($home_content == null){
//             $home_content = New HomeContentSetup;
//         }
//         $home_content->banner_text = $request->banner_text;




//         $home_content->sub_banner_title=$request->sub_banner_title;
//         $home_content->sub_banner_video=$request->sub_banner_video;

//         $home_content->course_title=$request->course_title;
//         $home_content->partner_title=$request->partner_title;
//         $home_content->client_title=$request->client_title;
//         $home_content->counting_title=$request->counting_title;
//         $home_content->review_title1=$request->review_title1;
//         $home_content->review_title2=$request->review_title2;

//         $home_content->package_title=$request->package_title;
//         $home_content->package_text=$request->package_text;
//         $home_content->package_btn=$request->package_btn;
//         $home_content->package_btn_url=$request->package_btn_url;

//         $home_content->learn_title=$request->learn_title;

//         $home_content->question_title=$request->question_title;
//         $home_content->ques_short_des=$request->ques_short_des;
//         $home_content->question_button_text=$request->question_button_text;
//         $home_content->question_button_url=$request->question_button_url;

//         $home_content->count_text_1=$request->count_text_1;
//         $home_content->count_text_2=$request->count_text_2;
//         $home_content->count_text_3=$request->count_text_3;
//         $home_content->count_text_4=$request->count_text_4;

//         $home_content->count_num_1=$request->count_num_1;
//         $home_content->count_num_2=$request->count_num_2;
//         $home_content->count_num_3=$request->count_num_3;
//         $home_content->count_num_4=$request->count_num_4;


//         $home_content->register_title=$request->register_title;
//         $home_content->register_des=$request->register_des;

//         if($request->hasFile('register_image')){
//             @unlink(public_path('upload/home_content/'.$home_content->register_image));
//             $fileName = time().'_banner-image.'.$request->register_image->getClientOriginalExtension();
//             $request->register_image->move(public_path('upload/home_content'), $fileName);

//             $home_content->register_image =$fileName;
//         }

//         if($request->hasFile('banner_image')){
//             @unlink(public_path('upload/home_content/'.$home_content->banner_image));
//             $fileName = time().'_banner-image.'.$request->banner_image->getClientOriginalExtension();
//             $request->banner_image->move(public_path('upload/home_content'), $fileName);

//             $home_content->banner_image =$fileName;
//         }
//         if($request->hasFile('sub_banner_image')){
//             @unlink(public_path('upload/home_content/'.$home_content->sub_banner_image));
//             $fileName = time().'_sub_banner_image.'.$request->sub_banner_image->getClientOriginalExtension();
//             $request->sub_banner_image->move(public_path('upload/home_content'), $fileName);

//             $home_content->sub_banner_image =$fileName;
//         }
//         if($request->hasFile('sub_banner_thumbnail')){
//             @unlink(public_path('upload/home_content/'.$home_content->sub_banner_thumbnail));
//             $fileName = time().'_sub_banner_thumbnail-logo.'.$request->sub_banner_thumbnail->getClientOriginalExtension();
//             $request->sub_banner_thumbnail->move(public_path('upload/home_content'), $fileName);

//             $home_content->sub_banner_thumbnail =$fileName;
//         }
//         if($request->hasFile('question_image')){
//             @unlink(public_path('upload/home_content/'.$home_content->question_image));
//             $fileName = time().'_question_image.'.$request->question_image->getClientOriginalExtension();
//             $request->question_image->move(public_path('upload/home_content'), $fileName);

//             $home_content->question_image =$fileName;
//         }
//         if($request->hasFile('learn_image')){
//             @unlink(public_path('upload/home_content/'.$home_content->learn_image));
//             $fileName = time().'_learn_image.'.$request->learn_image->getClientOriginalExtension();
//             $request->learn_image->move(public_path('upload/home_content'), $fileName);

//             $home_content->learn_image =$fileName;
//         }


//         if($request->hasFile('banner_video')){
//             @unlink(public_path('upload/home_content/'.$home_content->banner_video));
//             $fileName = time().'_banner_video.'.$request->banner_video->getClientOriginalExtension();
//             $request->banner_video->move(public_path('upload/home_content'), $fileName);

//             $home_content->banner_video =$fileName;
//         }




//         $home_content->save();
//         return back()->with("success", "Update Successfully!");
//     }
}
