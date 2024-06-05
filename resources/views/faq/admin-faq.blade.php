
           
@if(auth()->user()->isAdmin == true)


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

  
                        
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{route("admin.faq.create")}}"><u>>Create QA<</u><a>
            </div>   
        </div>
</div> 
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <a href="{{route("admin.cat.create")}}"><u>>Create Category<</u><a>
        </div>   
    </div>
</div> 
    
        @if(isset($f_a_q_s))
            @foreach($f_a_q_s as $faq)
                <div style="border: 2px solid rgb(24, 24, 27);border-radius: 10px; margin:5px; padding:5px">
                    <p>{{ $faq->question }}</p>
                    <p>{{ $faq->answer }}</p>
                </div>
            @endforeach
        @endif
    

</x-app-layout>

@endif
