<?php

namespace App\Http\Controllers\User\Library_management;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\BorrowItem;
use App\Models\Classe;
use App\Models\Group;
use App\Models\SchoolSection;
use App\Models\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LibraryController extends Controller
{
    public function library()
    {
        $data['books'] = Book::where('status', 1)->get();
        return view('user.library_management.library', $data);
    }
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

    public function borrowStore(Request $request)
    {
        // dd('hi');
        $borrow = new Borrow();
        $borrow->class_id = $request->class_id;
        $borrow->student_id = $request->student_id;
        $borrow->from_date = $request->from_date;
        $borrow->to_date = $request->to_date;
        $borrow->save();
        $todayDate = date('ymd');
        $borrow->borrow_id_number = $todayDate.str_pad($borrow->id,STR_PAD_LEFT);
        $borrow->save();

        if($request->book_id){
            foreach($request->book_id as $value){
                $book = Book::find($value);

                if ($book) {
                    $book->stock_out += 1;
                    // $book->stock_in = $book->total_set - $book->stock_out;
                    $book->save();

                    $borrowItem = new BorrowItem();
                    $borrowItem->borrow_id = $borrow->id;
                    $borrowItem->book_id = $value;
                    $borrowItem->save();
                }
            }
        }

        return redirect()->back()->with('message', 'Books Borrowed Successfully.');
    }


    public function returnBook(Request $request)
    {
        $borrow = Borrow::findOrFail($request->borrow_id);
        // Update the borrow record to mark it as returned
        $borrow->is_return = 1;
        $borrow->save();

        // Decrease the total_set count for the returned books
        foreach ($borrow->borrowItems as $borrowItem) {
            $book = $borrowItem->book;
            $book->stock_out -= 1;
            // $book->stock_in = $book->total_set + $book->stock_out;
            $book->save();
        }

        return redirect()->back()->with('message', 'Book Returned Successfully.');
    }



    public function borrowManage()
    {
        $data['borrows'] = Borrow::all();
        $data['classes'] = Classe::where('status', 1);
        return view('user.library_management.manage', $data);
    }

    function getBorrowBook(Request $request){
        // dd($request->all());
        $columns = array(
            0 => 'id',
            1 => 'borrow_id_number',
            2 => 'book',
            3 => 'student_id_number',
            4 => 'student_id',
            5 => 'from_date',
            6 => 'to_date',
            7 => 'status',
            8 => 'is_return',
            9 => 'options',
        );
        $totalData = Borrow::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        // dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $query = Borrow::query();

        if (!empty($search)) {
            $query->where("borrow_id_number", "LIKE", "%{$search}%");
        }

        $totalFiltered = $query->count();

        $borrows = $query->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
 
        $data = array();
        if(!empty($borrows))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($borrows as $borrow)
            {
                $nestedData['id'] = $i++;
                $nestedData['borrow_id_number'] = @$borrow->borrow_id_number;
                $books = [];
                foreach ($borrow->borrowItems as $borrowItem) {
                    $books[] = $borrowItem->book->name ?? 'N/A';
                }
                $nestedData['book'] = implode(', ', $books); 

                $nestedData['student_id_number'] = @$borrow->student->student_id_number;
                $nestedData['student_id'] = @$borrow->student->student_name;

               
                $nestedData['from_date'] = @$borrow->from_date;
                $nestedData['to_date'] = @$borrow->to_date;


                $nestedData['status'] = '';
                if($borrow->to_date < Carbon::now() && $borrow->is_return==0){
                    $nestedData['status'] .= '<a class="btn btn-sm btn-warning">Lete</a>';
                }else{
                    if ($borrow->is_return == 0) {
                        $nestedData['status'] .= '<a class="btn btn-sm btn-warning">Pending</a>';
                    } elseif ($borrow->is_return == 1) {
                        $nestedData['status'] .= '<a class="btn btn-sm btn-success">Returned</a>';
                    }
                }



                $nestedData['is_return'] = '';
                if ($borrow->is_return == 0) {
                    $nestedData['is_return'] .= '<form method="POST" action="' . route('teacher.library_borrow.return') . '">';
                    $nestedData['is_return'] .= csrf_field();
                    $nestedData['is_return'] .= '<input type="hidden" name="borrow_id" value="' . $borrow->id . '">';
                    $nestedData['is_return'] .= '<button type="submit" class="btn btn-info">Return</button>';
                    $nestedData['is_return'] .= '</form>';
                } else {
                    $nestedData['is_return'] .= '<p>Returned</p>';
                }

                // $nestedData['is_return'] = '';
                // if ($borrow->is_return == 0) {
                //     $nestedData['is_return'] .= '<a class="btn btn-sm btn-warning">Pending</a>';
                // } elseif ($borrow->is_return == 1) {
                //     $nestedData['status'] .= '<a class="btn btn-sm btn-success">Returned</a>';
                // }


                $nestedData['options'] = '';
                if ($borrow->is_return == 0) {
                    $nestedData['options'] .= '<a href="' . route('teacher.library_borrow.edit', $borrow->id) . '" class="btn btn-info"><i class="fa-duotone fa fa-edit"></i></a>';

                    $nestedData['options'] .= '&nbsp;&nbsp;';
                    $nestedData['options'] .= '<a href="#" data-id="' . $borrow->id . '" class="del_data btn btn-danger"><i class="fa fa-trash"></i></a>';
                } else {
                    // $nestedData['options'] .= '<button class="btn text-danger delete-button" courseId="' . $borrow->id . '"><i class="icon fa fa-trash tx-28"></i></button>';
                    $nestedData['options'] .= '<a href="#" data-id="' . $borrow->id . '" class="del_data btn btn-danger"><i class="fa fa-trash"></i></a>';
                }

                $data[] = $nestedData;
 
            }

        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
 
        return json_encode($json_data);
    }


    public function borrowEdit($id)
    {
        $data['borrow'] = $editData = Borrow::find($id);
        $data['students'] =  Admission::where('is_new', 0)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('status', 1)->get();
        $data['books'] = Book::where('class_id',$editData->class_id)->where('status', 1)->get();
        return view('user.library_management.edit', $data);
    }


    public function borrowUpdate(Request $request, $id)
    {
        $borrow = Borrow::find($id);
        if (!$borrow) {
            return redirect()->back()->with('error', 'Borrow record not found.');
        }

        $borrow->class_id = $request->class_id;
        $borrow->student_id = $request->student_id;
        $borrow->from_date = $request->from_date;
        $borrow->to_date = $request->to_date;
        $borrow->save();
       
        // Get the existing borrow items
        $existingBorrowItems = BorrowItem::where('borrow_id', $borrow->id)->get();

        // Convert existing borrow items to a keyed array for easy lookup
        $existingBorrowItemsArray = $existingBorrowItems->keyBy('book_id')->toArray();

        if ($request->book_id) {
            foreach ($request->book_id as $bookId) {
                // If the book is already in the existing borrow items, remove it from the array
                if (isset($existingBorrowItemsArray[$bookId])) {
                    unset($existingBorrowItemsArray[$bookId]);

                } else {
                    // Otherwise, add it as a new borrow item
                    $borrowItem = new BorrowItem();
                    $borrowItem->borrow_id = $borrow->id;
                    $borrowItem->book_id = $bookId;
                    $borrowItem->save();

                    $book = Book::find($bookId);
                    $book->stock_out += 1;
                    $book->save();
                }
            }
        }

        // Any remaining items in the array are no longer selected, so remove them
        foreach ($existingBorrowItemsArray as $borrowItem) {
            BorrowItem::find($borrowItem['id'])->delete();
           
            $book = Book::find($borrowItem['book_id']);
            $book->stock_out -= 1;
            $book->save();
        }

        return redirect()->back()->with('message', 'Book Borrow Updated Successfully.');
    }

    public function borrowDelete(Request $request)
    {
        $borrow = Borrow::find($request->borrow_id);
        foreach($borrow->borrowItems as $item){
            $item->delete();
        }
      $borrow->delete();
      return redirect()->back()->with('message', 'Borrow Item Delete Successfully, Thank you.');
    }
}
