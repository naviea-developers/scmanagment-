<?php

namespace App\Http\Controllers\Backend\School_management\Fee;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeeController extends Controller
{
    public function index()
    {
        $data['fees'] = Fee::orderBy('id', 'desc')->get();
        return view("Backend.school_management.fee.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.school_management.fee.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $request->validate([
            'particular_name' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $fee = New Fee();
            $fee->particular_name = $request->particular_name;
            // $fee->particular_duration = $request->particular_duration;
            $fee->is_dynamic = $request->is_dynamic ?? 0;
            $fee->save();

            DB::commit();
            return redirect()->route('admin.fee.index')->with('message','Fee Name Add Successfully');
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
        $data["fee"]= Fee::find($id);
        return view("Backend.school_management.fee.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
       $request->validate([
        'particular_name' => 'required',

    ]);
    try{
        DB::beginTransaction();
        $fee = Fee::find($id);
        $fee->particular_name = $request->particular_name;
        // $fee->particular_duration = $request->particular_duration;
        $fee->is_dynamic = $request->is_dynamic ?? 0;
        $fee->save();

        DB::commit();
        return redirect()->route('admin.fee.index')->with('message','Fee Name Update Successfully');
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

        $fee =  Fee::find($request->fee_id);
        $fee->delete();
        return back()->with('message','Fee Name Deleted Successfully');
    }


    public function status($id)
    {
        $fee = Fee::find($id);
        if($fee->status == 0)
        {
            $fee->status = 1;
        }elseif($fee->status == 1)
        {
            $fee->status = 0;
        }
        $fee->update();
        return redirect()->route('admin.fee.index');
    }
}
