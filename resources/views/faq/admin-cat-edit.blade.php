
           
@if(auth()->user()->isAdmin == true)


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

  
                        
    <div class="py-12">
        <div  class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                

            
            
                <div style="padding: 20px"  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form method="POST" action="{{route('cat.update',$tag)}}" >
                        @csrf
                        @method('PUT')
                       <u> <p>Name:</p></u><br>
                        <input name="name" required type="text" value="{{$tag->name}}" required maxlength="255">
                        <br>
                        <br><br>
                        <button type="submit">Edit</button>

                    </form>
                </div>
                    
                    
                    <br>
                    <div style="margin-left:20px">

                    <form action="{{ route('cat.remove', $tag->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this Category?');">
                            Remove 
                        </button>
                    </form>
                </div>
                    <br>
                    <hr>
                    <div style="margin-left:20px">
                        
                        <br>
                    <a href="{{route('admin.faq')}}">Go Back<a>
                    <br>
                    <br>
                    
                </div>
            
        </div>
                    <br><br><br>

                    <div class="py-12">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div style="padding: 20px"  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        @if(isset($tags))
                       <u> <p> Category list</p> </u>
                        <br>
                        @foreach($tags as $tag)
                        
                        <div style=" display: flex; align-items: center;" >
                       <div>
                            <h1>{{$tag->name}}</h1>
                       </div>
                        <div style="position:absolute; margin-left:30%">
                        <form action="{{ route('cat.remove', $tag->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this Category?');">
                               <u>Remove</u> 
                            </button>
                        </form>
                    </div>
                        <br><br>
                    </div>
                        
                        
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
