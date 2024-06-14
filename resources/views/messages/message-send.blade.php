





<x-app-layout>
    <x-slot name="header">
        <h2  class="font-semibold text-xl text-gray-800 leading-tight">
            
            <a style=padding-right:10% href="{{route('show.message.send')}}"><u>Send Message</u><a>
                @if(auth()->user()->isAdmin == true) <a style=padding-right:20px href="{{route('list.contact.form.messages')}}">Contact form messages<a>@endif
                <a href="{{route('list.internal.messages')}}">Internal messages<a>
        </h2>
    </x-slot>

    
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
       
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
                                          
<div class="email-container">
    <form method="POST" action="{{route('store.message')}}" >
        @csrf
        <u> <p>To:</p></u>
        <input name="recipient" required type="email" required maxlength="255">
        <br>
    <br>
       <u> <p>Title:</p></u>
        <input name="title" required type="text" required maxlength="255">
        <br><br>
        
        
        <u> <p>Body:</p></u>
        <textarea name='body' rows="4" cols="50" required maxlength="10000"></textarea>
        <br><br>
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
   
  
    <br><hr><br>

    <a href="{{route('messages')}}">Go Back</a>


  





            </div>
        </div>
    </div>
</x-app-layout>



