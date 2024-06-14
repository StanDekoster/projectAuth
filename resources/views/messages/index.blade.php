<link rel="stylesheet" type="text/css" href ="{{url('css/main.css')}}">




<x-app-layout>
    <x-slot name="header">
        <h2  class="font-semibold text-xl text-gray-800 leading-tight">
            
            <a style=padding-right:10% href="{{route('show.message.send')}}">Send Message<a>
                @if(auth()->user()->isAdmin == true) <a style=padding-right:20px href="{{route('list.contact.form.messages')}}">Contact form messages<a>@endif
                <a href="{{route('list.internal.messages')}}">Internal messages<a>
        </h2>
    </x-slot>
    @if (session('success'))
    <div style="color: rgb(1, 17, 1); border: 1px solid black; padding: 10px; margin: 10px 0;width:fit-content">
        {{ session('success') }}
    </div>
@endif
    
   

    @if(auth()->user()->isAdmin == true)   
    <div style="padding:35px">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       <u> {{ __('Contact Form Messages') }} </u>
    </h2>
    <p>administrator</p>
    
</div>

@if($adminMessages->isEmpty())
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="">No new contact form messages<a>
                </div>   
            </div>
        </div>
@else 
<h1 style="margin-left:35px">Total unread messages :{{$totalAdminUnread}}</h1><br>
@foreach ($adminMessages as $message)

<div style="margin-left:35px;border-color:blue;" class="email-container">
    <div class="email-header">
      <a href="{{route('view.message',$message)}}">  From: {{$message->sender}}</a>  
    </div>
    
    <div class="email-body">
        {{$message->title}}
    </div>
</div>

<br>
@endforeach     
@endif
@endif





     

    <br><br>
    <div style="padding:35px">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       <u> {{ __('Internal Messages') }} </u>
    </h2>

    <p>{{auth()->user()->email}}</p>
</div>
    


@if($internalMessages->isEmpty())
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="">No new internal messages<a>
                </div>   
            </div>
@else 
<h1 style="margin-left:35px">Total unread messages :{{$totalInternalUnread}}</h1><br>
@foreach ($internalMessages as $internalMessage)

<div style="margin-left:35px;border-color:blue;" class="email-container">
    <div class="email-header">
      <a href="{{route('view.message',$internalMessage)}}">  From: {{$internalMessage->sender}}</a>  
    </div>
    
    <div class="email-body">
        {{$internalMessage->title}}
    </div>
</div>

<br>
@endforeach   

@endif



</div>

    
    
</div>
</x-app-layout>


