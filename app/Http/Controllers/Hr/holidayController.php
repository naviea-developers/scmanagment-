<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hr\MonthManage;
use App\Models\Hr\Holiday;
use App\User;
// use DB;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class holidayController extends Controller
{
   public function view(){

        $data['holidays']=Holiday::orderBy('holidays.id','DESC')
                          ->get();

        $currentYear=Carbon::now()->format('Y');
        $data['months']=MonthManage::where('monthDate','LIKE',$currentYear.'%')->get();

        return view ('Hr.holiday.manage',$data);
    }
    function ajaxHolidayManage(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'month_manages.monthDate',
            2 => 'holidays.startDate',
            3 => 'holidays.endDate',
            4 => 'holidays.day',
        );
        $totalData = Holiday::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Holiday::leftJoin('month_manages','holidays.monthID','month_manages.id');
        if(!empty($search)){
 
            $datalist =$datalist->where("month_manages.monthDate","LIKE","%{$search}%")
            ->orwhere("holidays.startDate","LIKE","%{$search}%")
            ->orwhere("holidays.endDate","LIKE","%{$search}%");
           
        }
        $totalFiltered = $datalist->count();
        $datalist = $datalist->select('holidays.*')->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        
 
        $data = array();
        if(!empty($datalist))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($datalist as $data_v)
            {
                $nestedData['id'] = $i++;
                $nestedData['month'] = $data_v->month?->monthDate;
                $nestedData['start_date'] = $data_v->startDate;
                $nestedData['end_date'] = $data_v->endDate;
              
                $nestedData['today_holiday'] = $data_v->day;
                $nestedData['description'] = $data_v->description;
               
                $nestedData['options'] = '<a class="btn btn-primary" href="javascript:void(0)" id="holidayEdit" data-id="'.$data_v->id.'" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="fa fa-edit"></i></a>';
             
                $nestedData['options'] .= '<a title="Delete"  style="margin-left: 10px" class="del_hr_data btn btn-danger" data-id="'.$data_v->id.'"><i class="fa fa-trash"></i></a>';
 
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


    public function store(Request $request){

        date_default_timezone_set('Asia/Dhaka');



        $validator = Validator::make($request->all(),[
            'monthID'=>'required',
            'startDate'=>'required',
            'endDate'=>'required',
            'day'=>'required',
            'description'=>'required'
        ],[
            'monthID.required'=> 'Month is required',
            'startDate.required'=> 'Start Date is required',
            'endDate.required'=> 'End Date is required',
            'day.required'=> 'Day is required',
            'description.required'=> 'Description is required',
        ]);
        if($validator->fails()){
            return response([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
        try{
            DB::beginTransaction();
            if($request->id==0){
                $data=new Holiday();
            }
            else{
                $data=Holiday::find($request->id);
            }
            $data->monthID=$request->monthID;
            $data->startDate=$request->startDate;
            $data->endDate=$request->endDate;
            $data->day=$request->day;
            $data->description=$request->description;
            $data->save();

            DB::commit();
            if($request->id==0){
                return response([
                    'status' => 1,
                    'success' => 'Holiday add successfully.',
                ]);
            }else{
                return response([
                    'status' => 1,
                    'success' => 'Holiday update successfully.',
                ]);
            }
        }catch(\Exception $e){
            DB::rollBack();
            return response([
                'status' => 0,
                'error' => 'Something went Wrong!',
            ]);
        }
    }

    public function delete(Request $request){
        try{
            DB::beginTransaction();
            $data=Holiday::find($request->id);
            $data->delete();
            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Deleted Successfully'
            ]);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }

    }

    public function edit(Request $request){

        if (!$request->id) {
           $html ='Sorry';
        } else {

           $data=Holiday::find($request->id);
        }

        return response()->json(['holidayID'=>$data->id,'monthID' => $data->monthID,'startDate'=>$data->startDate,'endDate'=>$data->endDate,'day'=>$data->day,'description'=>$data->description]);
    }
}
