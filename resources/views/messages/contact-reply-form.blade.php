





<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reply Contact Message from '.$message->senderName) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
       
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
               
                    
                                          
<div class="email-container">
    <form method="POST" action="{{route('store.to.mail',['message' =>$message])}}" >
        @csrf
        <u> <p>To:</p></u>
        <input name="recipient" required type="text" value="{{$message->sender}}">
        <br>
    <br>
       <u> <p>Title:</p></u>
        <input name="title" required type="text" value="RE:{{$message->title}}">
        <br>
        <br>
        
        <u> <p>Body:</p></u>
        <textarea name='body' rows="4" cols="50"></textarea>
        <br>
        <br>
        <u><button type="submit">Send</button></u>
    </form>
</div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


</div> 
        </div>
    </div>
</x-app-layout>



