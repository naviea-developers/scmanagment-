<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Client;
use App\Models\Course;
use App\Models\Ebook;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Package;
use App\Models\Partner;
use App\Models\Review;
use App\Models\ServiceBooking;
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
      $today['total_order'] = Order::whereDate('created_at', Carbon::today())->count();
      $today['total_general_course'] = Course::whereDate('created_at', Carbon::today())->where('type', 'course')->where('is_master', 0)->count();
      $today['total_master_course'] = Course::whereDate('created_at', Carbon::today())->where('type', 'course')->where('is_master', 1)->count();
      $today['total_customer'] = User::whereDate('created_at', Carbon::today())->where('type', 1)->count();
      $today['total_teacher'] = User::whereDate('created_at', Carbon::today())->where('type', 2)->count();
      $today['total_instructor'] = User::whereDate('created_at', Carbon::today())->where('type', 3)->count();
      $today['total_host'] = User::whereDate('created_at', Carbon::today())->where('type', 4)->count();
      $today['total_seller'] = User::whereDate('created_at', Carbon::today())->where('type', 5)->count();
      $today['total_affiliate'] = User::whereDate('created_at', Carbon::today())->where('type', 6)->count();
      $today['total_event'] = Event::whereDate('created_at', Carbon::today())->count();
      $today['total_blog'] = Blog::whereDate('created_at', Carbon::today())->count();
      $today['total_subscriber'] = Subscriber::whereDate('created_at', Carbon::today())->count();
      $today['total_testimonial'] = Testimonial::whereDate('created_at', Carbon::today())->count();
      $today['total_review'] = Review::whereDate('created_at', Carbon::today())->count();
      $today['total_partner'] = Partner::whereDate('created_at', Carbon::today())->count();
      $today['total_media_partner'] = Client::whereDate('created_at', Carbon::today())->count();
      $today['total_ebook'] = Ebook::whereDate('created_at', Carbon::today())->count();
      $today['total_universities'] = University::whereDate('created_at', Carbon::today())->count();
      $today['total_programs'] = Course::whereDate('created_at', Carbon::today())->where('type', 'university')->count();
    //   $today['total_diagnostic'] = 0;
    //   $today['total_appointment'] = 0;
    //   $today['service_booking'] = 0;
    //   $today['total_brands'] = 0;


      ///week count
      $week['total_visitor'] = VisitorModel::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_order'] = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_general_course'] = Course::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('type', 'course')->where('is_master', 0)->count();
      $week['total_master_course'] = Course::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('type', 'course')->where('is_master', 1)->count();
      $week['total_customer'] = User::where('type', 1)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_teacher'] = User::where('type', 2)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_instructor'] = User::where('type', 3)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_host'] = User::where('type', 4)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_seller'] = User::where('type', 5)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_affiliate'] = User::where('type', 6)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_event'] = Event::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_blog'] = Blog::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_subscriber'] = Subscriber::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_testimonial'] = Testimonial::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_review'] = Review::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_partner'] = Partner::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_media_partner'] = Client::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_ebook'] = Ebook::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_universities'] = University::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
      $week['total_programs'] = Course::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('type', 'university')->count();
    //   $week['total_diagnostic'] = 0;
    //   $week['total_appointment'] = 0;
    //   $week['service_booking'] = 0;
    //   $week['total_brands'] = 0;


      //month count
      $month['total_visitor'] = VisitorModel::whereMonth('created_at', now()->month)->count();
      $month['total_order'] = Order::whereMonth('created_at', now()->month)->count();
      $month['total_general_course'] = Course::whereMonth('created_at', now()->month)->where('type', 'course')->where('is_master', 0)->count();
      $month['total_master_course'] = Course::whereMonth('created_at', now()->month)->where('type', 'course')->where('is_master', 1)->count();
      $month['total_customer'] = User::where('type', 1)->whereMonth('created_at', now()->month)->count();
      $month['total_teacher'] = User::where('type', 2)->whereMonth('created_at', now()->month)->count();
      $month['total_instructor'] = User::where('type', 3)->whereMonth('created_at', now()->month)->count();
      $month['total_host'] = User::where('type', 4)->whereMonth('created_at', now()->month)->count();
      $month['total_seller'] = User::where('type', 5)->whereMonth('created_at', now()->month)->count();
      $month['total_affiliate'] = User::where('type', 6)->whereMonth('created_at', now()->month)->count();
      $month['total_event'] = Event::whereMonth('created_at', now()->month)->count();
      $month['total_blog'] = Blog::whereMonth('created_at', now()->month)->count();
      $month['total_subscriber'] = Subscriber::whereMonth('created_at', now()->month)->count();
      $month['total_testimonial'] = Testimonial::whereMonth('created_at', now()->month)->count();
      $month['total_review'] = Review::whereMonth('created_at', now()->month)->count();
      $month['total_partner'] = Partner::whereMonth('created_at', now()->month)->count();
      $month['total_media_partner'] = Client::whereMonth('created_at', now()->month)->count();
      $month['total_ebook'] = Ebook::whereMonth('created_at', now()->month)->count();
      $month['total_universities'] = University::whereMonth('created_at', now()->month)->count();
      $month['total_programs'] = Course::whereMonth('created_at', now()->month)->where('type', 'university')->count();
    //   $month['total_diagnostic'] = 0;
    //   $month['total_appointment'] = 0;
    //   $month['service_booking'] = 0;
    //   $month['total_brands'] = 0;

    
      //year count
      $year['total_visitor'] = VisitorModel::whereYear('created_at', now()->year)->count();
      $year['total_order'] = Order::whereYear('created_at', now()->year)->count();
      $year['total_general_course'] = Course::whereYear('created_at', now()->year)->where('type', 'course')->where('is_master', 0)->count();
      $year['total_master_course'] = Course::whereYear('created_at', now()->year)->where('type', 'course')->where('is_master', 1)->count();
      $year['total_customer'] = User::where('type', 1)->whereYear('created_at', now()->year)->count();
      $year['total_teacher'] = User::where('type', 2)->whereYear('created_at', now()->year)->count();
      $year['total_instructor'] = User::where('type', 3)->whereYear('created_at', now()->year)->count();
      $year['total_host'] = User::where('type', 4)->whereYear('created_at', now()->year)->count();
      $year['total_seller'] = User::where('type', 5)->whereYear('created_at', now()->year)->count();
      $year['total_affiliate'] = User::where('type', 6)->whereYear('created_at', now()->year)->count();
      $year['total_event'] = Event::whereYear('created_at', now()->year)->count();
      $year['total_blog'] = Blog::whereYear('created_at', now()->year)->count();
      $year['total_subscriber'] = Subscriber::whereYear('created_at', now()->year)->count();
      $year['total_testimonial'] = Testimonial::whereYear('created_at', now()->year)->count();
      $year['total_review'] = Review::whereYear('created_at', now()->year)->count();
      $year['total_partner'] = Partner::whereYear('created_at', now()->year)->count();
      $year['total_media_partner'] = Client::whereYear('created_at', now()->year)->count();
      $year['total_ebook'] = Ebook::whereYear('created_at', now()->year)->count();
      $year['total_universities'] = University::whereYear('created_at', now()->year)->count();
      $year['total_programs'] = Course::whereYear('created_at', now()->year)->where('type', 'university')->count();
    //   $year['total_diagnostic'] = 0;
    //   $year['total_appointment'] = 0;
    //   $year['service_booking'] = 0;
    //   $year['total_brands'] = 0;

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
