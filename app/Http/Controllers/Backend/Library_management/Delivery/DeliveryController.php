<?php

namespace App\Http\Controllers\Backend\Library_management\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Classe;
use App\Models\Group;
use App\Models\Shelf;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        $data['borrows'] = Borrow::orderBy('id', 'desc')->get();
        $data['books'] = Book::orderBy('id', 'desc')->get();
        $data['classes'] = Classe::orderBy('id', 'desc')->get();
        $data['shelves'] = Shelf::orderBy('id', 'desc')->get();
        return view("Backend.library_management.delivery.index",$data);
    }


    function libraryDeliveryBookByAjax(Request $request){
        // dd($request->all());
         $columns = array(
            0 => 'id',
            // 1 => 'name',
            // 2 => 'class_id',
            // 3 => 'group_id',
            // 4 => 'shelf_id',
            // 5 => 'total_set',
            6 => 'status',
            7 => 'options',
            // 8 => 'book_code',
            8 => 'student_id_number',
        );
        $totalData = Borrow::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        // dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
       // Initialize the query builder for the Book model
        $query = Borrow::query();

        // Apply search filter if provided
        // if (!empty($search)) {
        //     $query->where("name", "LIKE", "%{$search}%");
        // }

        // Apply additional filters based on the request parameters
        if (!empty($request->class_id)) {
            $query->where("class_id", $request->class_id);
        }

        // if (!empty($request->group_id)) {
        //     $query->where("group_id", $request->group_id);
        // }

        // if (!empty($request->shelf_id)) {
        //     $query->where("shelf_id", $request->shelf_id);
        // }

        // Get the total count before pagination
        $totalFiltered = $query->count();

        // Apply pagination and sorting
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
                $nestedData['student_id_number'] = @$borrow->student->student_id_number;
                // $nestedData['name'] = @$borrow->class->name;
                // $nestedData['book_code'] = @$borrow->book_code;
                // $nestedData['class_id'] = @$borrow->class->name;
                // $nestedData['group_id'] = @$borrow->group->name;
                // $nestedData['shelf_id'] = @$borrow->shelf->name;
                // $nestedData['total_set'] = @$borrow->total_set;
 
                // $nestedData['status'] = '';
                // if ($borrow->status == 0) {
                //     $nestedData['status'] .= '<a href="'.route('admin.book.status', $borrow->id).'" class="btn btn-sm btn-warning">Inactive</a>';
                // } elseif ($borrow->status == 1) {
                //     $nestedData['status'] .= '<a href="'.route('admin.book.status', $borrow->id).'" class="btn btn-sm btn-success">Active</a>';
                // }
                $nestedData['options'] = '';
                // Edit button
                $nestedData['options'] .= ' <a class="btn btn-primary data_edit" href="'.route('admin.book.edit', $borrow->id).'"><i class="fa fa-edit"></i></a>';
                // Delete button
                $nestedData['options'] .= ' <a href="#"  value="'.$borrow->id.'" id="dataDeleteModal" class="del_data btn btn-danger"><i class="fa fa-trash"></i></a>';
                
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
}
