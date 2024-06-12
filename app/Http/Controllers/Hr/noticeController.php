<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Models\Hr\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

class noticeController extends Controller
{
    public function addNotice(){
        return view('Hr.notice.addNotice');
    }

    public function storeNotice(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'notice'=>'required',
            'description'=>'required',
        ]);
        $notice = New Notice;
        $notice->notice_name = $request->name;
        $notice->notice_type = $request->notice;
        $notice->notice_description = $request->description;
        $notice->notice_status = $request->status;
        $notice->created_at = now();
        $notice->save();
        // dd($notice);
        return redirect()->route('viewNotice');
    }

    public function viewNotice(){

        // $notice = Notice::get();
        // dd($notice);

        return view('Hr.notice.manageNotice');

    }
    function ajaxDataList(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'notice_type',
            2 => 'notice_name',
            3 => 'notice_status',
        );
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $totalData = Notice::count();

        $totalFiltered = $totalData;
        if (empty($search)) {
            $notices = Notice::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        }else{
            $notices = Notice::where(function ($query) use ($search) {
                    $query->where("notice_name", "LIKE", "%{$search}%")
                    ->orWhere("notice_type", "LIKE", "%{$search}%")
                    ->orWhere("notice_description", "LIKE", "%{$search}%");
                });

            $totalFiltered = $notices->count();

            $notices =$notices->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
            ->get();
        }
        $data = array();
        if (!empty($notices)) {
            $i = $start == 0 ? 1 : $start + 1;
            foreach ($notices as $notice) {
                $nestedData['id'] = $notice->id;
                $nestedData['serial_no'] = $i++;
                $nestedData['name'] = $notice->notice_name;
                $nestedData['type'] = $notice->notice_type;
                $status = "";
                if($notice->notice_status == "active"){
                   $status='  <a href="'. url('updateNoticeStatus') .'/'.$notice->id.'" type="submit" class="btn btn-success">Active</a>';
                }else{
                     $status='  <a href="'. url('updateNoticeStatus') .'/'.$notice->id.'" type="submit" class="btn btn-danger">Deactive</a>';
                }
                $option = "";
                $option .='<a href="'. url('editNotice') .'/'. $notice->id .'" class="btn btn-primary"><i class="bx bx-edit"></i></a>';
                $option .='<button type="button" del_data="'. $notice->id .'" class="del_hr_data btn btn-danger ms-1"><i class="bx bx-trash"></i></button>';
                $nestedData['status'] = $status;
                $nestedData['created_at'] = $notice->created_at;
                $nestedData['expenses'] = $notice->expenses == 1 ? 'Yes' : 'No';
                $nestedData['options'] = $option;

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

    public function editNotice($id){

        $editNotice = DB::table('notices')->where('id', $id)->get();


        return view('Hr.notice.editNotice', compact('editNotice'));
    }

    public function updateNotice(Request $request,$id){

        $this->validate($request,[
            'name'=>'required',
            'notice'=>'required',
            'description'=>'required',
        ]);
        $notice =  Notice::find($id);
        $notice->notice_name = $request->name;
        $notice->notice_type = $request->notice;
        $notice->notice_description = $request->description;
        $notice->notice_status = $request->status;
        // $notice->created_at = now();
        $notice->save();

        // echo $course;
        // // dd($course);

        return redirect()->route('viewNotice');

}

    public function deleteNotice($id){
        DB::table('notices')->where('id',$id)->delete();
        return redirect()->route('viewNotice');

    }

    public function updateNoticeStatus($id){
        $status = DB::table('notices')->where('id', $id)->first();

        if ($status->notice_status == 'active') {

            DB::table('notices')->where('id', $id)->update(['notice_status' => 'deactive']);

            return redirect('/viewNotice')->with('success', 'Status update Successfully');
        } else {

            DB::table('notices')->where('id', $id)->update(['notice_status' => "active"]);

            return redirect('/viewNotice')->with('success', 'Status update Successfully');
        }
    }
}
