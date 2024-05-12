<?php

namespace App\Http\Controllers\Backend\School_management\Session;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function index()
    {
        $data['sessions'] = Session::orderBy('id', 'desc')->get();
        return view("Backend.school_management.session.index",$data);
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
        $request->validate([
            

        ]);
        try{
            DB::beginTransaction();
            $session = New session;
            $session->start_month = $request->start_month;
            $session->start_year_id = $request->start_year_id;
            $session->end_month = $request->end_month;
            $session->end_year_id = $request->end_year_id;
            $session->save();

            DB::commit();
            return redirect()->route('admin.session.index')->with('message','session Add Successfully');
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
       $request->validate([
        

    ]);
    try{
        DB::beginTransaction();
        $session = session::find($id);
        $session->start_month = $request->start_month;
        $session->start_year_id = $request->start_year_id;
        $session->end_month = $request->end_month;
        $session->end_year_id = $request->end_year_id;
        $session->save();

        DB::commit();
        return redirect()->route('admin.session.index')->with('message','session Update Successfully');
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

        $session =  session::find($request->session_id);
        $session->delete();
        return back()->with('message','session Deleted Successfully');
    }


    public function status($id)
    {
        $session = session::find($id);
        if($session->status == 0)
        {
            $session->status = 1;
        }elseif($session->status == 1)
        {
            $session->status = 0;
        }
        $session->update();
        return redirect()->route('admin.session.index');
    }
}
