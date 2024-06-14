
           
@if(auth()->user()->isAdmin == true)


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

  
                        
    <div class="py-12">
        <div  class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                

            
            
                <div style="padding: 20px"  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form method="POST" action="{{route('cat.store')}}" >
                        @csrf
                       <u> <p>Name:</p></u>
                       <br>
                        <input name="name" required type="text" required maxlength="255">
                        <br>
                        <br><br>
                        <b><button type="submit">Create</button></b>

                    </form>
                    <br>
                    <br>
                    <u><a href="{{route('admin.faq')}}">Go Back<a></u>
                    <br>
                    <br>
                    <br>
                    <br>

                        @if($tags->isEmpty())
                        <p> No categories </p>
                        @foreach($tags as $tag)
                        
                        <h1>{{$tag->name}}</h1>
                        <br>
                        
                        @endforeach
                        @else
                       <b> <p>Categories:</p></b>
                        <br>
                        @foreach($tags as $tag)
                        
                        <h1>-{{$tag->name}}</h1>
                        <br>
                        
                        @endforeach
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
