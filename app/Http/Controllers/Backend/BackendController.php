<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Appointment;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Brand;
use App\Models\Bulding;
use App\Models\Classe;
use App\Models\Client;
use App\Models\Course;
use App\Models\DailyClass;
use App\Models\Ebook;
use App\Models\Event;
use App\Models\Floor;
use App\Models\Group;
use App\Models\Notice;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Package;
use App\Models\Partner;
use App\Models\Review;
use App\Models\Room;
use App\Models\Section;
use App\Models\ServiceBooking;
use App\Models\Subject;
use App\Models\Subscriber;
use App\Models\Testimonial;
use App\Models\University;
use App\Models\User;
use Carbon\Carbon;
use App\Models\VisitorModel;
use PHPUnit\Framework\Constraint\Count;

class BackendController extends Controller
{
    /****
     *
     * Method For Amdin View
     *
     * ***/

    public function index(){
      //  dd(auth()->guard("admin")->user()->role->permissions->where('permission.group_txt',"Home"));
      $today = [];
      $week = [];
      $month = [];
      $year = [];

      ///day count
      $today['total_visitor'] = VisitorModel::whereDate('created_at', Carbon::today())->count();
      $today['total_student'] = Admission::where('is_new', 0)->whereDate('created_at', Carbon::today())->count();
      $today['total_admission'] = Admission::where('is_new', 1)->whereDate('created_at', Carbon::today())->count();
      $today['total_teachers'] = User::where('type', 2)->whereDate('created_at', Carbon::today())->count();
      $today['total_staff'] = User::where('type', 8)->whereDate('created_at', Carbon::today())->count();
      // $today['total_bulding'] = Bulding::whereDate('created_at', Carbon::today())->count();
      // $today['total_floor'] = Floor::whereDate('created_at', Carbon::today())->count();
      // $today['total_room'] = Room::whereDate('created_at', Carbon::today())->count();
      $today['total_class'] = Classe::whereDate('created_at', Carbon::today())->count();
      $today['total_group'] = Group::whereDate('created_at', Carbon::today())->count();
      $today['total_section'] = Section::whereDate('created_at', Carbon::today())->count();
      $today['total_subject'] = Subject::whereDate('created_at', Carbon::today())->count();
      $today['total_daily_class'] = DailyClass::whereDate('created_at', Carbon::today())->count();
      $today['total_library_book'] = Book::whereDate('created_at', Carbon::today())->count();
      $today['total_notice'] = Notice::whereDate('created_at', Carbon::today())->count();
      $today['total_ebook'] = Ebook::whereDate('created_at', Carbon::today())->count();
      $today['total_subscriber'] = Subscriber::whereDate('created_at', Carbon::today())->count();
      $today['total_testimonial'] = Testimonial::whereDate('created_at', Carbon::today())->count();
      $today['total_event'] = Event::whereDate('created_at', Carbon::today())->count();
      $today['total_blog'] = Blog::whereDate('created_at', Carbon::today())->count();
      $today['total_partner'] = Partner::whereDate('created_at', Carbon::today())->count();
      $today['total_media_partner'] = Client::whereDate('created_at', Carbon::today())->count();
      // $today['total_customer'] = User::whereDate('created_at', Carbon::today())->where('type', 1)->count();
   




      ///week count
      $week['total_visitor'] = VisitorModel::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_student'] = Admission::where('is_new', 0)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_admission'] = Admission::where('is_new', 1)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_teachers'] = User::where('type', 2)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_staff'] = User::where('type', 8)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_class'] = Classe::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_group'] = Group::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_section'] = Section::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_subject'] = Subject::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_daily_class'] = DailyClass::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_library_book'] = Book::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_notice'] = Notice::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      // $week['total_customer'] = User::where('type', 1)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_event'] = Event::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_blog'] = Blog::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_subscriber'] = Subscriber::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_testimonial'] = Testimonial::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_partner'] = Partner::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_media_partner'] = Client::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_ebook'] = Ebook::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();




      //month count
      $month['total_visitor'] = VisitorModel::whereMonth('created_at', now()->month)->count();
      $month['total_student'] = Admission::where('is_new', 0)->whereMonth('created_at', now()->month)->count();
      $month['total_admission'] = Admission::where('is_new', 1)->whereMonth('created_at', now()->month)->count();
      $month['total_teachers'] = User::where('type', 2)->whereMonth('created_at', now()->month)->count();
      $month['total_staff'] = User::where('type', 8)->whereMonth('created_at', now()->month)->count();
      $month['total_class'] = Classe::whereMonth('created_at', now()->month)->count();
      $month['total_group'] = Group::whereMonth('created_at', now()->month)->count();
      $month['total_section'] = Section::whereMonth('created_at', now()->month)->count();
      $month['total_subject'] = Subject::whereMonth('created_at', now()->month)->count();
      $month['total_daily_class'] = DailyClass::whereMonth('created_at', now()->month)->count();
      $month['total_library_book'] = Book::whereMonth('created_at', now()->month)->count();
      $month['total_notice'] = Notice::whereMonth('created_at', now()->month)->count();
      // $month['total_customer'] = User::where('type', 1)->whereMonth('created_at', now()->month)->count();
      $month['total_event'] = Event::whereMonth('created_at', now()->month)->count();
      $month['total_blog'] = Blog::whereMonth('created_at', now()->month)->count();
      $month['total_subscriber'] = Subscriber::whereMonth('created_at', now()->month)->count();
      $month['total_testimonial'] = Testimonial::whereMonth('created_at', now()->month)->count();
      $month['total_partner'] = Partner::whereMonth('created_at', now()->month)->count();
      $month['total_media_partner'] = Client::whereMonth('created_at', now()->month)->count();
      $month['total_ebook'] = Ebook::whereMonth('created_at', now()->month)->count();

    


      //year count
      $year['total_visitor'] = VisitorModel::whereYear('created_at', now()->year)->count();
      $year['total_student'] = Admission::where('is_new', 0)->whereYear('created_at', now()->year)->count();
      $year['total_admission'] = Admission::where('is_new', 1)->whereYear('created_at', now()->year)->count();
      $year['total_teachers'] = User::where('type', 2)->whereYear('created_at', now()->year)->count();
      $year['total_staff'] = User::where('type', 8)->whereYear('created_at', now()->year)->count();
      $year['total_class'] = Classe::whereYear('created_at', now()->year)->count();
      $year['total_group'] = Group::whereYear('created_at', now()->year)->count();
      $year['total_section'] = Section::whereYear('created_at', now()->year)->count();
      $year['total_subject'] = Subject::whereYear('created_at', now()->year)->count();
      $year['total_daily_class'] = DailyClass::whereYear('created_at', now()->year)->count();
      $year['total_library_book'] = Book::whereYear('created_at', now()->year)->count();
      $year['total_notice'] = Notice::whereYear('created_at', now()->year)->count();
      // $year['total_customer'] = User::where('type', 1)->whereYear('created_at', now()->year)->count();
      $year['total_event'] = Event::whereYear('created_at', now()->year)->count();
      $year['total_blog'] = Blog::whereYear('created_at', now()->year)->count();
      $year['total_subscriber'] = Subscriber::whereYear('created_at', now()->year)->count();
      $year['total_testimonial'] = Testimonial::whereYear('created_at', now()->year)->count();
      $year['total_partner'] = Partner::whereYear('created_at', now()->year)->count();
      $year['total_media_partner'] = Client::whereYear('created_at', now()->year)->count();
      $year['total_ebook'] = Ebook::whereYear('created_at', now()->year)->count();

        return view('Backend.index', compact('today', 'week', 'month', 'year'));
    }


    /****
     *
     * Method For Seller View
     *
     * ***/

    public function seller(){
        return view('Seller.pages.index');
    }

    /****
     *
     *  Method For Driver View
     *
     * ***/

    public function driver(){
        return view('Driver.pages.index');
    }

    /****
     * Method For Hr Manager View
     *
     * ***/

    public function hrmanager(){
        return view('HrManager.pages.index');
    }

    /****
     *
     * Method For Doctor View *
     *
     ****/

    public function doctor(){
        return view('Doctor.pages.index');
    }

    /****
     * Method For Nurse View
     *
     * ***/

    public function nurse(){
        return view('Nurse.pages.index');
    }

}
