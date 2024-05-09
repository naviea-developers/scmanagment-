<?php

namespace App\Http\Controllers\Backend\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index(Request $request){
        $data['notifications'] = Notification::get();
        return view("Backend.notification.index",$data);
    }

    public function destroy(Request $request)
    {
        $notification= Notification::find($request->notification_id);
        $notification->delete();
        return redirect()->route('admin.all.notification.index');

    }

    public function allNotification(Request $request){
        $data['notifications'] = Notification::where('user_id',auth()->guard('admin')->user()->id)->orderBy('id','desc')->paginate(12);
        return view("Backend.notification.all-notification",$data);
    }

    //ajax get notification
        public function getBackendNotification(){
        $data['notifications'] = Notification::where('user_id',auth()->guard('admin')->user()->id)->orderBy('id','desc')->paginate(6);
        return view('Backend.notification.ajaxseemorenotification',$data);
    }
}
