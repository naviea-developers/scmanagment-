<?php

namespace App\Http\Controllers\Backend\School_management\Fee;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Fee;
use App\Models\FeeManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeeManagementController extends Controller
{
    public function index()
    {
        $data['fee_managements'] = FeeManagement::orderBy('id', 'desc')->get();
        return view("Backend.school_management.fee_management.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['classes'] = Classe::where('status', 1)->get();
        $data['fee_names'] = Fee::where('status', 1)->get();
        return view("Backend.school_management.fee_management.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $request->validate([
            'fee_amount' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $fee = New FeeManagement();
            $fee->class_id = $request->class_id;
            $fee->fee_id = $request->fee_id;
            $fee->fee_amount = $request->fee_amount;
            $fee->save();

            DB::commit();
            return redirect()->route('admin.fee_management.index')->with('message','Fee Add Successfully');
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
        $data["fee_management"]= FeeManagement::find($id);
        $data['classes'] = Classe::where('status', 1)->get();
        $data['fee_names'] = Fee::where('status', 1)->get();
        return view("Backend.school_management.fee_management.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
       $request->validate([
        'fee_amount' => 'required',

    ]);
    try{
        DB::beginTransaction();
        $fee = FeeManagement::find($id);
        $fee->class_id = $request->class_id;
        $fee->fee_id = $request->fee_id;
        $fee->fee_amount = $request->fee_amount;
        $fee->save();

        DB::commit();
        return redirect()->route('admin.fee_management.index')->with('message','Fee Update Successfully');
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

        $fee =  FeeManagement::find($request->fee_management_id);
        $fee->delete();
        return back()->with('message','Fee Deleted Successfully');
    }


    public function status($id)
    {
        $fee = FeeManagement::find($id);
        if($fee->status == 0)
        {
            $fee->status = 1;
        }elseif($fee->status == 1)
        {
            $fee->status = 0;
        }
        $fee->update();
        return redirect()->route('admin.fee_management.index');
    }
}
