
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if(isset($users))
    @foreach($users as $user)
    
        <div style="margin-top: 10px;margin-bottom:10px" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @if(isset($user->profile))
                        <a href="{{route('view.profile',[$user->id])}}"><u>{{$user->name}}</u><a>
                        @else
                        <a>{{$user->name}}</a>

                        @endif 
                            
                        @if($user->isAdmin == true) 
                        <u><bold style="margin-left: 100px">Admin status</bold></u>
                        
                        @else
                        
                        <u><bold style="margin-left: 100px">User status</bold></u>
                         
                        @if(auth()->user()->isAdmin == true)   
                        <div style="margin-left: 100px;border-width: 2px; border-color:black ; padding: 2px;display:inline-block">
                        <form  action="{{route('appoint.admin',$user)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" onclick="return confirm('Are you sure you want to appoint this user to Admin?');">
                                Appoint to admin
                            </button>  
                        </div>

                        @endif
                        @endif

                    </div>   
                
        </div> 

    </div>
    @endforeach
    @endif

</x-app-layout>
