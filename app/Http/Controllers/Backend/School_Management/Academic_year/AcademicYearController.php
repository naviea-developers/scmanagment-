<?php

namespace App\Http\Controllers\Backend\School_management\Academic_year;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AcademicYearController extends Controller
{
    public function index()
    {
        // $data['years'] = AcademicYear::orderBy('id', 'desc')->get();
        return view("Backend.school_management.academic_year.manage");
    }

    /**
     * Show the form for creating a new resource.
     */


     public function updateCurrent(Request $request)
     {
         $yearId = $request->input('year_id');
         AcademicYear::query()->update(['is_current' => 0]);
         $year = AcademicYear::find($yearId);
         if ($year) {
             $year->is_current = 1;
             $year->save();
             return response()->json(['success' => true]);
         }
         return response()->json(['success' => false], 404);
     }



     public function ajaxData(Request $request)
     {
         $columns = [
             'id',
             'is_current',
             'year',
             'status',
         ];
 
         $totalData = AcademicYear::count();
         $totalFiltered = $totalData;
 
         $limit = $request->input('length');
         $start = $request->input('start');
         $order = $columns[$request->input('order.0.column')];
         $dir = $request->input('order.0.dir');
         $search = $request->input('search.value');
 
         $datalist = AcademicYear::query();
        if(!empty($search)){
 
            $datalist =$datalist->where("year","LIKE","%{$search}%");
           
        }
        
        $totalFiltered = $datalist->count();
         $datalist = $datalist->offset($start)->limit($limit)->orderBy($order,$dir)->get();
 
         $data = array();
         if(!empty($datalist))
         {
            $i = $start == 0 ? 1 : $start+1;
            foreach ($datalist as $data_v) {
                $nestedData['id'] = $data_v->id;
                $nestedData['is_current'] = $data_v->is_current;
                $nestedData['year'] = $data_v->year;
                $nestedData['status'] = $data_v->status == 0 ?
                    '<a href="' . route('admin.academic_year.status', $data_v->id) . '" class="data_status btn btn-sm btn-warning">Inactive</a>' :
                    '<a href="' . route('admin.academic_year.status', $data_v->id) . '" class="data_status btn btn-sm btn-success">Active</a>';
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="' . route('admin.academic_year.edit', $data_v->id) . '"><i class="fa fa-edit"></i></a>';
                $nestedData['options'] .= '<button class="btn text-danger bg-white" value="' . $data_v->id . '" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>';
    
                $data[] = $nestedData;
            }
        }
        $json_data = [
            'draw' => intval($request->input('draw')),
            'recordsTotal' => intval($totalData),
            'recordsFiltered' => intval($totalFiltered),
            'data' => $data
        ];
    
        return response()->json($json_data);
     }
 
   

    public function create()
    {
        return view("Backend.school_management.academic_year.create");
    }


   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $validator = Validator::make($request->all(), [
            'year' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            AcademicYear::query()->update(['is_current' => 0]);
            $year = New AcademicYear;
            $year->year = $request->year;
            $year->is_current = 1;
            $year->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Year Add Successfully'
            ]);
        }catch(\Exception $e){
            DB::rollBack();
            // dd($e);
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
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
       // dd('hi');
        $data["year"]= AcademicYear::find($id);
        return view("Backend.school_management.academic_year.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'year' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
    try{
        DB::beginTransaction();
        $year = AcademicYear::find($id);
        $year->year = $request->year;
        $year->save();

        DB::commit();
        return response()->json([
            'status'=>'yes',
            'msg'=>'Academic Year Update Successfully'
        ]);
    }catch(\Exception $e){
        DB::rollBack();
       // dd($e);
       return response()->json([
        'status'=>'no',
        'msg'=>$e->getMessage()
        ]);
    }
    }

    /**
     * Remove the specified resource from storage.
     */


     public function destroy(Request $request)
    {
        //dd($request);
        try{
            $academicYear =  AcademicYear::find($request->year_id);
            $academicYear->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Year Deleted Successfully'
            ]);
        }catch(\Exception $e){
            //DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }

    public function status($id)
    {
        $year = AcademicYear::find($id);
        if ($year) {
            if ($year->status == 0) {
                $year->status = 1;
            } elseif ($year->status == 1) {
                $year->status = 0;
            }
            $year->update();

            $statusMessage = $year->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Year not found'
        ]);
    }
}
