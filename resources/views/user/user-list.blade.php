
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
 <br>
    @if(isset($users))
    @foreach($users as $user)
   
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <a href="{{route("create-item")}}"><u>{{$user->name}}</u><a>
                        @if($user->isAdmin == true) 
                        <u><bold style="margin-left: 100px">Admin status</bold></u>
            
                        @else
                         <u><bold style="margin-left: 100px">User status</bold></u>
                        @endif

                    </div>   
                </div>
        </div> 
        <br>

    
    @endforeach
    @endif

</x-app-layout>
