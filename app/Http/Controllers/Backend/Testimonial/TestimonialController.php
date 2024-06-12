<?php

namespace App\Http\Controllers\Backend\Testimonial;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function manageTestimonial()
    {
        return view('Backend.testimonial.manage');
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'image',
            2 => 'name',
            3 => 'designation',
            4 => 'star',
            5 => 'status',
        );
        $totalData = Testimonial::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Testimonial::query();
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
                $nestedData['image'] = '<img src="' . $data_v->image_show . '" alt="subject Image" width="50" height="50">';
                $nestedData['name'] = $data_v->name;
                $nestedData['designation'] = $data_v->designation;
                $nestedData['star'] = $data_v->star;
              
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.status_testimonial', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.status_testimonial', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.edit_testimonial', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
                $nestedData['options'] .= '<button class="btn text-danger bg-white"  value="'.$data_v->id.'" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>';
 
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






    // public function addTestimonial()
    // {
    //     return view('Backend.testimonial.create');
    // }

    public function addTestimonialStor(Request $request)
    {
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
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;
        $testimonial->star = $request->star;

        if($request->hasFile('image')){
            $fileName = time().'_testimonial_image.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/testimonial'), $fileName);
            $testimonial->image =$fileName;
        }
        $testimonial->save();
        DB::commit();
        return response()->json([
            'status'=>'yes',
            'msg'=>'Testimonial Add Successfully'
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



    public function editTestimonial($id)
    {   $data['testimonial'] = Testimonial::find($id);
        return view('Backend.testimonial.update', $data);
    }
    public function updateTestimonial(Request $request, $id)
    {
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
        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;
        $testimonial->star = $request->star;

        if($request->hasFile('image')){
            @unlink(public_path('upload/testimonial/'.$testimonial->image));
            $fileName = time().'_testimonial_image.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/testimonial'), $fileName);
            $testimonial->image =$fileName;
        }
        $testimonial->save();
        DB::commit();
        return response()->json([
            'status'=>'yes',
            'msg'=>'Testimonial  Update Successfully'
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
    // public function deleteTestimonial(Request $request)
    // {
    //     $testimonial= Testimonial::find($request->testimonial_id);
    //     $path = public_path("upload/testimonial/".$testimonial->image);
    //     @unlink($path);

    //     $testimonial->delete();
    //     return redirect()->route('admin.manage_testimonial')->with('message', 'Delete Testimonial Successfully, Thank You.');
    // }


    public function deleteTestimonial(Request $request)
    {
        //dd($request);
        try{
            $testimonial= Testimonial::find($request->testimonial_id);
            $path = public_path("upload/testimonial/".$testimonial->image);
            @unlink($path);
    
            $testimonial->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Testimonial Deleted Successfully'
            ]);
        }catch(\Exception $e){
            //DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }




    public function testimonialStatus($id)
    {
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            if ($testimonial->status == 0) {
                $testimonial->status = 1;
            } elseif ($testimonial->status == 1) {
                $testimonial->status = 0;
            }
            $testimonial->update();

            $statusMessage = $testimonial->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Direction not found'
        ]);
    }

    //Status section









    // public function testimonialStatus($id)
    // {
    //     $testimonial = Testimonial::find($id);
    //     if($testimonial->status == 0)
    //     {
    //         $testimonial->status = 1;
    //     }elseif($testimonial->status == 1)
    //     {
    //         $testimonial->status = 0;
    //     }
    //     $testimonial->update();
    //     return redirect()->route('admin.manage_testimonial');
    // }
}
