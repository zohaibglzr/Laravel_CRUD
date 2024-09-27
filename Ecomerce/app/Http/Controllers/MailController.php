<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        // Get the required email, message, and subject from the request
        $email = $request->input('email');
        $message = $request->input('message');
        $subject = $request->input('subject');

        // Dispatch the SendEmail job to the queue
        SendEmail::dispatch($email, $message, $subject);

        return response()->json(['message' => 'Email is being sent via queue']);
    }
}


// namespace App\Http\Controllers;

// use App\Mail\welcomeemail;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail;

// class MailController extends Controller
// {
//     public function sendEmail(){
//         $toEmail = "zohaibgulzar2474@gmail.com";
//         $message = "Laravel Testing";
//         $subject = "Welcome to laravel world";

//         $request = Mail::to($toEmail)->send(new welcomeemail($message,$subject));
//         dd($request);
//     }
// }
