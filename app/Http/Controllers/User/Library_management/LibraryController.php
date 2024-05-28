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

    // public function borrowStore(Request $request)
    // {
    //     $borrow = new Borrow();
    //     // $borrow->student_id_number = $request->student_id_number;
    //     $borrow->class_id = $request->class_id;
    //     $borrow->student_id = $request->student_id;
    //     $borrow->from_date = $request->from_date;
    //     $borrow->to_date = $request->to_date;
    //     $borrow->save();
    //     $todayDate = date('ymd');
    //     $borrow->borrow_id_number = $todayDate.str_pad($borrow->id,STR_PAD_LEFT);
    //     $borrow->save();

    //     if($request->book_id){
    //        foreach($request->book_id as $value){
    //         $borrowItem = new BorrowItem();
    //         $borrowItem->borrow_id = $borrow->id;
    //         $borrowItem->book_id = $value;
    //         $borrowItem->save();
    //        }
    //     }

    //     return redirect()->back()->with('message', 'Book Borrow Successfully.');
    // }




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
        return view('user.library_management.manage', $data);
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
                }
            }
        }

        // Any remaining items in the array are no longer selected, so remove them
        foreach ($existingBorrowItemsArray as $borrowItem) {
            BorrowItem::find($borrowItem['id'])->delete();
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
