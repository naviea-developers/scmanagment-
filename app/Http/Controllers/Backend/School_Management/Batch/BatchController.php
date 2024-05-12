<?php

namespace App\Http\Controllers\Backend\School_management\Batch;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\BatchDay;
use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    public function index()
    { 
        $data['batchs'] = Batch::all();
        // dd($data);
        return view('Backend.school_management.batch.index', $data);
    }
    public function create()
    {
        $data['classes'] = Classe::where('status', 1)->get();
        return view('Backend.school_management.batch.create', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $batch = New Batch();
            $batch->class_id = $request->class_id;
            $batch->duration = $request->duration;
            $batch->start_time = $request->start_time;
            $batch->end_time = $request->end_time;
            $batch->save();

            if($request->day){
                foreach( $request->day as $value){
                    $b_day = new BatchDay();
                    $b_day->batch_id = $batch->id;
                    $b_day->day = $value;
                    $b_day->save();
                }
            }

            DB::commit();
            return redirect()->route('admin.batch.index')->with('message','Batch Add Successfully');
            // return redirect()->route('admin.batch.index')->with('message','Batch Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function details(string $id)
    {
       // dd('hi');
        $data["batch"]= Batch::find($id);
        return view("Backend.school_management.batch.details",$data);
    }
    public function edit(string $id)
    {
       // dd('hi');
        $data["batch"]= Batch::find($id);
        $data['classes'] = Classe::where('status', 1)->get();
        return view("Backend.school_management.batch.update",$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $batch = Batch::find($id);
            $batch->class_id = $request->class_id;
            $batch->duration = $request->duration;
            $batch->start_time = $request->start_time;
            $batch->end_time = $request->end_time;
            $batch->save();

            if ($request->day) {
                $batch->batchDay()->delete();
                
                foreach ($request->day as $value) {
                    $b_day = new BatchDay();
                    $b_day->batch_id = $batch->id;
                    $b_day->day = $value;
                    $b_day->save();
                }
            }

            DB::commit();
            return redirect()->route('admin.batch.index')->with('message','Batch Update Successfully');
            // return redirect()->route('admin.batch.index')->with('message','Batch Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function destroy(Request $request, $id)
    {
        $batch =  Batch::find($id);
            foreach ($batch->batchDay as $day){
                $day->delete();
            }
        $batch->delete();
        return redirect()->route('admin.batch.index')->with('message','Batch Deleted Successfully');
    }
}
