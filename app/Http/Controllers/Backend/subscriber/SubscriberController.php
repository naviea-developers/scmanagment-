<?php

namespace App\Http\Controllers\Backend\subscriber;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscribedMail;

class SubscriberController extends Controller
{
    public $emailData = [];

    public function index()
    {
        return view('Backend.subscriber.index', ['subscribers' => Subscriber::all()]);
    }

    public function add_subscription(Request $request){

      

        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);
        $isSubscribed = Subscriber::where('email', $request->email)->exists();

        if ($isSubscribed) {
            return redirect()->back()->with('success', 'Your email is already subscribed. Thank You.');
        }

        /**** Subscriptions ******/

        $subscriptions = new Subscriber();

        $subscriptions->email = $request->email;

        $subscriptions->save();

        //-----------Mail-----------///
        $this->emailData = [
            'message'    => 'You are Subscribed Successfully, Thank You..',
        ];
        $send_mail = $subscriptions->email;
        Mail::to($send_mail)->send(new SubscribedMail($this->emailData));
        //-----------Mail-----------///

        return redirect()->back()->with('success','Subscribed Successfully, Thank you.');

    }

    public function destroy(Request $request)
    {
        Subscriber::find($request->subscriber_id)->delete();
        return back();
    }
}
