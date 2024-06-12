<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hr\MonthManage;
use App\User;
// use DB;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\DB;

class monthManageController extends Controller
{
    public function view(){
       
        return view ('Hr.monthManage.manage');
    }
    function ajaxMonthManage(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'monthDate',
            2 => 'monthTotalDay',
            3 => 'workingDay',
            4 => 'holiday',
        );
        $totalData = MonthManage::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = MonthManage::query();
        if(!empty($search)){
 
            $datalist =$datalist->where("monthDate","LIKE","%{$search}%");
           
        }
        $totalFiltered = $datalist->count();
        $datalist = $datalist->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        
 
        $data = array();
        if(!empty($datalist))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($datalist as $data_v)
            {
                $nestedData['id'] = $i++;
                $nestedData['month'] = $data_v->monthDate;
                $nestedData['total_day'] = $data_v->monthTotalDay;
              
                $nestedData['today_working_day'] = $data_v->workingDay;
                $nestedData['today_holiday'] = $data_v->holiday;
               
                $nestedData['options'] = '<a class="btn btn-primary" href="javascript:void(0)" id="monthManageEdit" data-id="'.$data_v->id.'" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="fa fa-edit"></i></a>';
             
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
            'monthDate'=>'required',
            'monthTotalDay'=>'required',
            'workingDay'=>'required',
            'holiday'=>'required'
        ],[
            'monthDate.required'=> 'Month Date is required',
            'monthTotalDay.required'=> 'Moth Total Day is required',
            'workingDay.required'=> 'Working Day is required',
            'holiday.required'=> 'Holiday is required',
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
                $data=new MonthManage();
            }
            else{
                $data=MonthManage::find($request->id);
            }
            $data->monthDate=$request->monthDate;
            $data->monthTotalDay=$request->monthTotalDay;
            $data->workingDay=$request->workingDay;
            $data->holiday=$request->holiday;
            $data->save();



            DB::commit();
            if($request->id==0){
                return response([
                    'status' => 1,
                    'success' => 'Month add successfully.',
                ]);
            }else{
                return response([
                    'status' => 1,
                    'success' => 'Month update successfully.',
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
            $data=MonthManage::find($request->id);
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

           $data=MonthManage::find($request->id);
        }

        return response()->json(['monthManageID'=>$data->id,'monthDate' => $data->monthDate,'monthTotalDay'=>$data->monthTotalDay,'workingDay'=>$data->workingDay,'holiday'=>$data->holiday]);
    }
}
