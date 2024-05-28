<?php

namespace App\Http\Controllers\User\Library_management;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Classe;
use App\Models\Group;
use App\Models\Shelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function create()
    {
        $data['shelves'] = Shelf::where('status', 1)->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        return view("user.library_management.book.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $request->validate([
            'name' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $book = New Book();
            $book->shelf_id = $request->shelf_id ?? 0;
            $book->class_id = $request->class_id ?? 0;
            $book->group_id = $request->group_id ?? 0;
            $book->name = $request->name;
            $book->total_set = $request->total_set;
            $book->save();
            $book->book_code = $book->class_id.str_pad($book->id, 5, '0', STR_PAD_LEFT); 
            $book->save();
            DB::commit();
            return redirect()->route('teacher.library')->with('message','Book Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
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
        $data['book'] = Book::find($id);
        $data['shelves'] = Shelf::where('status', 1)->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        return view("user.library_management.book.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
       $request->validate([
        'name' => 'required',

    ]);
    try{
        DB::beginTransaction();
        $book = Book::find($id);
        $book->shelf_id = $request->shelf_id ?? 0;
        $book->class_id = $request->class_id ?? 0;
        $book->group_id = $request->group_id ?? 0;
        $book->name = $request->name;
        $book->total_set = $request->total_set;
        $book->save();
        // $book->book_code = $book->class_id.str_pad($book->id, 5, '0', STR_PAD_LEFT);
        // $book->save();

        DB::commit();
        return redirect()->route('teacher.library')->with('message','Book Update Successfully');
    }catch(\Exception $e){
        DB::rollBack();
       // dd($e);
        return back()->with ('error_message', $e->getMessage());
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $book =  Book::find($request->book_id);
        $book->delete();
        return back()->with('message','Book Deleted Successfully');
    }


    public function status($id)
    {
        $book = Book::find($id);
        if($book->status == 0)
        {
            $book->status = 1;
        }elseif($book->status == 1)
        {
            $book->status = 0;
        }
        $book->update();
        return redirect()->route('teacher.library')->with('message', 'Status Change Successfully.');
    }
}
