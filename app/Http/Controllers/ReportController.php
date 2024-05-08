<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class ReportController extends Controller
{
    // View All Student

    public function viewAllStudent(){

        $user = DB::table('user')
        ->where('role' , 'student')
        ->leftjoin('student_infos' , 'student_infos.userId' , 'user.id')
        ->get();

        $attendance = DB::table('attendance')->get();

        return view('backend.report.studentReport', compact('user' , 'attendance'));
    }

    public function teachersReport(){
        // $cartData = DB::table('cart')->get();
        // $Data = DB::table('cart')->join('user', 'cart.userId', '=', 'user.id')
        // ->join('student_infos', 'cart.userId', '=', 'students.id')
        // ->select('carts.*', 'users.name as user_name', 'students.name as student_name')
        // ->get();
        // return view('backend.report.teacherReport',compact('Data'));
        return view('backend.report.teacherReport');

    }


    // public function searchreferrel(Request $request){
    //     $date = $request->date;
    //     $search = DB::table('cart')->where('created_at', 'LIKE', '%' . $date . '%')->get();
    //     return view('viewpage' , compact('search'));
    // }


    public function cartReport()
    {
        $cartData = DB::table('cart')
            ->join('course', 'cart.courseId', '=', 'course.id')

            ->get();

        return view('backend.report.cartReport',compact('cartData'));
    }



    public function classReport() {

        $classreport = DB::table('classes')->get();
        return view('backend.report.classReport',compact('classreport'));

    }

}
