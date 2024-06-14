
           
@if(auth()->user()->isAdmin == true)


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Q&A') }}
        </h2>
    </x-slot>

  
                        
    <div class="py-12">
        <div  class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                

            
            
                <div style="padding: 20px"  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form method="POST" action="{{route('faq.store')}}" >
                        @csrf
                        
                       <u> <p>Question:</p></u>
                        <input name="question"  required type="text" required maxlength="100">
                        <br><br>
                        
                        <u> <p>Answer</p></u>
                        <textarea name='answer' rows="4" cols="50" required maxlength="10000"></textarea>
                        <br><br>

                        @if($tags->isEmpty())
                        <u>No categories to add to</u>
                        @else
                        <u>Part of category:</u>
                        <br>
                        <br>
                        @foreach($tags as $tag)
                        
                        <label><input type="checkbox" name="tags[]" value="{{$tag->id}}">  {{$tag->name}}</label>
                        <br>
                        @endforeach
                        @endif
                        <br><br>
                        <button type="submit">Create</button>

                    </form>
                
                
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
