<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function show_all()
    {
        $subscribers = Subscriber::where('status','Active')->get();
        return view('backend.subscriber.subscriber_all', compact('subscribers'));
    }

    public function send_email()
    {
        return view('backend.subscriber.mail_to_subscriber');
    }

    public function send_email_submit(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'mailText' => 'required'
        ]);

        $subject = $request->subject;
        $message = $request->mailText;

        $subscribers = Subscriber::where('status','Active')->get();
        foreach($subscribers as $subscriber) {

            Mail::to($subscriber->email)->send(new Websitemail($subject,$message));
            // Mail::to($row->email)->send(new Websitemail($subject,$message));
        }


        return redirect()->back()->with('success', 'Email is sent successfully.');
    }


    public function SendVarify(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email'
        ],[
            'email.required' => "Email is required",
            'email.email' => "Email must be valid",
        ]);
        if(!$validator->passes())
        {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }
        else
        {
            $token = hash('sha256', time());
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->token = $token;
            $subscriber->status = 'Pending';
            $subscriber->save();

            // Send email
            $subject = 'Subscriber Email Verify';

            $verification_link = url('subscriber/verify/'.$token.'/'.$request->email);

            $message = 'Please click on the following link in order to verify as subscriber<br>';
            $message .= '<a href="'.$verification_link.'">';
            $message .= $verification_link;
            $message .= '</a>';

            Mail::to($request->email)->send(new Websitemail($subject,$message));

            return response()->json(['code'=>1,'success_message'=>"Please check your email address to verify as subscriber"]);
        }



    } 
     public function SubscriberVarify($token,$email)
        {
         $subscriber =  Subscriber::where(['token'=> $token])->where(['email'=>$email])->first();
         if($subscriber){
            $subscriber->token = '';
            $subscriber->status = 'active';
            $subscriber->update();
            return redirect()->back()->with(['message'=>'Successfully verified your Email ID','alert-type'=>'success']);
         }else{
            return redirect('/');
         }
        }
}
