<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>

            
            
                <div  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    
                           <u> <p>Title:</p></u>
                           {{ $item->title }}
                            <br>
                            <br>
                            <u> <p>Tag:</p></u>
                           {{ $item->tag }}
                            <br>
                            <br>
                            <u> <p>Description:</p></u>
                            {{$item->description}}

                            <br><br>
                            <br><br>

                            <a href="{{route('dashboard')}}"><b><u>ga terug</u></b></a>
                            
                            
                        
                    
                    
                </div>
           
        </div>
    </div>
</x-app-layout>


