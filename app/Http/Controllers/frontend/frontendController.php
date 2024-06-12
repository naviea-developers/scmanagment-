<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPageSetup;
use App\Models\Blog;
use App\Models\BusinessPackages;
use App\Models\Client;
use App\Models\Faq;
use App\Models\HomeContentSetup;
use App\Models\Partner;
use App\Models\Course;
use App\Models\Category;
use App\Models\Comment;
use App\Models\HomeContentItem;
use App\Models\Review;
use App\Models\UserContact;
use App\Models\SiteSetting;
use App\Models\learnerPageSetup;
use App\Models\InstructorPageSetup;
use App\Models\Library;
use App\Models\User;
use App\Models\Event;
use App\Models\Banner;
use App\Models\Continent;
use App\Models\MaestroClassSetup;
use App\Models\Page;
use App\Models\Testimonial;
use App\Models\CourseSave;
use App\Models\Currency;
use App\Models\Ebook;
use App\Models\EbookAudioContent;
use App\Models\EbookVideoContent;
use App\Models\EventCart;
use App\Models\Useraccess;
use App\Models\FounderCoFundere;
use App\Models\Topic;
use App\Models\Tp_option;
use App\Models\VisitorModel;
use App\Models\CourseResourceFile;
use App\Models\CourseLessonFile;
use App\Models\CourseQuizFile;
use App\Models\CoursezprojectFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Mpdf\Mpdf;
use ZipArchive;

use App\Models\HomeContentLocation;
use App\Models\University;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\CourseLanguage;
use App\Models\Department;
use App\Models\Degree;
use App\Models\Section;
use App\Mail\ContactMailCoustomer;
use App\Models\Admission;
use App\Models\Alumni;
use App\Models\Book;
use App\Models\Classe;
use App\Models\ClassRoutine;
use App\Models\DailyClass;
use App\Models\Designation;
use App\Models\Examination;
use App\Models\ExamSchedule;
use App\Models\FeeManagement;
use Illuminate\Support\Facades\Mail;
use App\Models\Gallery;
use App\Models\HomeContentClassList;
use App\Models\Notice;
use App\Models\NoticeType;
use App\Models\SchoolSection;
use App\Models\Session;
use App\Models\Syllabus;
use App\Models\TopperStudent;

class FrontendController extends Controller
{
    function changeCurrency($name){
        $currency = Currency::where('currency_name', $name)->first();
        //session().put('currency', $currency->currency_name);
        if($currency){

            setApplicationCurrency($currency);

        }
        return back();
    }
    public function index(Request $request)
    {
        $data['home_content'] = HomeContentSetup::first();
        $data['partners'] = Partner::all();
        $data['buttons']= Faq::where('type','homepage')->get();
        $data['learn_texts']=  HomeContentItem::where('type',"homepage")->get();
        $data['clients'] = Client::all();

        $data['homecontentlocations']= HomeContentLocation::orderBy('id','desc')->get();
        $data['universities'] = University::where('status',1)->inRandomOrder()->take(12)->get();
        $data['gallerys'] = Gallery::where('status',1)->orderBy('id','desc')->take(7)->get();
        $data['classLists'] = HomeContentClassList::where('status',1)->orderBy('id','desc')->take(7)->get();
        $data['classes'] = Classe::where('status',1)->orderBy('id','asc')->get();
        $data['blogs'] = Blog::latest()->take(4)->get();
        
        $data['founders'] = FounderCoFundere::where('status', '1')->get();
        $data['teachers'] = User::where('status', 1)->where('type', '2')->take(8)->get();
        $data['toppers'] = TopperStudent::where('status', 1)->take(8)->get();

        $data['search']=$name = $request->input('search');
        if(isset(request()->search)){
            $data["courses"] = Course::where('type','course')->where('status',1)->where('is_master','0')->where('name','like','%'.request()->search.'%')->get();
        }else{
            $data['courses'] = Course::where('type','course')->where('status',1)->where('is_master','0')->where('coursetype','1')->orderBy('id','desc')->get();
        }

        $data["categories"] = Category::where('parent_id',0)->where('type','home')->get();
        $data["sub_categorys"] = Category::where('type',"home")->where('parent_id', '!=' ,'')->where('is_sub',0)->get();
        $data["testimonials"] = Testimonial::where('status',1)->get();
        // $data['packages'] = BusinessPackages::where('package_status',1)->where('package_type',1)->latest()->get();

        ///visitor count with ip address
        $UserIP=$_SERVER['REMOTE_ADDR'];

        //date_default_timezone_set("Asia/Dhaka");
        $timeDate= date("Y-m-d h:i:sa");
        VisitorModel::insert(['ip_address'=>$UserIP,'visit_time'=>$timeDate,'created_at'=>Carbon::now(),'updated_at'=> now()]);


        return view('Frontend.index', $data);
    }

    public function typeaHeadSearch(Request $request)
    {
        $search = $request->input('search');
        $data['courses'] = Course::where('type','course')->where('status',1)->where('is_master', 0)->where('name', 'like', '%' . $search . '%')->get();
        return view('Frontend.typeahead_search', $data);
    }

    public function allCourseShow(Request $request)
    {
        $data['name']=$name = $request->input('name');
        if(isset(request()->name)){
            $data['top_category'] = null;
            $data['banner']= Banner::where('type','course')->where('status',1)->orderBy('id','desc')->first();
            $data["courses"] = Course::where('type','course')->where('status',1)->where('is_master','0')->where('name','like','%'.request()->name.'%')->paginate(9);
        }else{
            $data['top_category'] = null;
            $data['banner']= Banner::where('type','course')->where('status',1)->orderBy('id','desc')->first();
            $data['courses'] = Course::where('type','course')->where('status',1)->where('is_master','0')->orderBy('id','desc')->paginate(9);
        }

        return view('Frontend.course.allcourse',$data);
    }

    //home cat show
    public function catCourseAll(Request $request, $cat_id)
    {
        $data['name']=$name = $request->input('name');
        $data['top_category']=$category = Category::find($cat_id);
       // dd($category);
        $data['courses'] = Course::where('type','course')->where('status',1)->where('category_id',$cat_id)->orderBy('id','desc')->paginate(9);
        return view('Frontend.course.allcourse',$data);
    }
    //home sub cat show
    public function subcatCourseAll(Request $request, $subcat_id)
    {
         $data['name']=$name = $request->input('name');
        $data['top_category']=$category = Category::find($subcat_id);
       // dd($category);
        $data['courses'] = Course::where('type','course')->where('status',1)->where('sub_category_id',$subcat_id)->orderBy('id','desc')->paginate(3);
        return view('Frontend.course.allcourse',$data);
    }

    //ajax get Course
    public function getCourse(){
        $data['courses'] = Course::where('type','course')->where('status',1)->where('is_master','0')->orderBy('id','desc')->paginate(4);
        return view('Frontend.course.ajaxseecourse',$data);
    }

    

    //course By CatAjax
    public function courseByCatAjax(Request $request,$id){
        $data['name']=$name = $request->input('name');
        $data['top_category']=$category = Category::find($id);
        $data['courses'] = Course::where('type','course')->where('status',1)->where('category_id',$id)->orderBy('id','desc')->get();
        return view('Frontend.course.catajax',$data);
    }
    //Master course By CatAjax
    public function masterCourseByCatAjax(Request $request,$id){
        $data['master_courses'] = Course::where('type','course')->where('status',1)->where('category_id',$id)->where('is_master', 1)->orderBy('id','desc')->get();
        return view('Frontend.pages.master_course_ajax',$data);
    }



    //course By Sub CatAjax
    public function courseBySubCatAjax(Request $request,$id){
        $data['name']=$name = $request->input('name');
        $data['top_category']=$category = Category::find($id);
        $data['courses']  = Course::where('type','course')->where('status',1)->where('sub_category_id',$id)->orderBy('id','desc')->get();
        return view('Frontend.course.subcatajax',$data);
    }


    //get Course Type By Cat
    // public function getCourseTypeByCat($cat){
    //     $data['courses'] = Course::where('type_id',$cat)->paginate(4);
    //     return view('Frontend.course.coursetypeajax',$data);
    // }

    public function getCourseTypeByCat($id){

        if($id == ""){
            $data['courses'] = Course::where('type','course')->where('status',1)->get();
        }else{
            $data['courses'] = Course::where('type','course')->where('status',1)->where('coursetype',$id)->get();
           // $data['events'] = Event::where('category_id',$id)->get();
        }
        return view('Frontend.course.coursetypeajax',$data);
    }

//getCoursePublished
    public function getCoursePublished($id){
        if($id=='1'){
            $data['courses'] = Course::where('type','course')->where('status',1)->whereBetween('created_at',[(new Carbon)->subDays(7)->startOfDay(),(new Carbon)->now()->endOfDay()] )->get();
        }else if ($id=='2'){
            $data['courses'] = Course::where('type','course')->where('status',1)->whereBetween('created_at',[(new Carbon)->subDays(30)->startOfDay(),(new Carbon)->now()->endOfDay()] )->get();
        }
        return view('Frontend.course.publishedajaxcourse',$data);
    }


    function addToSave(Request $request,$id){
        try{
            if(auth()->check()){

                $save = CourseSave::where('course_id',$id)->where('user_id',auth()->user()->id)->first();
                if($save == null){
                    $save = New CourseSave;
                    $save->course_id = $id;
                    $save->user_id = auth()->user()->id;
                    $save->save();
                    return "ok";
                }else{
                    $save->delete();
                     return "del";
                }


            }else{
                return "no";
            }
        }catch(\Exception $e){
             return "no";
        }

    }

    //home course By Sub CatAjax
    public function homecourseBySubCatAjax($id){
        if($id == "popular"){
            $data['courses']  = Course::where('type','course')->where('status',1)->where('is_master','0')->where('coursetype','1')->orderBy('id','desc')->get();
        }else if($id == "newest"){
            $data['courses']  = Course::where('type','course')->where('status',1)->where('is_master','0')->orderBy('id','desc')->get();
        }else{
            $data['courses']  = Course::where('type','course')->where('status',1)->where('sub_category_id',$id)->get();
        }

        return view('Frontend.course.homesubcatajx',$data);
    }

    public function courseDetails($id){
       // dd('hi');
        $data['course'] =$course= Course::find($id);
        // dd($course->relatedcourses[0]->course->name);
        return view('Frontend.course.coursedetails',$data);
    }
    public function signin()
    {
        session()->put('login_pre_url',url()->previous());
        return view('Frontend.auth.login');
    }

    // public function register()
    // {
    //     $data['continents'] = Continent::where('status', 1)->get();
    //     return view('Frontend.auth.register', $data);
    // }
    public function register()
    {
        return view('Frontend.auth.register');
    }
    public function alumniRegister()
    {
        $data['classes'] = Classe::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['fees'] = FeeManagement::where('status', 1)->get();
        return view('Frontend.auth.reg_alumni', $data);
    }
    // public function instructorRegister()
    // {
    //     return view('Frontend.auth.register_instructor');
    // }
    // public function instructorSignin()
    // {
    //     return view('Frontend.auth.login_instructor');
    // }
    public function sellerRegister()
    {
        return view('Frontend.auth.register_seller');
    }
    public function sellerSignin()
    {
        return view('Frontend.auth.login_seller');
    }
    public function teacherSignin()
    {
        return view('Frontend.auth.login_teacher');
    }
    public function teacherRegister()
    {
        return view('Frontend.auth.register_teacher');
    }
    public function affiliateSignin()
    {
        return view('Frontend.auth.login_affiliate');
    }
    public function affiliateRegister()
    {
        return view('Frontend.auth.register_affiliate');
    }
    public function consultantSignin()
    {
        return view('Frontend.auth.login_consultant');
    }
    public function consultantRegister()
    {
        $data['continents'] = Continent::where('status', 1)->get();
        return view('Frontend.auth.register_consultant', $data);
    }


    //pages
    public function libraryBook()
    {
        $data['classes'] = Classe::where('status', '1')->get();
        $data['books'] = Book::where('status', '1')->paginate(4);
        return view('Frontend.library.book', $data);
    }
    
    public function filterBooks(Request $request)
    {
        $query = Book::query();
    
        if ($request->has('class_id') && $request->class_id != '') {
            $query->where('class_id', $request->class_id);
        }
    
        if ($request->has('group_id') && $request->group_id != '') {
            $query->where('group_id', $request->group_id);
        }
    
        if ($request->has('book_name') && $request->book_name != '') {
            $query->where('name', 'like', '%' . $request->book_name . '%');
        }
    
        $books = $query->where('status', '1')->paginate(4);
    
        $html = '';
        foreach ($books as $book) {
            $html .= '<div class="col-md-3">';
            $html .= '<div class="mb-3 card card-body shadow">';
            $html .= '<div class="picture"><img style="height:200px; width:100%;object-fit: fill" class="img-fluid" src="' . $book->image_show . '"></div>';
            $html .= '<div><h6 class="title mt-2" style="text-align: center;">' . $book->name . '</h6>';
            $html .= '<h6 class="title" style="text-align: center;">' . $book->class->name . '</h6>';
            $html .= '<h6 class="title" style="text-align: center;">Stock In: ' . ($book->total_set - $book->stock_out) . '</h6></div>';
            $html .= '</div></div>';
        }
    
        return response()->json(['html' => $html, 'lastPage' => $books->lastPage()]);
    }
    
    
    


    


    //pages
    public function about()
    {
        $data['about_content'] = AboutPageSetup::first();
        $data['home_content'] = HomeContentSetup::first();
        $data['faqs'] = Faq::where('type', 'aboutpage')->get();
        $data['partners'] = Partner::all();
        $data['founders'] = FounderCoFundere::where('status', '1')->get();
        return view('Frontend.pages.about', $data);
    }
    public function learner()
    {
        $data['home_content'] = HomeContentSetup::first();
        $data['learner'] = learnerPageSetup::first();
        $data['clients'] = Client::all();
        $data['partners'] = Partner::all();
        $session =Session::where('status', 1)->where('is_current',1)->first();
        $data['students'] = Admission::where('is_new', 0)->where('session_id',$session->id)->paginate(4);
        $data['sessions'] = Session::where('status', 1)->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('status', 1)->get();
        return view('Frontend.pages.learner', $data);
    }


   

    // public function getCurrentSession()
    // {
    //     $currentSession = Session::where('is_current', 1)->first();
    //     return response()->json(['current_session' => $currentSession]);
    // }

    // public function fetchStudentsFilter(Request $request)
    // {
    //     $query = Admission::where('is_new', 0);
    
    //     if ($request->session_id) {
    //         $query->where('session_id', $request->session_id);
    //         if ($request->class_id) {
    //             $query->where('class_id', $request->class_id);
    //         }
    //     } elseif ($request->class_id) {
    //         $currentSession = Session::where('is_current', 1)->first();
    //         if ($currentSession) {
    //             $query->where('class_id', $request->class_id)
    //                   ->where('session_id', $currentSession->id);
    //         }
    //     }
    
    //     if ($request->group_id) {
    //         $query->where('group_id', $request->group_id);
    //     }
    
    //     if ($request->section_id) {
    //         $query->where('section_id', $request->section_id);
    //     }
    
    //     $students = $query->get();
        
    //     $html = view('Frontend.pages.learner_list_ajax_filter', compact('students'))->render();
        
    //     return response()->json(['html' => $html]);
    // }
    


    public function fetchStudentsFilter(Request $request)
    {
        $query = Admission::where('is_new', 0);
    
        if ($request->session_id) {
            $query->where('session_id', $request->session_id);
        }
        if ($request->class_id) {
            $query->where('class_id', $request->class_id);
        }
        if ($request->group_id) {
            $query->where('group_id', $request->group_id);
        }
        if ($request->section_id) {
            $query->where('section_id', $request->section_id);
        }
        if ($request->has('name') && !empty($request->name)) {
            $query->where('student_name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->has('roll_number') && !empty($request->roll_number)) {
            $query->where('roll_number', 'LIKE', '%' . $request->roll_number . '%');
        }
        



        // if ($request->filled('session_id')) {
        //     $query->where('session_id', $request->session_id);
        // } elseif ($request->filled('class_id')) {
        //     $currentSession = Session::where('is_current', 1)->first();
        //     if ($currentSession) {
        //         $query->where('class_id', $request->class_id)
        //               ->where('session_id', $currentSession->id);
        //     } else {
        //         return response()->json(['html' => '']);
        //     }
        // }
    
        // if ($request->filled('group_id')) {
        //     $query->where('group_id', $request->group_id);
        // }
    
        // if ($request->filled('section_id')) {
        //     $query->where('section_id', $request->section_id);
        // }
    
        $students = $query->paginate(4);
    
        $html = view('Frontend.pages.learner_list_ajax_filter', compact('students'))->render();
    
        return response()->json(['html' => $html,'last_page'=>$students->lastPage()]);
    }
    





    public function instructor()
    {
        $data['teachers'] = User::where('type','2')->orderBy('id', 'desc')->where('status',1)->get();
        $data['designations'] = Designation::orderBy('position', 'asc')->where('status',1)->get();
        $data['instructor'] = InstructorPageSetup::first();
        return view('Frontend.pages.instructor',$data);
    }
    public function contact()
    {
        // $data['site_setting'] = SiteSetting::first();
        $data['banner']= Banner::where('type','contact')->where('status',1)->orderBy('id','desc')->first();
        $data['contact_info'] = Tp_option::where('option_name', 'theme_option_footer')->first();
        return view('Frontend.pages.contact',$data); // enterprise
    }

    public function userContactStore(Request $request)
    {
         //dd('hi');
        // $request->validate([

        //     'name' => 'required',
        //     'mobile' => 'required',
        //     'email' => 'required',
        // ]);

        $contact = new UserContact();
        $contact->name = $request->name;
        $contact->mobile = $request->mobile;
        $contact->email = $request->email;
        $contact->type = $request->type;
        $contact->contact_type = 'contact';
        $contact->organization = $request->organization;
        $contact->date = $request->date;
        $contact->details = $request->details;
        $contact->save();
        // return redirect()->back(); // contactStore

        return redirect()->route('frontend.contact')->with('success','Your Contact Add Successfully');
    }

    public function library()
    {
        $data['library'] = Library::first();
        return view('Frontend.pages.library', $data);
    }
    public function eventList(Request $request)
    {
        $data['name']=$name = $request->input('name');
        if(isset(request()->name)){
            $data["categorys"] = Category::where('parent_id', '=' ,0)->where('type','event')->get();
            $data['banner']= Banner::where('type','event')->where('status',1)->orderBy('id','desc')->first();
            $data["events"] = Event::where('status',1)->where('name','like','%'.request()->name.'%')->paginate(9);
        }else{
            $data["categorys"] = Category::where('parent_id', '=' ,0)->where('type','event')->get();
            $data['banner']= Banner::where('type','event')->where('status',1)->orderBy('id','desc')->first();
            $data['events'] = Event::where('status',1)->orderBy('id','desc')->paginate(9);
        }

        return view('Frontend.pages.eventlist',$data);
    }

    public function eventDetails($id)
    {
        $data['event'] = Event::find($id);

        return view('Frontend.pages.eventdetails',$data);
    }

    //ajax get Event
    public function getEvents(){
        $data['events'] = Event::where('status',1)->orderBy('id','desc')->paginate(3);
        return view('Frontend.pages.eventajaxsee',$data);
    }

    public function eventMassage(Request $request)
    {
        //dd($request->all());
        $contact = new UserContact();
        $contact->user_id=auth()->user()->id;
        $contact->event_id= $request->event_id;
        $contact->details=$request->details;
        $contact->contact_type = 'event';
        $contact->save();
        return redirect()->back()->with('success','Massage Add Successfully');;
    }
   //Event Cat Show
    public function getEventByCat(Request $request, $id){
        $data['name']=$name = $request->input('name');
        if($id == 0){
            $data['events'] = Event::where('status',1)->get();
        }else{
            $data['events'] = Event::where('status',1)->where('category_id',$id)->get();
        }

        return view('Frontend.pages.eventcatajax',$data);
    }
   //Event Relese Show
    public function getEventRelese(Request $request, $id){
        $data['name']=$name = $request->input('name');
        $event = Event::query();
        if($id != 'allevent'){
            $event =$event->where('release_id',$id);
        }
        if($request->cat_id != 0){
            $event =$event->where('category_id',$id);
        }
        if($request->search != ""){
            $event =$event->where('name','like','%'.request()->search.'%');
        }
        $data['events']=$event->get();
        return view('Frontend.pages.eventreleaseajax',$data);
    }

    public function blog(Request $request)
    {

        $category ="";

        $data['search']=$search = $request->input('search');
        if(isset(request()->search)){
            $data["blogs"] = Blog::where('title','like','%'.request()->search.'%')
            ->orWhere('author','like','%'.$request->search.'%')
            ->get();
            $data["categories"] = Category::where('parent_id', '=' ,0)->where('type', 'blog')->get();
             $data['banner']= Banner::where('type','blog')->where('status',1)->orderBy('id','desc')->first();
        }
        // else if(isset($request->category)){
        //     $data['blogs'] = Blog::leftJoin('categories','categories.id','blogs.category_id')
        //     ->where('blogs.category_id','like','%'.$request->category.'%')
        //     ->get();
        //     $data["categories"] = Category::where('parent_id', '=' ,0)->where('type', 'blog')->get();

        // }
        else{
            $data['blogs'] = Blog::where('status', 1)->get();
            $data["categories"] = Category::where('parent_id', '=' ,0)->where('type', 'blog')->get();
            $data['banner']= Banner::where('type','blog')->where('status',1)->orderBy('id','desc')->first();
        }

        $data['category'] = $category;
        $data['topics'] = Topic::where('type', 'blog')->where('status', 1)->get();
         $data['banner']= Banner::where('type','blog')->where('status',1)->orderBy('id','desc')->first();
        return view('Frontend.pages.blog', $data);
    }
    public function blogDetails($id)
    {
        $blog = Blog::find($id);
        $blog->views = $blog->views + 1;
        $blog->save();
        $data['blog'] =$blog;
        $data['blogs'] = Blog::where('status', 1)->get();
        return view('Frontend.pages.blog_details', $data);
    }

///Blog search by category
    public function getBlogByCat(Request $request, $id){
        if($id == 0){
            $data['blogs'] = Blog::get();
        }else{
            $category=Category::find($id);


            if($category->sub->count() > 0){
                $cat_ids[]=$id;
                foreach($category->sub as $sub_cate){
                    $cat_ids[]=$sub_cate->id;
                }
                $data['blogs'] = Blog::whereIn('category_id',$cat_ids)->get();
            }else{
                $data['blogs'] = Blog::where('category_id',$id)->get();
            }

        }
        return view('Frontend.pages.blogcatajax',$data);
    }
///Blog search by sort by
    public function getBlogSortBy(Request $request, $id){
        if($id == 'like'){
            $data['blogs'] = Blog::withCount('likes')->orderByDesc('likes_count', 'id')->get();
        }else{
            $data['blogs'] = Blog::latest()->get();
        }
        return view('Frontend.pages.blog_sort_by_ajax',$data);
    }




    public function privacyPolicy()
    {
        $data['content'] = Page::where('template', 'privacy-policy')->first();
        return view('Frontend.pages.privacy_policy', $data);
    }
    public function refundPolicy()
    {
        $data['content'] = Page::where('template', 'refund-policy')->first();
        return view('Frontend.pages.refund_policy', $data);
    }
    public function termsConditions()
    {
        $data['content'] = Page::where('template', 'terms-conditions')->first();
        return view('Frontend.pages.terms_conditions', $data);
    }
    public function maestroClass()
    {
        $data['content'] = MaestroClassSetup::first();
        $data['categories']= Category::where('parent_id', '=' ,0)->where('type','master_course')->get();
        $data['master_courses'] = Course::where('type','course')->where('status', 1)->where('is_master', 1)->get();
        return view('Frontend.pages.maestro_class', $data);
    }
    public function maestroClassDetails($id)
    {
        $data['master_course'] = Course::find($id);
        $data['master_courses'] = Course::where('type','course')->where('status', 1)->where('is_master', 1)->get();
        return view('Frontend.pages.maestro_class_details', $data);
    }
    public function faq()
    {
        $data['faq_content'] = Faq::where('type', 'faq_content')->first();
        $data['faqs']=  Faq::where('type',"faq")->get();
        return view('Frontend.pages.faq', $data);
    }

    public function subscribeDetails()
    {
        //dd('hi');
       // $data['course'] = Course::find($id);
        $data['home_content'] = HomeContentSetup::first();
        return view('Frontend.pages.subscribe_details', $data);
    }
    public function topperStudent()
    {
        $data['toppers'] = TopperStudent::where('status', 1)->get();
        return view('Frontend.pages.topper_student', $data);
    }
    public function alumni()
    {
        $data['alumnis'] = User::where('is_alumni', 1)->where('type', 9)->where('status', 1)->get();
        return view('Frontend.alumni.index', $data);
    }



    // -------------------------------==============
    public function eBook(Request $request)
    {

        $data['title']=$title = $request->input('title');
        if(isset(request()->title)){
            // $data['banner']= Banner::where('type','ebook')->where('status',1)->orderBy('id','desc')->first();
            $data["categorys"] = Category::where('parent_id', '=' ,0)->where('type','ebook')->get();
            $data["ebooks"] = Ebook::where('type','ebook')->where('status',1)->where('title','like','%'.request()->title.'%')->get();
            $data['banner']= Banner::where('type','ebook')->where('status',1)->orderBy('id','desc')->first();
        }else{
            // $data['banner']= Banner::where('type','ebook')->where('status',1)->orderBy('id','desc')->first();
            $data["categorys"] = Category::where('parent_id', '=' ,0)->where('type','ebook')->get();
            $data['ebooks'] = Ebook::where('type','ebook')->where('status', 1)->get();
            $data['banner']= Banner::where('type','ebook')->where('status',1)->orderBy('id','desc')->first();
        }
        return view('Frontend.ebook.ebook_list', $data);
    }

    public function eBookDetails($id)
    {
        $data['ebook'] = Ebook::find($id);
        return view('Frontend.ebook.ebook_details', $data);
    }

    public function getEbookByCat(Request $request, $id)
    {
        $data['title']=$name = $request->input('title');
        if($id == 0){
            $data['ebooks'] = Ebook::where('status',1)->get();
        }else{
            $data['ebooks'] = Ebook::where('status',1)->where('category_id',$id)->get();
        }

        return view('Frontend.ebook.ebookcatajax',$data);
    }

    public function eBookDownload($id)
    {
        $data['ebook'] = Ebook::find($id);
        // return view('Frontend.ebook.ebook_pdf_download', $data);
        $html = view('Frontend.ebook.ebook_pdf_download', $data);
        $mpdf = new Mpdf([
            'mode' => 'UTF-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);

        //For Multilanguage Start
        $mpdf->autoScriptToLang = true;
        $mpdf->baseScript = 1;
        $mpdf->autoLangToFont = true;
        $mpdf->autoVietnamese = true;
        $mpdf->autoArabic = true;

        //For Multilanguage End
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->writeHTML($html);
        $name = 'Purchase E-Book_ ' . date('Y-m-d i:h:s');
        $mpdf->Output($name.'.pdf', 'D');
    }


    public function eBookVideoDownload($id)
    {

        $ebook = Ebook::findOrFail($id);
        $files = EbookVideoContent::where('ebook_id', $ebook->id)->get();

        $zipFileName = $ebook->title . '_eBook_videos.zip';
        $zip = new ZipArchive();

        $zip->open(public_path('upload/ebook/video/' . $zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE);

        foreach ($files as $file) {
            $videoPath = public_path('upload/ebook/video/' . $file->video_file);
            // dd($videoPath);
            if(File::exists($videoPath)){
                $zip->addFile($videoPath, $file->video_file);
            }else{
                return redirect()->back();
            }

        }

        $zip->close();

        return response()->download(public_path('upload/ebook/video/' . $zipFileName))->deleteFileAfterSend(true);

    }
    public function eBookAudioDownload($id)
    {

        $ebook = Ebook::findOrFail($id);
        $files = EbookAudioContent::where('ebook_id', $ebook->id)->get();

        $zipFileName = $ebook->title . '_eBook_audio.zip';
        $zip = new ZipArchive();

        $zip->open(public_path('upload/ebook/audio/' . $zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE);

        foreach ($files as $file) {
            $audioPath = public_path('upload/ebook/audio/' . $file->audio_file);
            // dd($audioPath);
            if(File::exists($audioPath)){
                $zip->addFile($audioPath, $file->audio_file);
            }else{
                return redirect()->back();
            }

        }

        $zip->close();

        return response()->download(public_path('upload/ebook/audio/' . $zipFileName))->deleteFileAfterSend(true);

    }


    //ebook audio start
    public function eBookAudio(Request $request)
    {

        $data['title']=$title = $request->input('title');
        if(isset(request()->title)){
            $data["categorys"] = Category::where('parent_id', '=' ,0)->where('type','ebook')->get();
            $data["ebooks"] = Ebook::where('type','ebookaudio')->where('status',1)->where('title','like','%'.request()->title.'%')->paginate(9);
            $data['banner']= Banner::where('type','e-audio')->where('status',1)->orderBy('id','desc')->first();
        }else{
            $data["categorys"] = Category::where('parent_id', '=' ,0)->where('type','ebook')->get();
            $data['ebooks'] = Ebook::where('type','ebookaudio')->where('status', 1)->paginate(9);
            $data['banner']= Banner::where('type','e-audio')->where('status',1)->orderBy('id','desc')->first();
        }
        return view('Frontend.ebookaudio.ebook_audio_list', $data);
    }

    public function eBookAudioDetails($id)
    {
        //dd('hi');
        $data['ebook'] = Ebook::find($id);
        return view('Frontend.ebookaudio.ebook_audio_details', $data);
    }

    public function getEbookAudioByCat(Request $request, $id)
    {
        $data['title']=$name = $request->input('title');
        if($id == 0){
            $data['ebooks'] = Ebook::where('type','ebookaudio')->where('status',1)->get();
        }else{
            $data['ebooks'] = Ebook::where('type','ebookaudio')->where('status',1)->where('category_id',$id)->get();
        }

        return view('Frontend.ebookaudio.ebookaudiocatajax',$data);
    }

    public function eAudioDownload($id)
    {

        $ebook = Ebook::findOrFail($id);
        $files = EbookAudioContent::where('ebook_id', $ebook->id)->get();

        $zipFileName = $ebook->title . '_eBook_audio.zip';
        $zip = new ZipArchive();

        $zip->open(public_path('upload/ebook/audio/' . $zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE);

        foreach ($files as $file) {
            $audioPath = public_path('upload/ebook/audio/' . $file->audio_file);
            // dd($audioPath);
            if(File::exists($audioPath)){
                $zip->addFile($audioPath, $file->audio_file);
            }else{
                return redirect()->back();
            }

        }

        $zip->close();

        return response()->download(public_path('upload/ebook/audio/' . $zipFileName))->deleteFileAfterSend(true);

    }
    //ebook audio end


     //Daily Class Video start
     public function dailyClass(Request $request)
     {
        $data['class_name']=$class_name = $request->input('class_name');
        if(isset(request()->class_name)){
            $data['classLists']= Classe::where('status',1)->orderBy('id','asc')->get();
            $data["classes"] = Classe::withCount('dailyClasses')->where('status',1)->where('name','like','%'.request()->class_name.'%')->paginate();
            $data['banner']= Banner::where('type','daily_class')->where('status',1)->orderBy('id','desc')->first();
        }else{
            $data['classes']= Classe::withCount('dailyClasses')->where('status',1)->orderBy('id','asc')->paginate(8);
            $data['classLists']= Classe::where('status',1)->orderBy('id','asc')->get();
            $data['banner']= Banner::where('type','daily_class')->where('status',1)->orderBy('id','desc')->first();
        }
        return view('Frontend.daily_class_video.daily_class_list', $data);
     }

     public function getDailyClassShowMore()
     {
        $data['classes']= Classe::where('status',1)->orderBy('id','asc')->paginate(8);
         return view('Frontend.daily_class_video.daily_class_list_show_more',$data);
     }

     public function dailyClassVideoDetails($id)
     {
        //dd('hi');
        $data['class'] = Classe::find($id);
        return view('Frontend.daily_class_video.daily_class_video_details', $data);
     }

     public function getDailyClassVideoSearch(Request $request)
     {
        
        $subjectId = $request->input('subject_id');
        $classId = $request->input('class_id');
        $formDate = $request->input('form_date');
        $toDate = $request->input('to_date');
    
        $query = DailyClass::query();
    
        if ($subjectId) {
            $query->where('class_id',$classId)->where('subject_id', $subjectId);
        }
    
        if ($formDate && !$toDate) {
            $query->where('class_id',$classId)->whereDate('created_at', '=', $formDate);
        } elseif ($formDate && $toDate) {
            $query->where('class_id',$classId)->whereBetween('created_at', [$formDate, $toDate]);
        }

        $data['dailyClasses'] = $query->get();
    
        return view('Frontend.daily_class_video.daily_class_video_search', $data);
     }

     public function getDailyClassVideoShowMore(Request $request){
        // $data['dailyClasses']= DailyClass::where('status',1)->orderBy('id','asc')->get();
        //  return view('Frontend.course.ajaxseecourse',$data);
        $page = $request->input('page', 1);
        $classId = $request->input('class_id');
        $class = Classe::findOrFail($classId);
        $data['dailyClasses']=$dailyClasses = $class->dailyClasses()->paginate(10, ['*'], 'page', $page);
         return view('Frontend.daily_class_video.daily_class_video_show_more', $data);
     }

    //  public function eVideoDownload($id)
    //  {

    //      $ebook = Ebook::findOrFail($id);
    //      $files = EbookAudioContent::where('ebook_id', $ebook->id)->get();

    //      $zipFileName = $ebook->title . '_eBook_audio.zip';
    //      $zip = new ZipArchive();

    //      $zip->open(public_path('upload/ebook/audio/' . $zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE);

    //      foreach ($files as $file) {
    //          $audioPath = public_path('upload/ebook/audio/' . $file->audio_file);
    //          // dd($audioPath);
    //          if(File::exists($audioPath)){
    //              $zip->addFile($audioPath, $file->audio_file);
    //          }else{
    //              return redirect()->back();
    //          }

    //      }

    //      $zip->close();

    //      return response()->download(public_path('upload/ebook/audio/' . $zipFileName))->deleteFileAfterSend(true);

    //  }

    //Daily Class Video end

     //gallery start
     public function gallery(Request $request)
     {
        $data['gallerys'] = Gallery::where('status',1)->orderBy('id','desc')->paginate(16);
        return view('Frontend.gallery.gallery_list', $data);
     }

     //ajax get Gallery
    public function getGallery(){
        $data['gallerys'] = Gallery::where('status',1)->orderBy('id','desc')->paginate(8);
        return view('Frontend.gallery.ajax_see_gallery',$data);
    }

     

     //notice start
     public function notice(Request $request)
     {
        $data['search']=$search = $request->input('search');
        if($search){
            $data['notices'] = Notice::where('status',1)->where('noticetype_id', 'like', '%' . $search . '%')->paginate();
            $data['noticeTypes'] = NoticeType::orderBy('id', 'desc')->get();
        }else{
            $data['notices'] = Notice::where('status',1)->orderBy('id','desc')->paginate(15); 
            $data['noticeTypes'] = NoticeType::orderBy('id', 'desc')->get();
        }
        
         return view('Frontend.notice.notice_list', $data);
     }

    //  public function noticeDetails(Request $request,$id)
    //  {
    //      $data['notice'] = Notice::find($id);
    //      $data['notices'] = Notice::where('status',1)->orderBy('id','desc')->get();
    //      return view('Frontend.notice.notice_details', $data);
    //  }

    
     public function noticePdfDownload(Request $request,$id)
     {
        $notice = Notice::findOrFail($id);
        if ($notice->notice_file) {
            $filePath = public_path('upload/notice_file/'.$notice->notice_file);
            if (file_exists($filePath)) {
                return response()->download($filePath, $notice->notice_file);
            }
        }
        return redirect()->back();
     }

     //ajax get notice
    //  public function getNotice(){
    //     $data['notices'] = Notice::where('status',1)->orderBy('id','desc')->paginate(4); 
    //     return view('Frontend.notice.ajax_see_notice',$data);
    // }


     public function courseResourceFilesDownload($id)
    {

        $course = Course::findOrFail($id);
        $files = CourseResourceFile::where('course_id', $course->id)->get();

        $zipFileName = $course->name .'_CourseResourceFile.zip';
        $zip = new ZipArchive();
        $zip->open(public_path('upload/course/file/' . $zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE);

        foreach ($files as $file) {
            $filepath = public_path('upload/course/file/' . $file->name);
            // dd($videoPath);
            if(File::exists($filepath)){
                $zip->addFile($filepath, $file->name);
            }else{
                return redirect()->back();
            }
        }

        $zip->close();

        return response()->download(public_path('upload/course/file/' . $zipFileName))->deleteFileAfterSend(true);

    }


    public function courseLessonFilesDownload($id)
    {

        $course = Course::findOrFail($id);
        $files = CourseLessonFile::where('course_id', $course->id)->get();

        $zipFileName = $course->name .'_CourseLessonFile.zip';
        $zip = new ZipArchive();

        $zip->open(public_path('upload/course/file/' . $zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE);

        foreach ($files as $file) {
            $filepath = public_path('upload/course/file/' . $file->name);
            // dd($videoPath);
            if(File::exists($filepath)){
                $zip->addFile($filepath, $file->name);
            }else{
                return redirect()->back();
            }

        }

        $zip->close();

        return response()->download(public_path('upload/course/file/' . $zipFileName))->deleteFileAfterSend(true);

    }


    public function courseQuizFilesDownload($id)
    {

        $course = Course::findOrFail($id);
        $files = CourseQuizFile::where('course_id', $course->id)->get();

        $zipFileName = $course->name .'_CourseQuizFile.zip';
        $zip = new ZipArchive();

        $zip->open(public_path('upload/course/file/' . $zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE);

        foreach ($files as $file) {
            $filepath = public_path('upload/course/file/' . $file->name);
            // dd($videoPath);
            if(File::exists($filepath)){
                $zip->addFile($filepath, $file->name);
            }else{
                return redirect()->back();
            }

        }

        $zip->close();

        return response()->download(public_path('upload/course/file/' . $zipFileName))->deleteFileAfterSend(true);

    }


    public function courseProjectFilesDownload($id)
    {

        $course = Course::findOrFail($id);
        $files = CoursezprojectFile::where('course_id', $course->id)->get();

        $zipFileName = $course->name .'_CoursezprojectFile.zip';
        $zip = new ZipArchive();

        $zip->open(public_path('upload/course/file/' . $zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE);

        foreach ($files as $file) {
            $filepath = public_path('upload/course/file/' . $file->name);
            // dd($videoPath);
            if(File::exists($filepath)){
                $zip->addFile($filepath, $file->name);
            }else{
                return redirect()->back();
            }

        }

        $zip->close();

        return response()->download(public_path('upload/course/file/' . $zipFileName))->deleteFileAfterSend(true);

    }

    public function universityCourseList(Request $request)
    {
        $courses =  Course::query();
        $data['univerties']=$univerties= University::withCount('courses')->get();
        // $data['continents']=$continents= Continent::withCount('universities')->get();
        $data['countries']=$countries= Country::withCount('universities')->get();
        $data['states']=$states= State::withCount('universities')->get();
        $data['cities']=$cities= City::withCount('universities')->get();
        $data['degrees']=$degrees= Degree::withCount('courses')->get();
        $data['languages']=$language= CourseLanguage::withCount('courses')->where('type','university')->get();
        $data['departments']=$departments= Department::withCount('courses')->get();
        $data['sections'] =$sections= Section::withCount('courses')->orderBy('id', 'desc')->get();
        $data['continents']=$continents= Continent::withCount('universities')->get();


        if($request->university){
            $courses= $courses->where('university_id',$request->university);
        }

        if($request->sortBy){
            if($request->sortBy == 'top_pick'){
                $courses=$courses->orderBy('views','desc');
            }
            // elseif($request->sortBy == 'most_popular'){
            //    $courses=$courses->orderBy('views','desc');
            // }elseif($request->sortBy == 'fastest_admission'){
            //     $courses=$courses->orderBy('views','desc');
            //  }elseif($request->sortBy == 'highest_rating'){
            //     $courses=$courses->orderBy('views','desc');
            //  }elseif($request->sortBy == 'top_ranked'){
            //     $courses=$courses->orderBy('views','desc');
            //  }

        }else{
            $courses=$courses->orderBy('views','desc');
        }

        $data['courses']=$courses=$courses->where('type','university')->paginate(10);

        return view('Frontend.university.university_course_list',$data);
    }

    public function ajaxFilterCourse(Request $request)
    {
        //return $request->all();
        $courses =  Course::query();
         //op st
        $data['univerties']=$univerties= University::get();
        //op end

        $data['degrees']=$degrees= Degree::get();
        $data['languages']=$language= CourseLanguage::where('type','university')->get();
        $data['departments']=$departments= Department::get();
        $data['sections'] =$sections= Section::orderBy('id', 'desc')->get();



        $data['continents']=$continents = Continent::withCount('universities')->where('status', 1)->get();
        $univerties= University::where('status', 1);

        if(request()->input('continent')){
            $univerties= $univerties->where('continent_id',request()->input('continent'));
            $select_continent= request()->input('continent');
        }else{
            $select_continent=  0;
        }


        if(request()->input('country')){
            $univerties= $univerties->where('country_id',request()->input('country'));
            $select_country= Country::find(request()->input('country'));
            if($select_continent == 0){
                $select_continent = $select_country->continent->id;
                $select_country =  $select_country->id;
            }else{
                $select_country =  $select_country->id;
            }
        }else{
            $select_country=  0;
        }
        $data['countries']=$countries = Country::withCount('university')->where('continent_id',$select_continent)->where('status', 1)->get();


        if(request()->input('state')){
            $univerties= $univerties->where('state_id',request()->input('state'));

            $select_state= State::find(request()->input('state'));
            if($select_country == 0){
                $select_country = $select_state->country->id;
                $select_state =  $select_state->id;
            }else{
                $select_state =  $select_state->id;
            }
        }else{
            $select_state=  0;
        }
        $data['states']=$states = State::withCount('universities')->where('country_id',$select_country)->where('status', 1)->get();


        if(request()->input('city')){
            $univerties= $univerties->where('city_id',request()->input('city'));

            $select_city= City::find(request()->input('city'));
            if($select_state == 0){
                $select_state = $select_city->state->id;
                $select_city =  $select_city->id;
            }else{
                $select_city =  $select_city->id;
            }
        }else{
            $select_city=  0;
        }

        $data['cities']=$cities = City::withCount('universities')->where('state_id',$select_state)->where('status', 1)->get();


        $data['select_continent'] = $select_continent;
        $data['select_country'] = $select_country;
        $data['select_state'] = $select_state;
        $data['select_city'] = $select_city;
        $data['universities'] = $univerties->get();

        $selected_university=0;
        $selected_degree=0;
        $selected_language=0;
        $selected_section=0;
        $selected_subject=0;
        // op st
        // $selected_univerties=0;
        //op end
        if($request->university){
            $courses = $courses->where('university_id',$request->university);

        }else{
            $courses = $courses->whereIn('university_id',$univerties->pluck('id'));

        }

        // op st
        if($request->university){
            $courses= $courses->where('university_id',$request->university);
            $selected_university=$request->university;
        }
        //op end

        if($request->degree){
            $courses= $courses->where('degree_id',$request->degree);
            $selected_degree=$request->degree;
        }

        if($request->language){
            $courses= $courses->where('language_id',$request->language);
            $selected_language=$request->language;
        }
        if($request->section){
            $courses= $courses->where('section_id',$request->section);
            $selected_section=$request->section;
        }
        if($request->subject){
            $courses= $courses->where('department_id',$request->subject);
            $selected_subject=$request->subject;
        }

        if($request->sortBy){
            if($request->sortBy == 'top_pick'){
                $courses=$courses->orderBy('views','desc');
            }

        }else{
            $courses=$courses->orderBy('views','desc');
        }
        // op st
        // $data['selected_univerties']=$selected_univerties;
       //op end
        $data['selected_degree'] =$selected_degree;
        $data['selected_language'] =$selected_language;
        $data['selected_section'] =$selected_section;
        $data['selected_subject'] =$selected_subject;
        $data['selected_university'] =$selected_university;
        $data['courses']=$courses=$courses->where('type','university')->paginate(10);
        //return $data;
        return view('Frontend.university.ajax-course-filter',$data);
    }

    //ajax get Sort Category Course
    public function getAjaxCourseList($cat){
    $data['courses'] = Course::where('coursetype',$cat)->orderBy('id', 'desc')->where('type','university')->get();
    return view('Frontend.university.course_list_ajax',$data);
    }


 // university end


 public function apply()
 {
    //dd('hi');
     return view('Frontend.university.apply');
 }



 public function programDetails($id){
    // dd('hi');
    $data['course'] =$course= Course::find($id);
    $course->views = $course->views + 1;
    $course->save();
    $continent = $course->university->continent_id;
 //    dd($continent);

    $data['consultant'] = User::where('continent_id', $continent)
                     ->where('type', 7)->where('status', 1)
                     ->first();
// dd($data);

     return view('Frontend.university.programs_details',$data);
 }


//  public function classDetails($id){
//     // dd($id);
//     $data['class'] =$classes= Classe::find($id);
//      return view('Frontend.class.class_details',$data);
//  }


 public function classDetails($id){
    $data['class'] =$class= Classe::find($id);

    $data['tpOption'] = Tp_option::where('option_name', 'theme_option_header')->first();

    $session = Session::where('is_current', 1)->first();
    $sessionId = $session->id;
    // dd($session);
    // Fetching all examinations for the current session
    $examinations = Examination::where('session_id', $sessionId)->get();

    // Fetching syllabus for the student's class and for all examinations in the current session
    $data['syllabus'] =$syllabus= Syllabus::where('class_id', $class->id)
                                ->whereIn('examination_id', $examinations->pluck('id'))
                                ->get();
// dd($syllabus);
     return view('Frontend.class.class_details',$data);
 }

 public function bookListDownload($id)
 {
     $data['class'] = Classe::find($id);
     // return view('Frontend.ebook.ebook_pdf_download', $data);
     $html = view('Frontend.class.class_list_pdf_download', $data);
     $mpdf = new Mpdf([
         'mode' => 'UTF-8',
         'margin_left' => 5,
         'margin_right' => 5,
         'margin_top' => 5,
         'margin_bottom' => 0,
         'margin_header' => 0,
         'margin_footer' => 0,
     ]);

     //For Multilanguage Start
     $mpdf->autoScriptToLang = true;
     $mpdf->baseScript = 1;
     $mpdf->autoLangToFont = true;
     $mpdf->autoVietnamese = true;
     $mpdf->autoArabic = true;

     //For Multilanguage End
     $mpdf->setAutoTopMargin = 'stretch';
     $mpdf->setAutoBottomMargin = 'stretch';
     $mpdf->writeHTML($html);
     $name = 'class_list_pdf_download ' . date('Y-m-d i:h:s');
     $mpdf->Output($name.'.pdf', 'D');
 }

 public function classRoutineDownload(Request $request)
 {
    // dd('hi');
    $class_id= $request->input('class_id');
    $section_id= $request->input('section_id');

    //current session
    $session = Session::where('is_current', 1)->first();
    $sessionId = $session->id;

    $data['class_routine'] = ClassRoutine::where('class_id',$class_id)
                                        ->where('section_id',$section_id)
                                        ->where('session_id',$sessionId)
                                        ->orderBy('day_id','asc')
                                        ->orderBy('class_duration_id', 'asc')
                                        ->get();
    // $data['class_routine'] = ClassRoutine::where('class_id',$class_id)->where('section_id',$section_id)->get();
    //  return view('Frontend.class.class_routine_pdf_download', $data);
     $html = view('Frontend.class.class_routine_pdf_download', $data);
     $mpdf = new Mpdf([
         'mode' => 'UTF-8',
         'margin_left' => 5,
         'margin_right' => 5,
         'margin_top' => 5,
         'margin_bottom' => 0,
         'margin_header' => 0,
         'margin_footer' => 0,
     ]);

     //For Multilanguage Start
     $mpdf->autoScriptToLang = true;
     $mpdf->baseScript = 1;
     $mpdf->autoLangToFont = true;
     $mpdf->autoVietnamese = true;
     $mpdf->autoArabic = true;

     //For Multilanguage End
     $mpdf->setAutoTopMargin = 'stretch';
     $mpdf->setAutoBottomMargin = 'stretch';
     $mpdf->writeHTML($html);
     $name = 'class_routine_pdf_download ' . date('Y-m-d i:h:s');
     $mpdf->Output($name.'.pdf', 'D');
 }

 public function examRoutineDownload(Request $request)
 {
    // dd('hi');
   $class_id= $request->input('class_id');
   
   $data['class']=Classe::find($request->input('class_id'));

    //current session
    $session = Session::where('is_current', 1)->first();
    $sessionId = $session->id;
    $examinations = Examination::where('session_id', $sessionId)->get();
    $data['examSchedules'] = $examSchedule = ExamSchedule::where('class_id', $class_id)
                                            ->whereIn('examination_id', $examinations->pluck('id'))
                                            ->get()
                                            ->filter(function ($routine) {
    return $routine->examination && $routine->examination->end_date >= Carbon::now();

    }); 

    //  return view('Frontend.class.exam_routine_pdf_download', $data);
     $html = view('Frontend.class.exam_routine_pdf_download', $data);
     $mpdf = new Mpdf([
         'mode' => 'UTF-8',
         'margin_left' => 5,
         'margin_right' => 5,
         'margin_top' => 5,
         'margin_bottom' => 0,
         'margin_header' => 0,
         'margin_footer' => 0,
     ]);

     //For Multilanguage Start
     $mpdf->autoScriptToLang = true;
     $mpdf->baseScript = 1;
     $mpdf->autoLangToFont = true;
     $mpdf->autoVietnamese = true;
     $mpdf->autoArabic = true;

     //For Multilanguage End
     $mpdf->setAutoTopMargin = 'stretch';
     $mpdf->setAutoBottomMargin = 'stretch';
     $mpdf->writeHTML($html);
     $name = 'exam_routine_pdf_download ' . date('Y-m-d i:h:s');
     $mpdf->Output($name.'.pdf', 'D');
 }


//syllabus Download frontend
 public function syllabusDownload(Request $request)
 {
   $class= $request->input('class_id');
   $data['class']=Classe::find($request->input('class_id'));
   $session = Session::where('is_current', 1)->first();
   $sessionId = $session->id;
   $examinations = Examination::where('session_id', $sessionId)->get();
   $data['syllabus'] =$syllabus= Syllabus::where('class_id', $class)
                               ->whereIn('examination_id', $examinations->pluck('id'))
                               ->get();

    //  return view('Frontend.class.syllabus_pdf_download', $data);
     $html = view('Frontend.class.syllabus_pdf_download', $data);
     $mpdf = new Mpdf([
         'mode' => 'UTF-8',
         'margin_left' => 5,
         'margin_right' => 5,
         'margin_top' => 5,
         'margin_bottom' => 0,
         'margin_header' => 0,
         'margin_footer' => 0,
     ]);

     //For Multilanguage Start
     $mpdf->autoScriptToLang = true;
     $mpdf->baseScript = 1;
     $mpdf->autoLangToFont = true;
     $mpdf->autoVietnamese = true;
     $mpdf->autoArabic = true;

     //For Multilanguage End
     $mpdf->setAutoTopMargin = 'stretch';
     $mpdf->setAutoBottomMargin = 'stretch';
     $mpdf->writeHTML($html);
     $name = 'syllabus_pdf_download ' . date('Y-m-d i:h:s');
     $mpdf->Output($name.'.pdf', 'D');
 }












 public function allClassListShow(){
    // dd($id);
    $data['home_content'] = HomeContentSetup::first();
    $data['classLists'] = Classe::orderBy('id','asc')->get();
     return view('Frontend.class.class_list_show',$data);
 }





}
