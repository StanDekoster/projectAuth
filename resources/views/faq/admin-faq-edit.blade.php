
           
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
                    <form method="POST" action="{{route('faq.update', $faq)}}" >
                        @csrf
                         @method('PUT')
                       <u> <p>Question:</p></u>
                        <input name="question"  value="{{$faq->question}}">
                        <br><br>
                        
                        <u> <p>Answer</p></u>
                        <textarea name='answer' rows="4" cols="50">{{$faq->answer}}</textarea>
                        <br><br>

                        
                        <u>Part of category:</u>
                        <br>
                        <br>
                        @foreach($tags as $tag)
                        
                        <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                            
                            @if($faq->tags->contains($tag->id)) checked @endif>
                             {{ $tag->name }}</label>
                        <br>
                        @endforeach
                        
                        <br><br>
                        <div>
                        <button type="submit">Edit</button> 
                        </div>
                            
                    </div>
                    </form>
                        <div style="margin-left: 20px">
                            <br>
                        <form action="{{ route('faq.remove', $faq->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this Q&A?');">
                                Remove 
                            </button>
                        </form>
                        <br>
                    </div>
                    <hr>
                    <div style="margin-left: 20px ">
                        
                        <br>
                    <a href="{{route('admin.faq')}}">Go Back<a>
                    <br>
                    <br>
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
                </div>
           
        </div>
    </div>
</div>
    

</x-app-layout>

@endif
