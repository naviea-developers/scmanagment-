<?php

namespace App\Http\Controllers\Backend\School_management\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Mail\UserEmail;
use App\Models\Classe;
use App\Models\FeeManagement;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AlumniController extends Controller
{
    public function index()
    {
        // $data['alumnis'] = Alumni::all();
        $data['alumnis'] = User::where('is_alumni', 1)->where('type', 9)->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['fees'] = FeeManagement::where('status', 1)->get();
        return view('Backend.school_management.alumni.manage', $data);
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'image',
            2 => 'name',
            3 => 'session',
            4 => 'class',
            5 => 'roll_number',
            6 => 'status',
        );
        $totalData = User::where('type', 9)->count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        // $datalist = User::where('type',2)->query();
        $datalist = User::where('type', 9);
        if(!empty($search)){
 
            $datalist =$datalist->where("name","LIKE","%{$search}%");
           
        }
        
        $totalFiltered = $datalist->count();
         $datalist = $datalist->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        
 
        $data = array();
        if(!empty($datalist))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($datalist as $data_v)
            {
                $nestedData['id'] = $data_v->id;
                $nestedData['image'] = '<img src="' . @$data_v->image_show . '" alt="Image" width="50" height="50">';
                $nestedData['name'] = @$data_v->name;
                $nestedData['session'] = @$data_v->session->start_year . ' - ' . @$data_v->session->end_year;
                $nestedData['class'] = @$data_v->class->name;
                $nestedData['roll_number'] = @$data_v->roll_number;
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.alumni.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.alumni.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.alumni.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
                $nestedData['options'] .= '<button class="btn text-danger bg-white"  value="'.$data_v->id.'" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>';
                
                $nestedData['options'] .= '<button class="btn text-white bg-info changePass"  value="'.$data_v->id.'">Change Password</button>';

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



    public function store(Request $request)
    {
      // dd($request->all());
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $alumni = new User();
            $alumni->session_id = $request->session_id ?? 0;
            $alumni->class_id = $request->class_id ?? 0;
            $alumni->reg_fee_id = $request->reg_fee_id ?? 0;
            $alumni->roll_number = $request->roll_number;
            $alumni->name = $request->name;
            $alumni->mobile = $request->mobile;
            $alumni->email = $request->email;
            $alumni->designation = $request->designation;
            $alumni->company_name = $request->company_name;
            $alumni->address = $request->address;
            $alumni->description = $request->description;
            $alumni->type = 9;
            $alumni->is_alumni = 1;
            $alumni->password = 12345678;
            //social links
            $alumni->facebook_id = $request->facebook_id;
            $alumni->twitter_id = $request->twitter_id;
            $alumni->google_id = $request->google_id;
            $alumni->linkedin_id = $request->linkedin_id;
    
            if($request->hasFile('image')){
                $fileName = rand().time().'_image.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/users/'),$fileName);
                $alumni->image = $fileName;
            }
            $alumni->save();
    
             // Generate a unique ID in the format TYYYYMMDD(user_id)
             $uniqueId = 'A' . date('Y') . $alumni->id;
             $alumni->unique_id = $uniqueId;
             $alumni->save();
    
    
             //user
             $data['name'] = $alumni->name;
             $data['email'] = $alumni->email;
             $data['password'] = 12345678;
             $details['email'] = $alumni->email;
             $details['send_item']= new UserEmail($data);
             dispatch(new \App\Jobs\SendEmailJob($details));
             ///email notification end

            DB::commit();
           
            return response()->json([
                'status'=>'yes',
                'msg'=>'Alumni Add Successfully'
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
    // public function edit($id)
    // {
    //     $data['alumni'] = $class = User::find($id);
    //     // $data['alumni'] = $class = Alumni::find($id);
    //     $data['classes'] = Classe::where('status', 1)->get();
    //     $data['sessions'] = Session::where('status', 1)->get();
    //     $data['fees'] = FeeManagement::where('class_id', $class->class_id)->where('status', 1)->get();
    //     return view('Backend.school_management.alumni.update', $data);
    // }


    public function edit($id)
{
    $data['alumni'] = $class = User::find($id);
    // $data['alumni'] = $class = Alumni::find($id);
    $data['classes'] = Classe::where('status', 1)->get();
    $data['sessions'] = Session::where('status', 1)->get();
    $data['fees'] = FeeManagement::where('class_id', $class->class_id)
                                  ->where('status', 1)
                                  ->whereHas('fee', function($query) {
                                      $query->where('is_constant', 1);
                                  })
                                  ->get();
    return view('Backend.school_management.alumni.update', $data);
}



    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $alumni = User::find($id);
            $alumni->session_id = $request->session_id ?? 0;
            $alumni->class_id = $request->class_id ?? 0;
            $alumni->reg_fee_id = $request->reg_fee_id ?? 0;
            $alumni->roll_number = $request->roll_number;
            $alumni->name = $request->name;
            $alumni->mobile = $request->mobile;
            $alumni->email = $request->email;
            $alumni->designation = $request->designation;
            $alumni->company_name = $request->company_name;
            $alumni->address = $request->address;
            $alumni->description = $request->description;
            $alumni->is_alumni = $request->is_alumni;
            //social links
            $alumni->facebook_id = $request->facebook_id;
            $alumni->twitter_id = $request->twitter_id;
            $alumni->google_id = $request->google_id;
            $alumni->linkedin_id = $request->linkedin_id;

            if($request->hasFile('image')){
                @unlink(public_path("upload/users/".$alumni->image));
                $fileName = rand().time().'_image.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/users/'),$fileName);
                $alumni->image = $fileName;
            }
            $alumni->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Alumni Update Successfully'
            ]);
            
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }

    // public function destroy(Request $request)
    // {
    //     $alumni =  User::find($request->alumni_id);
    //     @unlink(public_path("upload/users/".$alumni->image));
    //     $alumni->delete();
    //     return back()->with('message','Alumni Info Deleted Successfully');
    // }

    public function destroy(Request $request)
    {
        //dd($request);
        try{
            $alumni =  User::find($request->alumni_id);
            @unlink(public_path("upload/users/".$alumni->image));
            $alumni->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Alumni Deleted Successfully'
            ]);
        }catch(\Exception $e){
            //DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }


    // public function status($id)
    // {
    //     $alumni = User::find($id);
    //     if($alumni->status == 0)
    //     {
    //         $alumni->status = 1;
    //     }elseif($alumni->status == 1)
    //     {
    //         $alumni->status = 0;
    //     }
    //     $alumni->update();
    //     return redirect()->route('admin.alumni.index')->with('message', 'Status updated.');
    // }


    public function status($id)
    {
        $alumni = User::find($id);
        if ($alumni) {
            if ($alumni->status == 0) {
                $alumni->status = 1;
            } elseif ($alumni->status == 1) {
                $alumni->status = 0;
            }
            $alumni->update();

            $statusMessage = $alumni->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Alumni not found'
        ]);
    }

    //Requested Alumni
    public function requestedAlumni()
    {
        $data['alumnis'] = User::where('is_alumni', 0)->where('type', 9)->get();
        return view('Backend.school_management.alumni.request_alumni', $data);
    }
    public function alumniStatus($id)
    {
        $alumni = User::find($id);
        if($alumni->is_alumni == 0)
        {
            $alumni->is_alumni = 1;
        }elseif($alumni->is_alumni == 1)
        {
            $alumni->is_alumni = 0;
        }
        $alumni->update();
        return redirect()->route('admin.alumni.index')->with('message', 'Status updated.');
    }

    function changePassword(Request $request){
        try{
            $user =  User::find($request->user_id);
            $user->password = $request->password;
            $user->save();

             //user
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['password'] = $request->password;
            $details['email'] = $user->email;
            $details['send_item']= new UserEmail($data);
            dispatch(new \App\Jobs\SendEmailJob($details));
            ///email notification end
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Password Change Successfully.'
            ]);
        }catch(\Exception $e){
            //DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }

    }
   
}
