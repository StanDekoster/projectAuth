<link rel="stylesheet" type="text/css" href ="{{url('css/main.css')}}">




<x-app-layout>
    <x-slot name="header">
        <h2  class="font-semibold text-xl text-gray-800 leading-tight">
            
            <a style=padding-right:10% href="{{route('show.message.send')}}">Send Message<a>
                @if(auth()->user()->isAdmin == true) <a style=padding-right:20px href="href="{{route('list.contact.form.messages')}}""><u>Contact form messages</u><a>@endif
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
       <u> {{ __('Unread contact form messages') }} </u>
    </h2>
    <p>administrator</p>
    
</div>

@if($unreadMessages->isEmpty())
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="">No unread contact form messages<a>
                </div>   
            </div>
        </div>
@else 

@foreach ($unreadMessages as $unreadMessage)

<div style="margin-left: 35px; display: flex; align-items: center;border-color:blue;" class="email-container">
    <div style="flex: 1;">
        <div class="email-header">
            <a href="{{ route('view.message', $unreadMessage) }}">From: {{ $unreadMessage->sender }}</a>
        </div>
        
        <div class="email-body">
            {{ $unreadMessage->title }}
        </div>
    </div>
    <form action="{{route('remove.email', $unreadMessage)}}" method="POST" style="margin-right: 50%;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');">
           <u>Delete</u>
        </button>
    </form>
</div>


@endforeach     
@endif
@endif





     

    <br><br>
    <div style="padding:35px">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       <u> {{ __('Read contact form Messages') }} </u>
    </h2>

    
</div>
    


@if($readMessages->isEmpty())
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="">No new internal messages<a>
                </div>   
            </div>
@else 

@foreach ($readMessages as $readMessage)

<div style="margin-left: 35px; display: flex; align-items: center;" class="email-container">
    <div style="flex: 1;">
        <div class="email-header">
            <a href="{{ route('view.message', $readMessage) }}">From: {{ $readMessage->sender }}</a>
        </div>
        
        <div class="email-body">
            {{ $readMessage->title }}
        </div>
    </div>
    <form action="{{route('remove.email', $readMessage)}}" method="POST" style="margin-right: 50%;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');">
           <u>Delete</u>
        </button>
    </form>
</div>


@endforeach   

@endif



</div>

    
    
</div>
</x-app-layout>


