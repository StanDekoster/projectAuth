
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
            
            
                <div style="padding : 30px"  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                    
                    
                    <img src="{{ asset('storage/' . $profile->avatar) }}" alt="Avatar" class="img-thumbnail" style="width: 150px; height: 150px;">
                    
                    {{ $profile->username }}
                     <br>
                     <br>
                     <u> <p>E-mail:</p></u>
                    {{ $profile->email }}
                     <br>
                     <br>
                     <u> <p>Birthday:</p></u>
                     {{ $profile->birthday }}
                      <br>
                      <br>
                      <u> <p>About me:</p></u>
                     {{ $profile->aboutme }}
                      <br>
                      <br>
                     
                      <br>
                      <br>
                     

                            <a href="{{route('dashboard')}}"><b><u>Go back</u></b></a>
                     
                            
                        
                    
                    
                </div>
           
        </div>
    </div>
</x-app-layout>




