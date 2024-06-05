
           
@if(auth()->user()->isAdmin == true)


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

  
                        
    <div class="py-12">
        <div  class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                

            
            
                <div style="padding: 20px"  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form method="POST" action="{{route('cat.store')}}" >
                        @csrf
                       <u> <p>Name:</p></u>
                        <input name="name" required type="text">
                        <br>
                        <br><br>
                        <button type="submit">Create</button>

                    </form>
                    <br>
                    <br>
                    <br>

                        @if(isset($tags))
                        
                        @foreach($tags as $tag)
                        
                        <h1>{{$tag->name}}</h1>
                        <br>
                        
                        @endforeach
                        @else
                        <p> No categories </p>
                        @endif
                      
                
                
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
</div>
    

</x-app-layout>

@endif
