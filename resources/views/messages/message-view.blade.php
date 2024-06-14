






    <x-app-layout>
        <x-slot name="header">
            <h2  class="font-semibold text-xl text-gray-800 leading-tight">
                <a style=padding-right:10% href="{{route('show.message.send')}}">Send Message<a>
                    @if(auth()->user()->isAdmin == true) <a style=padding-right:20px href="{{route('list.contact.form.messages')}}">Contact form messages<a>@endif
                    <a href="{{route('list.internal.messages')}}">Internal messages<a>
            </h2>
        </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
       
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
                                          
<div class="email-container">
    <div">
        <u>Name:</u> {{ $message->senderName}} 
    </div>
    <br>
   
    <div">
        <u>From:</u> {{ $message->sender}} 
    </div>
    <br>
    
    <div>
       <u> Created:</u>  {{$message->created_at}}
    </div>
    <br>
    <br>
    <div>
        <u> Title:</u>{{$message->title}}
    </div>
    <br>
    
    <div>
        <u>Body:</u><br><br>  {{$message->body}}
    </div>
  
    <br><br><br>


@if($message->recipient =='admin')

<u><b><a href="{{route('show.contactform.reply',$message)}}">Reply</a></b></u>

@else
<u><b><a href="{{route('show.message.reply',$message)}}">Reply</a></b></u>
@endif

</div>


            </div>
        </div>
    </div>
</x-app-layout>



