<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail;

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
}
