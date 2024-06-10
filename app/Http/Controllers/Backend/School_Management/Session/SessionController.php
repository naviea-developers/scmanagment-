<?php

namespace App\Http\Controllers\Backend\School_management\Session;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    public function index()
    {
        // $data['sessions'] = Session::orderBy('id', 'desc')->get();
        // return view("Backend.school_management.session.index",$data);
        return view("Backend.school_management.session.manage");
    }


    public function updateCurrent(Request $request)
    {
        $sessionId = $request->input('session_id');
        Session::query()->update(['is_current' => 0]);
        $session = Session::find($sessionId);
        if ($session) {
            $session->is_current = 1;
            $session->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }



    public function ajaxData(Request $request)
    {
        $columns = [
            'id',
            'is_current',
            'session',
            'start_year',
            'end_year',
            'status',
        ];
    
        $totalData = Session::count();
        $totalFiltered = $totalData;
    
        $limit = $request->input('length');
        $start = $request->input('start');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir');
        $search = $request->input('search.value');
    
        $query = Session::query();
    
        // Apply search filter
        if (!empty($search)) {
            $query->where('start_year', 'LIKE', "%$search%");
        }
    
        $totalFiltered = $query->count();
    
        $sessions = $query->offset($start)
            ->limit($limit)
            ->orderBy($columns[$orderColumnIndex], $orderDirection)
            ->get();
    
        $data = [];
        foreach ($sessions as $session) {
            $nestedData['id'] = $session->id;
            $nestedData['is_current'] = $session->is_current;
            $nestedData['session'] = $session->start_year . ' - ' . $session->end_year;
            $nestedData['start_session'] = date('F', mktime(0, 0, 0, $session->start_month, 10)) . ' ' . $session->start_year;
            $nestedData['end_session'] = date('F', mktime(0, 0, 0, $session->end_month, 10)) . ' ' . $session->end_year;
            
            $nestedData['status'] = $session->status == 0 ?
                '<a href="' . route('admin.session.status', $session->id) . '" class="btn btn-sm btn-warning">Inactive</a>' :
                '<a href="' . route('admin.session.status', $session->id) . '" class="btn btn-sm btn-success">Active</a>';
            
            $nestedData['options'] = '<a class="btn btn-primary data_edit" href="' . route('admin.session.edit', $session->id) . '"><i class="fa fa-edit"></i></a>';
            $nestedData['options'] .= '<button class="btn text-danger bg-white" value="' . $session->id . '" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>';
            
            $data[] = $nestedData;
        }
    
        $json_data = [
            'draw' => intval($request->input('draw')),
            'recordsTotal' => intval($totalData),
            'recordsFiltered' => intval($totalFiltered),
            'data' => $data
        ];
    
        return response()->json($json_data);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['years'] = AcademicYear::all();
        return view("Backend.school_management.session.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $validator = Validator::make($request->all(), [
            'start_month' => 'required',
            'start_year' => 'required',
            'end_month' => 'required',
            'end_year' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();

            Session::query()->update(['is_current' => 0]);
            $session = New session;
            $session->start_month = $request->start_month;
            $session->start_year = $request->start_year;
            $session->end_month = $request->end_month;
            $session->end_year = $request->end_year;
            $session->is_current = 1;
            $session->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Session Add Successfully'
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
        $data["session"]= session::find($id);
        $data['years'] = AcademicYear::all();
        return view("Backend.school_management.session.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'start_month' => 'required',
            'start_year' => 'required',
            'end_month' => 'required',
            'end_year' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
    try{
        DB::beginTransaction();
        $session = session::find($id);
        $session->start_month = $request->start_month;
        $session->start_year = $request->start_year;
        $session->end_month = $request->end_month;
        $session->end_year = $request->end_year;
        $session->save();

        DB::commit();
        return response()->json([
            'status'=>'yes',
            'msg'=>'Bulding Update Successfully'
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
            $session =  Session::find($request->session_id);
            $session->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Session Deleted Successfully'
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
        $session = Session::find($id);
        if ($session) {
            if ($session->status == 0) {
                $session->status = 1;
            } elseif ($session->status == 1) {
                $session->status = 0;
            }
            $session->update();

            $statusMessage = $session->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Session not found'
        ]);
    }






    // public function status($id)
    // {
    //     $session = session::find($id);
    //     if($session->status == 0)
    //     {
    //         $session->status = 1;
    //     }elseif($session->status == 1)
    //     {
    //         $session->status = 0;
    //     }
    //     $session->update();
    //     return redirect()->route('admin.session.index');
    // }
}
