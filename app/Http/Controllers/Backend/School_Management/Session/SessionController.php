<?php

namespace App\Http\Controllers\Backend\School_management\Session;

use App\Http\Controllers\Controller;
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
        return view("Backend.school_management.session.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $request->validate([
            'session' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $session = New session;
            $session->session = $request->session;
            $session->start_date = $request->start_date;
            $session->end_date = $request->end_date;
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
        return view("Backend.school_management.session.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
       $request->validate([
        'start_date' => 'required',
        'end_date' => 'required',

    ]);
    try{
        DB::beginTransaction();
        $session = session::find($id);
        $session->session = $request->session;
        $session->start_date = $request->start_date;
        $session->end_date = $request->end_date;
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
