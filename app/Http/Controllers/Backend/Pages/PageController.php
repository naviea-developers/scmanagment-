<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use App\Models\AboutPageSetup;
use App\Models\Category;
use App\Models\Faq;
use App\Models\HomeContentItem;
use App\Models\HomeContentSetup;
use App\Models\Library;
use App\Models\MaestroClassSetup;
use App\Models\PackageDetails;
use App\Models\PackageTagLine;
use App\Models\Page;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('Backend.setting.page.index', compact('pages'));
    }
    public function categoryIndex()
    {
        $page_categories = Category::where('type','page')->get();
        return view('Backend.setting.page_category.index', compact('page_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::where('type','page')->get();
        return view('Backend.setting.page.create',$data);
    }
    public function categoryCreate()
    {

        return view('Backend.setting.page_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $page = new Page();
        $page->title = $request->title;
        $page->description = $request->description;
        $page->template = $request->template;
         $page->category_id = $request->category ?? 0;
        $page->slug = SlugService::createSlug(Page::class, 'slug', $request->title);
        $page->save();
        return redirect()->back()->with('success', 'Page added successfully, Thank You.');
    }
    public function categoryStore(Request $request)
    {
        $page = new Category();
        $page->name = $request->title;
        $page->type = 'page';

        $page->save();
        return redirect()->route("admin.page_category.index")->with('success', 'Category added successfully, Thank You.');
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
        $data['page'] = Page::find($id);
        $data['categories'] = Category::where('type','page')->get();
        return view('Backend.setting.page.update', $data);
    }
    public function categoryEdit(string $id)
    {
        $page_category =  Category::find($id);
        return view('Backend.setting.page_category.update', compact('page_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $page = Page::find($id);
         $page->slug = SlugService::createSlug(Page::class, 'slug', $request->title);
        $page->title = $request->title;
        $page->template = $request->template;
        $page->description = $request->description;
        $page->category_id = $request->category ?? 0;
        // dd($page);
        $page->update();
        return redirect()->route('all-pages.index');
    }
     public function categoryUpdate(Request $request,$id)
    {
        $page =  Category::find($id);
        $page->name = $request->title;
        $page->type = 'page';
        $page->status = $request->status;
        $page->save();
        return redirect()->route("admin.page_category.index")->with('success', 'Category Updated successfully, Thank You.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function pageDelete($id)
    {
        $page= Page::find($id);
        $page->delete();
        return redirect()->route('all-pages.index');
    }
     public function pageCattegoryDelete($id)
    {
        $page =  Category::find($id);
        $page->delete();
        return redirect()->route('admin.page_category.index');
    }
    public function category_status_toggle($id)
    {
       $page =  Category::find($id);
        if($page->status == 0)
        {
            $page->status = 1;
        }elseif($page->status == 1)
        {
            $page->status = 0;
        }
        $page->update();
        return redirect()->route('admin.page_category.index');
    }

         //Status section
         public function status_toggle($id)
         {
             $page = Page::find($id);
             if($page->status == 0)
             {
                 $page->status = 1;
             }elseif($page->status == 1)
             {
                 $page->status = 0;
             }
             $page->update();
             return redirect()->route('all-pages.index');
         }

         public function footerPages()
         {
            return view('Backend.setting.page.footer_pages');
         }




////-----------------------------

         public function aboutPage()
         {
            $data['about_content'] = AboutPageSetup::first();
            $data['faqs']=  Faq::where('type',"aboutpage")->get();
            $data['learn_texts']=  HomeContentItem::where('type',"homepage")->get();
            return view('Backend.setting.page.about', $data);
         }
         public function aboutPageSetup(Request $request)
         {
            $about = AboutPageSetup::first();
            if($about == null){
                $about = new AboutPageSetup();
            }

            $about->about_text = $request->about_text;
            $about->description1 = $request->description1;
            $about->video_url = $request->video_url;
            $about->about_text2 = $request->about_text2;
            $about->description2 = $request->description2;
            $about->about_text3 = $request->about_text3;
            $about->description3 = $request->description3;
            $about->about_text4 = $request->about_text4;

            if($request->hasFile('video_thumbnail')){
                @unlink(public_path('upload/about/'.$about->video_thumbnail));
                $fileName = time().'_image.'.$request->video_thumbnail->getClientOriginalExtension();
                $request->video_thumbnail->move(public_path('upload/about'), $fileName);

                $about->video_thumbnail =$fileName;
            }

            $about->save();


            if($request->tagline){
                $tagline_image=[];
                foreach($request->file('tagline_image') as $k=>$image){
                    $filename=time().$k.'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('upload/package/icons/'), $filename);
                    $tagline_image[]=$filename;
                }
                // dd($request->tagline);
                foreach($request->tagline as $k=>$line){
                    $packagetagline= New PackageTagLine();
                    $packagetagline->package_id=$about->id;
                    $packagetagline->title = $line;
                    $packagetagline->icon=$tagline_image[$k];
                    $packagetagline->save();
                    // dd($request->details[$k]);
                    foreach($request->details[$k] as $detail){
                        $packagedetails= New PackageDetails();
                        $packagedetails->packagetagline_id=$packagetagline->id;
                        $packagedetails->text=$detail;
                        $packagedetails->save();
                    }
                }
            }

            ///update

            if($request->old_tagline){
                foreach($request->old_tagline as $k=>$line){
                    $packagetagline=  PackageTagLine::find($k);
                    $packagetagline->package_id=$about->id;
                    $packagetagline->title = $line;
                    // dd($request->old_tagline_image);
                    if(isset($request->file('old_tagline_image')[$k])){
                        @unlink(public_path('upload/package/icons/'.$packagetagline->icon));
                        $filename=time().$k.'.'.$request->file('old_tagline_image')[$k]->getClientOriginalExtension();
                        $request->file('old_tagline_image')[$k]->move(public_path('upload/package/icons/'), $filename);
                        $packagetagline->icon=$filename;
                    }
                    $packagetagline->save();
                    if(isset($request->old_details[$k])){
                        foreach($request->old_details[$k] as $j=>$detail){
                            $packagedetails=  PackageDetails::find($j);
                            $packagedetails->packagetagline_id=$packagetagline->id;
                            $packagedetails->text=$detail;
                            $packagedetails->save();
                        }
                    }
                    if(isset($request->details[$k])){
                        foreach($request->details[$k] as $detail){
                            $packagedetails= New PackageDetails;
                            $packagedetails->packagetagline_id=$packagetagline->id;
                            $packagedetails->text=$detail;
                            $packagedetails->save();
                        }
                    }

                }
            }
            //dd($request->all());
            if($request->delete_details){
                foreach($request->delete_details as $detail){
                    $packagedetails= PackageDetails::find($detail);
                    $packagedetails->delete();
                }
            }
            if($request->delete_tagline){
                foreach($request->delete_tagline as $val){
                    $packagetagline=  PackageTagLine::find($val);
                    @unlink(public_path('upload/package/icons/'.$packagetagline->icon));
                    foreach($packagetagline->details as $detail){

                        $detail->delete();
                    }
                    $packagetagline->delete();
                }
            }

// dd($about);
            // $about->save();

            if($request->description){
                $image=[];

                foreach($request->file('image') as $key=>$image){
                    $filename=time().$key.'_about_image.'.$image->getClientOriginalExtension();
                    $image->move(public_path('upload/about/'), $filename);
                    $images[]=$filename;
                }

                foreach($request->description as $key => $value){
                    $about= New Faq;
                    $about->description= $value;
                    $about->url= $request->url[$key];
                    $about->type="aboutpage";
                    $about->image = $images[$key];
                    $about->save();

                }
            }

            if($request->old_description){
            foreach($request->old_description as $k => $value){
                $about  = Faq::find($k);
                $about->description= $value;
                $about->url= $request->old_url[$k];

          //dd($request->old_image);
                if(isset($request->file('old_image')[$k])){
                    @unlink(public_path('upload/about/'.$about->image));
                    $filename=time().$k.'.'.$request->file('old_image')[$k]->getClientOriginalExtension();
                    $request->file('old_image')[$k]->move(public_path('upload/about/'), $filename);
                    $about->image=$filename;
                }

                $about ->save();
            }
        }

        if($request->old_delete_about_data){
            foreach($request->old_delete_about_data as $key => $value){
                $about = Faq::find($value);
                $about->delete();

            }
        }
            return back()->with("success", "Update Successfully!");
    }





    //libraryPage
    public function libraryPage()
    {
    $data['library'] = Library::first();
    return view('Backend.setting.page.library', $data);
    }
    public function libraryPageSetup(Request $request)
    {
    $library = Library::first();
    if($library == null){
        $library = new Library();
    }

    $library->description = $request->description;
    $library->timer = $request->timer;
    $library->title1 = $request->title1;
    $library->title2 = $request->title2;

    if($request->hasFile('image')){
        @unlink(public_path('upload/library/'.$library->image));
        $fileName = time().'_image.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('upload/library'), $fileName);
        $library->image =$fileName;
    }
    // dd($library);
    $library->save();
    return back()->with("success", "Update Successfully!");
    }





    public function maestorClass()
    {
        $data['home_content'] = MaestroClassSetup::FirstorNew();
        $data['faqs']=  Faq::where('type',"maestroclass")->get();
        return view('Backend.setting.page.maestor_class', $data);
    }
    function maestorClassSetup(Request $request) {
        // if($request->home_content_old_ques){
        //     foreach($request->home_content_old_ques as $key => $value){
        //         $faq= Faq::find($key);
        //         $faq->question= $value;
        //         $faq->answer= $request->home_content_old_ans[$key];
        //         $faq->type="maestroclass";
        //         $faq->save();

        //     }
        // }
        // if($request->old_delete_faq_data){
        //     foreach($request->old_delete_faq_data as $value){
        //         $faq= Faq::find($value);
        //         $faq->delete();
        //     }
        // }
        // if($request->home_content_ques){
        //     foreach($request->home_content_ques as $key => $value){
        //         $faq= New Faq;
        //         $faq->question= $value;
        //         $faq->answer= $request->home_content_ans[$key];
        //         $faq->type="maestroclass";
        //         $faq->save();

        //     }
        // }



        $maestro_content = MaestroClassSetup::first();
        if($maestro_content == null){
            $maestro_content = New MaestroClassSetup;
        }
        $maestro_content->banner_title = $request->banner_title;
        $maestro_content->title2=$request->title2;
        $maestro_content->title3=$request->title3;


        if($request->hasFile('banner_image')){
            @unlink(public_path('upload/maestor-class/'.$maestro_content->banner_image));
            $fileName = time().'_banner-image.'.$request->banner_image->getClientOriginalExtension();
            $request->banner_image->move(public_path('upload/maestor-class'), $fileName);

            $maestro_content->banner_image =$fileName;
        }
        if($request->hasFile('banner_video')){
            @unlink(public_path('upload/maestor-class/'.$maestro_content->banner_video));
            $fileName = time().'_banner_video.'.$request->banner_video->getClientOriginalExtension();
            $request->banner_video->move(public_path('upload/maestor-class'), $fileName);

            $maestro_content->banner_video =$fileName;
        }
        $maestro_content->save();
        return back()->with("success", "Update Successfully!");
    }

    ///FAQ
    public function manageFaq()
    {
        $data['faq_content'] = Faq::where('type', 'faq_content')->first();
        $data['faqs']=  Faq::where('type',"faq")->get();
        return view('Backend.setting.page.faq', $data);
    }
    public function faqSetup(Request $request) {
        if($request->home_content_old_ques){
            foreach($request->home_content_old_ques as $key => $value){
                $faq= Faq::find($key);
                $faq->question= $value;
                $faq->answer= $request->home_content_old_ans[$key];
                $faq->type="faq";
                $faq->save();

            }
        }
        if($request->old_delete_faq_data){
            foreach($request->old_delete_faq_data as $value){
                $faq= Faq::find($value);
                $faq->delete();
            }
        }
        // dd($request->home_content_ques);
        if($request->home_content_ques){
            foreach($request->home_content_ques as $key => $value){
                $faq= New Faq;
                $faq->question= $value;
                $faq->answer= $request->home_content_ans[$key];
                $faq->type="faq";
                // dd($faq);
                $faq->save();

            }
        }



        $faq_content = Faq::where('type', 'faq_content')->first();
        if($faq_content == null){
            $faq_content = New Faq();
        }
        $faq_content->title1=$request->title1;
        $faq_content->title2=$request->title2;
        $faq_content->description1=$request->description1;
        $faq_content->description2=$request->description2;
        $faq_content->type="faq_content";


        if($request->hasFile('banner_image')){
            @unlink(public_path('upload/faq/'.$faq_content->banner_image));
            $fileName = time().'_banner-image.'.$request->banner_image->getClientOriginalExtension();
            $request->banner_image->move(public_path('upload/faq'), $fileName);
            $faq_content->banner_image =$fileName;
        }

        $faq_content->save();
        return back()->with("success", "Update Successfully!");
    }




}
