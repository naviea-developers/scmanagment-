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
        $borrow = new Borrow();
        // $borrow->student_id_number = $request->student_id_number;
        $borrow->class_id = $request->class_id;
        $borrow->student_id = $request->student_id;
        $borrow->from_date = $request->from_date;
        $borrow->to_date = $request->to_date;
        $borrow->save();

        if($request->book_id){
           foreach($request->book_id as $value){
            $borrowItem = new BorrowItem();
            $borrowItem->borrow_id = $borrow->id;
            $borrowItem->book_id = $value;
            $borrowItem->save();
           }
        }

        return redirect()->back()->with('message', 'Book Borrow Successfully.');
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
        // Generate borrow_id_number
        $todayDate = date('ymd');
        $lastBorrow = Borrow::whereDate('created_at', now()->format('Y-m-d'))->orderBy('id', 'desc')->first();
        $sequenceNumber = $lastBorrow ? ((int)substr($lastBorrow->borrow_id_number, -3) + 1) : 1;
        $borrow->borrow_id_number = $todayDate . str_pad($sequenceNumber, 3, '0', STR_PAD_LEFT);

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
