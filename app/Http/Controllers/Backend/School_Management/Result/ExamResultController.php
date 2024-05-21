<?php

namespace App\Http\Controllers\Backend\School_management\Result;

use App\Http\Controllers\Controller;
use App\Models\ExamResult;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    public function index()
    {
        $data['results'] = ExamResult::all();
        return view('Backend.school_management.result.index', $data);
    }
}
