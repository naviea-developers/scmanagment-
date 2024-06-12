<?php

namespace App\Http\Controllers\Backend\Library_management\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Classe;
use App\Models\Group;
use App\Models\Shelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        // $data['books'] = Book::orderBy('id', 'desc')->get();
        $data['shelves'] = Shelf::where('status', 1)->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        return view("Backend.library_management.book.manage",$data);
    }


    function ajaxData(Request $request){
        // dd($request->all());
         $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'book_code',
            3 => 'class_id',
            4 => 'group_id',
            5 => 'shelf_id',
            6 => 'total_set',
            7 => 'stock_in',
            8 => 'stock_out',
            9 => 'status',
            10 => 'options',
           
        );
        $totalData = Book::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        // dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
       // Initialize the query builder for the Book model
        $query = Book::query();

        // Apply search filter if provided
        if (!empty($search)) {
            $query->where("name", "LIKE", "%{$search}%");
        }

        // Apply additional filters based on the request parameters
        if (!empty($request->class_id)) {
            $query->where("class_id", $request->class_id);
        }

        if (!empty($request->group_id)) {
            $query->where("group_id", $request->group_id);
        }

        if (!empty($request->shelf_id)) {
            $query->where("shelf_id", $request->shelf_id);
        }

        // Get the total count before pagination
        $totalFiltered = $query->count();

        // Apply pagination and sorting
        $books = $query->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
 
        $data = array();
        if(!empty($books))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($books as $book)
            {
                $nestedData['id'] = $i++;
                $nestedData['name'] = @$book->name;
                $nestedData['book_code'] = @$book->book_code;
                $nestedData['class_id'] = @$book->class->name;
                $nestedData['group_id'] = @$book->group->name;
                $nestedData['shelf_id'] = @$book->shelf->name;
                $nestedData['total_set'] = @$book->total_set;
                $nestedData['stock_in'] = @$book->total_set - @$book->stock_out;
                $nestedData['stock_out'] = @$book->stock_out;
 
                $nestedData['status'] = '';
                if ($book->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.book.status', $book->id).'" class="btn btn-sm btn-warning">Inactive</a>';
                } elseif ($book->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.book.status', $book->id).'" class="btn btn-sm btn-success">Active</a>';
                }
                $nestedData['options'] = '';
                // Edit button
                $nestedData['options'] .= ' <a class="btn btn-primary data_edit" href="'.route('admin.book.edit', $book->id).'"><i class="fa fa-edit"></i></a>';
                // Delete button
                $nestedData['options'] .= ' <a href="#"  value="'.$book->id.'" id="dataDeleteModal" class="del_data btn btn-danger"><i class="fa fa-trash"></i></a>';
                
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


    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $data['shelves'] = Shelf::where('status', 1)->get();
    //     $data['classes'] = Classe::where('status', 1)->get();
    //     $data['groups'] = Group::where('status', 1)->get();
    //     return view("Backend.library_management.book.create", $data);
    // }

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
            return redirect()->route('admin.book.index')->with('message','Book Add Successfully');
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
        return view("Backend.library_management.book.update",$data);
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
        return redirect()->route('admin.book.index')->with('message','Book Update Successfully');
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
        return redirect()->route('admin.book.index')->with('message', 'Status Change Successfully.');
    }
}
