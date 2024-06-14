<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::User();
        if($user->isAdmin == true){
        $adminMessages = Message::where('recipient','admin')
        ->where('read',false)
        ->orderBy('created_at','desc')
        ->take(3)
        ->get();

        $totalAdminUnread = Message::where('recipient', 'admin')
        ->where('read',false)
        ->count();


        $internalMessages = Message::where('recipient',$user->email)
        ->where('read',false)
        ->orderBy('created_at','desc')
        ->take(3)
        ->get();

        $totalInternalUnread = Message::where('recipient', $user->email)
        ->where('read',false)
        ->count();

        return view('messages.index',compact('adminMessages','totalAdminUnread','internalMessages','totalInternalUnread'));
        }else{
            $internalMessages = Message::where('recipient',$user->email)
            ->where('read',false)
            ->orderBy('created_at','desc')
            ->take(3)
            ->get();
    
            $totalInternalUnread = Message::where('recipient', $user->email)
            ->where('read',false)
            ->count();
    
            
            return view('messages.index',compact('internalMessages','totalInternalUnread'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function contact()
    {
        return view('messages.contact-form');
    }

    public function sendContactForm(Request $request)
    {
        $validationData = $request->validate([
            'title'=> 'max:255',
            'body'=> 'required|max:10000',
            'senderName' =>'max:255',
            'sender' => 'string|email|max:255',
            


        ]);

        $message = new Message;
        $message -> title  = $validationData['title'];
        $message -> body  = $validationData['body'];
        $message -> senderName = $validationData['senderName'];
        $message -> sender  = $validationData['sender'];
        $message -> recipient = 'admin';

        $message->save();
       

        return back()->with('success', 'Contact message successfully sent.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationData = $request->validate([
            'title'=> 'max:255',
            'body'=> 'required|max:10000',
            
            'recipient' => 'string|email|max:255',
            


        ]);

        $message = new Message;
        $message -> title  = $validationData['title'];
        $message -> body  = $validationData['body'];
        $message -> sender  = Auth::user()->email;
        $message -> recipient = $validationData['recipient'];

        $message->save();

        return redirect(route('messages'))->with('success', 'Internal message successfully sent.');
    }

    public function storeToMail(Request $request)
    {
        $validationData = $request->validate([
            'title'=> 'max:255',
            'body'=> 'required|max:10000',
            'recipient' => 'string|email|max:255',
            


        ]);

        $message = new Message;
        $message -> title  = $validationData['title'];
        $message -> body  = $validationData['body'];
        $message -> sender  = 'Laravel Testing';
        $message -> recipient = $validationData['recipient'];

        $message->save();

        return redirect(route('send.reply.mail',['message' => $message]));
    }
    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        $message->read = true;
        $message->save();
        return view('messages.message-view',compact('message'));
    }
    public function contactReplyView(Message $message)
    {
        
        if (Auth::check() && Auth::user()->isAdmin) {
           
            return view('messages.contact-reply-form',compact('message'));

        }

        
        return view('admin.restricted');
    }

    public function messageReplyView(Message $message)
    {
        return view('messages.message-reply-form',compact('message'));
    }

    public function internalMessageList()
    {
        $user = Auth::user();

        $readMessages = Message::where('recipient',$user->email)
        ->where('read',true)
        ->orderBy('created_at','desc')
        ->get();

        
        $unreadMessages = Message::where('recipient',$user->email)
        ->where('read',false)
        ->orderBy('created_at','desc') 
        ->get();

        return view('messages.list-internal-messages',compact('readMessages','unreadMessages'));


    }

    
    public function contactFormMessageList()
    {
        
          
        if (Auth::check() && Auth::user()->isAdmin) {
           
            $readMessages = Message::where('recipient','admin')
        ->where('read',true)
        ->orderBy('created_at','desc')
        ->get();

        
        $unreadMessages = Message::where('recipient','admin')
        ->where('read',false)
        ->orderBy('created_at','desc') 
        ->get();

        return view('messages.list-contact-form-messages',compact('readMessages','unreadMessages'));



        }

        
        return view('admin.restricted');

    }

    

    public function messageSendView()
    {
        return view('messages.message-send');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->back()->with('success', 'message successfully removed.');;
    }
}
