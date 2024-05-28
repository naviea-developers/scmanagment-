<?php

namespace App\Http\Controllers\Backend\Library_management\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Classe;
use App\Models\Group;
use App\Models\Shelf;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DeliveryController extends Controller
{
    public function index()
    {
        $data['borrows'] = Borrow::orderBy('id', 'desc')->get();
        $data['students'] = Admission::orderBy('id', 'desc')->get();
        $data['books'] = Book::orderBy('id', 'desc')->get();
        $data['classes'] = Classe::orderBy('id', 'asc')->get();
        $data['shelves'] = Shelf::orderBy('id', 'desc')->get();
        return view("Backend.library_management.delivery.index",$data);
    }


    function libraryDeliveryBookByAjax(Request $request){
        // dd($request->all());
        $columns = array(
            0 => 'id',
            1 => 'borrow_id_number',
            2 => 'student_id_number',
            3 => 'student_name',
            4 => 'class_id',
            5 => 'book',
            6 => 'from_date',
            7 => 'to_date',
            8 => 'is_return',
            // 9 => 'let',
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
        if (!empty($search)) {
            $query->where("borrow_id_number", "LIKE", "%{$search}%");
        }

        // if (!empty($search)) {
        //     $query ->join('admissions', 'borrows.student_id', '=', 'admissions.id')
        //             ->where('admissions.student_id_number', 'LIKE', "%{$search}%")
        //             ->select('borrows.*'); 
        // } 

        if (!empty($request->class_id)) {
            $query->where("class_id", $request->class_id);
        }

        // Apply additional filters based on the request parameters
  

        if (!empty($request->student_id)) {
            $query->where("student_id", $request->student_id);
        }

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
                $nestedData['borrow_id_number'] = @$borrow->borrow_id_number;
                $nestedData['student_id_number'] = @$borrow->student->student_id_number;
                $nestedData['student_name'] = @$borrow->student->student_name;
                $nestedData['class_id'] = @$borrow->class->name;

                $books = [];
                foreach ($borrow->borrowItems as $borrowItem) {
                    $books[] = $borrowItem->book->name ?? 'N/A';
                }
                $nestedData['book'] = implode(', ', $books); 

                $nestedData['from_date'] = @$borrow->from_date;
                $nestedData['to_date'] = @$borrow->to_date;

                $nestedData['is_return'] = '';
                if ($borrow->is_return == 0) {
                    $nestedData['is_return'] .= '<a class="btn btn-sm btn-warning">Pending</a>';
                } elseif ($borrow->is_return == 1) {
                    $nestedData['is_return'] .= '<a class="btn btn-sm btn-success">Returned</a>';
                }

                // if ($borrow->to_date >= Carbon::now()) {
                //     $nestedData['let'] .= '<a class="btn btn-sm btn-success">Let</a>';
                // }

                // $routine->examination && $routine->examination->end_date >= Carbon::now()

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

    //ajax get Student
    public function getStudent($id){
        $student = Admission::where("class_id",$id)->orderBy('id', 'asc')->get();
        return $student;
    }





}
