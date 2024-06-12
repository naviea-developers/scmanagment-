<?php

namespace App\Http\Controllers\Backend\Location;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['countries'] = Country::all();
        $data['continents'] = Continent::all();
        return view('Backend.location.country.manage', $data);
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'image',
            2 => 'continent_name',
            3 => 'name',
            // 4 => 'code',
            4 => 'status',
        );
        $totalData = Country::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Country::query();
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
                $nestedData['image'] = '<img src="' . $data_v->image_show . '" alt="Image" width="50" height="50">';
                $nestedData['continent_name'] = $data_v->continent->name;
                $nestedData['name'] = $data_v->name;
                // $nestedData['code'] = $data_v->code;
              
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.country.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.country.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('country.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['continents'] = Continent::all();
        return view('Backend.location.country.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $country = new Country();
    //     $country->continent_id = $request->continent_id;
    //     $country->name = $request->name;
    //     // $country->code = $request->code;
    //     if($request->hasFile('image')){
    //         $fileName = rand().time().'_country_image.'.request()->image->getClientOriginalExtension();
    //         request()->image->move(public_path('upload/countries/'),$fileName);
    //         $country->image = $fileName;
    //     }
    //     $country->save();
    //     return redirect()->back()->with('message', 'Country Create Successfully, Thank You.');
    // }

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
            $country = new Country();
            $country->continent_id = $request->continent_id;
            $country->name = $request->name;
            // $country->code = $request->code;
            if($request->hasFile('image')){
                $fileName = rand().time().'_country_image.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/countries/'),$fileName);
                $country->image = $fileName;
            }
            $country->save();

            DB::commit();
           
            return response()->json([
                'status'=>'yes',
                'msg'=>'Country Add Successfully'
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
        $data['country'] = Country::find($id);
        $data['continents'] = Continent::all();
        return view('Backend.location.country.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $country = Country::find($id);
    //     $country->continent_id = $request->continent_id;
    //     $country->name = $request->name;
    //     //  $country->code = $request->code;
    //     if($request->hasFile('image')){
    //         @unlink(public_path('upload/countries/'.$country->image));
    //         $fileName = rand().time().'_country_image.'.request()->image->getClientOriginalExtension();
    //         request()->image->move(public_path('upload/countries/'),$fileName);
    //         $country->image = $fileName;
    //     }
    //     $country->update();
    //     return redirect()->route('country.index')->with('message', 'Country Update Successfully, Thank You.');
    // }


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
            $country = Country::find($id);
            $country->continent_id = $request->continent_id;
            $country->name = $request->name;
            //  $country->code = $request->code;
            if($request->hasFile('image')){
                @unlink(public_path('upload/countries/'.$country->image));
                $fileName = rand().time().'_country_image.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/countries/'),$fileName);
                $country->image = $fileName;
            }
            $country->update();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Country Update Successfully'
            ]);
            
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function delete(Request $request)
    // {
    //     $country = Country::find($request->country_id);
    //     @unlink(public_path('upload/countries/'.$country->image));
    //     $country->delete();
    //     return back()->with('message','Country Deleted Successfully');
    // }

    public function destroy(Request $request)
    {
        //dd($request);
        try{
            $country = Country::find($request->country_id);
            @unlink(public_path('upload/countries/'.$country->image));
            $country->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Country Deleted Successfully'
            ]);
        }catch(\Exception $e){
            //DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }

    // public function status_toggle($id)
    // {
    //     $country = Country::find($id);
    //     if($country->status == 0)
    //     {
    //         $country->status = 1;
    //     }elseif($country->status == 1)
    //     {
    //         $country->status = 0;
    //     }
    //     $country->update();
    //     return redirect()->back()->with('message', 'Status updated');
    // }

    public function status($id)
    {
        $country = Country::find($id);
        if ($country) {
            if ($country->status == 0) {
                $country->status = 1;
            } elseif ($country->status == 1) {
                $country->status = 0;
            }
            $country->update();

            $statusMessage = $country->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Country not found'
        ]);
    }



}
