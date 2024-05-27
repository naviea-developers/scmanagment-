<?php

namespace App\Http\Controllers\User\Library_management;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Book;
use App\Models\Classe;
use App\Models\Group;
use App\Models\SchoolSection;
use App\Models\Session;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $data['students'] = Admission::where('is_new', 0)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('status', 1)->get();
        $data['books'] = Book::where('status', 1)->get();
        return view('user.library_management.index', $data);
    }
}
