<?php

namespace App\Http\Controllers\Backend\All_users;

use App\Http\Controllers\Controller;
use App\Mail\UserEmail;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Designation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function index()
    {
        // $data['teachers'] = User::where('type','2')->get();
        $data['designations'] = Designation::where('status',1)->get();
        return view("Backend.all_users.teacher.manage",$data);
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'image',
            2 => 'unique_id',
            3 => 'name',
            4 => 'designation_id',
            5 => 'teacher_type',
            6 => 'mobile',
            7 => 'email',
            8 => 'gender',
            9 => 'status',
        );
        $totalData = User::where('type', 2)->count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = User::where('type', 2);
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
                $nestedData['unique_id'] = $data_v->unique_id;
                $nestedData['image'] = '<img src="' . $data_v->image_show . '" alt="Teacher Image" width="50" height="50">';
                $nestedData['name'] = @$data_v->name;
                $nestedData['designation_id'] = @$data_v->user_designation->name;

                if ($data_v->teacher_type == 'permanent') {
                    $nestedData['teacher_type'] = 'Permanent';
                } elseif ($data_v->teacher_type == 'guest') {
                    $nestedData['teacher_type'] = 'Guest';
                }
                $nestedData['mobile'] = $data_v->mobile;
                $nestedData['email'] = $data_v->email;

                if ($data_v->gender == 0) {
                    $nestedData['gender'] = 'Male';
                } elseif ($data_v->gender == 1) {
                    $nestedData['gender'] = 'Female';
                }
              
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.teacher.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.teacher.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.teacher.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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



    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     // $data['courses'] = Course::orderBy('id','desc')->get();
    //     $data['designations'] = Designation::where('status',1)->get();
    //     return view("Backend.all_users.teacher.create",$data);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        // $request->validate([
        //     'name' => 'required',
        //     'email' => ['required', 'string', 'email', 'max:255','unique:'.User::class],
        //     'mobile' => ['required'],

        // ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255','unique:'.User::class],
            'mobile' => ['required'],

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }

        try{
            DB::beginTransaction();
            $user = New User;
            // $user->course_id = $request->course_id;
            $user->name = $request->name;
            $user->designation_id = $request->designation_id;
            $user->is_librarian = $request->is_librarian ?? 0;
            $user->teacher_type = $request->teacher_type;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->nid = $request->nid;
            $user->gender = $request->gender;
            $user->dob = $request->dob;

            $user->qualification = $request->qualification;
            $user->experience = $request->experience;
            $user->language = $request->language;
            $user->country = $request->country;

            $user->address = $request->address ?? "";
            $user->institution = $request->institution ?? "";
            $user->designation = $request->designation ?? "";
            $user->description = $request->description ?? "";
            $user->type = 2;
            $user->password = 12345678;

            // Social URL
            $user->facebook_id = $request->facebook_id;
            $user->twitter_id = $request->twitter_id;
            $user->google_id = $request->google_id;
            $user->instagram_id = $request->instagram_id;

            // Bank Information
            $user->bank_name = $request->bank_name;
            $user->bank_code_ifsc = $request->bank_code_ifsc;
            $user->bank_account_number = $request->bank_account_number;
            $user->bank_ac_holder_name = $request->bank_ac_holder_name;
            $user->paypal_id_num = $request->paypal_id_num;

            if($request->hasFile('image')){
                $fileName = rand().time().'_image.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/users/'),$fileName);
                $user->image = $fileName;
            }

            // if($request->hasFile('video')){
            //     $fileName = rand().time().'_video.'.request()->video->getClientOriginalExtension();
            //     request()->video->move(public_path('upload/users/'),$fileName);
            //     $user->video = $fileName;
            // }

            $user->save();


            // Generate a unique ID in the format TYYYYMMDD(user_id)
            $uniqueId = 'T' . date('Y') . $user->id;
            $user->unique_id = $uniqueId;
            $user->save();


            //add certificate file
        if($request->certificates_file){
            foreach( $request->certificates_file as $k=>$value){
                $certificates = new Certificate();
                $certificates->user_id = $user->id;
                $certificates->certificates_name = $request->certificates_name[$k];
                $filename=$request->certificates_name[$k].'-'.$user->name.'_certificat_file'.'.'.$value->getClientOriginalExtension();
                $value->move(public_path('upload/certificates/'), $filename);
                $certificates->certificates_file=$filename;
                $certificates->extension = $value->getClientOriginalExtension();
                $certificates->save();
            }
        }

        //user
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['password'] = 12345678;
        $details['email'] = $user->email;
        $details['send_item']= new UserEmail($data);
        dispatch(new \App\Jobs\SendEmailJob($details));
        ///email notification end

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Teacher Add Successfully'
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
        $data["teacher"]= User::find($id);
        $data['designations'] = Designation::where('status',1)->get();
        return view("Backend.all_users.teacher.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
    //    $request->validate([
    //     'name' => 'required',
    //     'email' => ['required', 'string', 'email', 'max:255'],
    //     'mobile' => ['required'],

    // ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile' => ['required'],

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }

        try{
            DB::beginTransaction();
            $user = User::find($id);
            $user->name = $request->name;
            $user->designation_id = $request->designation_id;
            $user->is_librarian = $request->is_librarian ?? 0;
            $user->teacher_type = $request->teacher_type;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->nid = $request->nid;
            $user->dob = $request->dob;

            $user->gender = $request->gender;
            $user->qualification = $request->qualification;
            $user->experience = $request->experience;
            $user->language = $request->language;
            $user->country = $request->country;
            $user->status = $request->status;

            $user->type = 2;
            $user->address = $request->address ?? "";
            $user->institution = $request->institution ?? "";
            $user->designation = $request->designation ?? "";
            $user->description = $request->description ?? "";

            // Social URL
            $user->facebook_id = $request->facebook_id;
            $user->twitter_id = $request->twitter_id;
            $user->google_id = $request->google_id;
            $user->instagram_id = $request->instagram_id;
            
            // Bank Information
            $user->bank_name = $request->bank_name;
            $user->bank_code_ifsc = $request->bank_code_ifsc;
            $user->bank_account_number = $request->bank_account_number;
            $user->bank_ac_holder_name = $request->bank_ac_holder_name;
            $user->paypal_id_num = $request->paypal_id_num;


            if($request->hasFile('image')){
                @unlink(public_path('upload/users/'.$user->image));
                $fileName = rand().time().'_caruser.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/users/'),$fileName);
                $user->image = $fileName;
            }
            $user->save();

            // Generate a unique ID in the format TYYYYMMDD(user_id)
            $uniqueId = 'T' . date('Y') . $user->id;
            $user->unique_id = $uniqueId;
            $user->save();

            
            //add certificate file
            if($request->certificates_file){
                foreach( $request->certificates_file as $k=>$value){
                    $certificates = new Certificate();
                    $certificates->user_id = $user->id;
                    $certificates->certificates_name = $request->certificates_name[$k];
                    $filename=$request->certificates_name[$k].'-'.$user->name.'_certificat_file'.'.'.$value->getClientOriginalExtension();
                    $value->move(public_path('upload/certificates/'), $filename);
                    $certificates->certificates_file=$filename;
                    $certificates->extension = $value->getClientOriginalExtension();
                    $certificates->save();
                }
            }

            //Update certificate file

            //  $request->validate([
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            //     'pdf' => 'required|mimes:pdf|max:2048', // Max 2MB
            // ]);

            if($request->old_certificates_name){
                foreach($request->old_certificates_name as $k => $value){
                    $certificates = Certificate::find($k);
                    $certificates->user_id = $user->id;
                    $certificates->certificates_name = $value;

                    if(isset($request->file('old_certificates_file')[$k])){
                        @unlink(public_path('upload/certificates/'.$certificates->certificates_file));
                        $filename=$request->old_certificates_name[$k].'-'.$user->name.'_certificat_file'.'.'.$request->file('old_certificates_file')[$k]->getClientOriginalExtension();
                        $request->file('old_certificates_file')[$k]->move(public_path('upload/certificates/'), $filename);
                        $certificates->certificates_file=$filename;
                        $certificates->extension = $request->file('old_certificates_file')[$k]->getClientOriginalExtension();
                    }
                    

                    $certificates->update();
                }
            }

            //delete certificate file
            if($request->delete_certificates_file){
                foreach($request->delete_certificates_file as $k => $value){
                    $audio = Certificate::find($value);
                    @unlink(public_path('upload/certificates/'.$audio->certificates_file));
                    $audio->delete();

                }
            }

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Teacher Update Successfully'
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
    // public function destroy(Request $request)
    // {

    //     $user =  User::find($request->teacher_id);
    //     @unlink(public_path('upload/users/'.$user->image));

    //     $user->delete();
    //     return back()->with('message','TeacherProfile Deleted Successfully');
    // }
    public function destroy(Request $request)
    {
        try{
            $user =  User::find($request->teacher_id);
            @unlink(public_path('upload/users/'.$user->image));
            $user->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Teacher Profile Deleted Successfully'
            ]);
        }catch(\Exception $e){
            //DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
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

    public function status($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->status == 0) {
                $user->status = 1;
            } elseif ($user->status == 1) {
                $user->status = 0;
            }
            $user->update();

            $statusMessage = $user->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Teacher not found'
        ]);
    }
}
