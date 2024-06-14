<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailService;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;



class MailController extends Controller
{
    public function sendEmail(Message $message)
    {
        

        
        if (Auth::check() && Auth::user()->isAdmin) {
           
            $details = [
                'title' => $message->title,
                'body' => $message->body
            ];
    
            Mail::to($message->recipient)->send(new MailService($details));
    
            return redirect(route('messages'))->with('success','Email sent successfully');
            
        }

        
        return view('admin.restricted');
        
    }
}