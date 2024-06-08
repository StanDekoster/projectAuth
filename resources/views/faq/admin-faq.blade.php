
           
@if(auth()->user()->isAdmin == true)


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

  
    <br>                  
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
    <br>
    <br>


    
                
       
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Categories and their respective Q&A pairs') }}
    </h2>
    <br>
    @if(isset($tags))
    
        @foreach($tags as $tag)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
            <u><a href="{{route('cat.edit',$tag)}}">{{ $tag->name }}</a></u>     

            <br><br>
            <ul>
                @if($tag->faq->isEmpty())
                <li>No FAQs for this category.</li>
                
                
                @else
                @foreach($tag->faq as $faq)
                <li>
                    <strong>Q:</strong><a href="{{route('faq.edit',$faq)}}"> {{ $faq->question }}</a><br><br>
                    <strong>A:</strong><a href="{{route('faq.edit',$faq)}}"> {{ $faq->answer }}</a>
                </li>
                <br><br>
               
                
                @endforeach
               @endif
            </ul>
        </div>   
    </div>
</div> 
        @endforeach
    
    @endif
    <br><br>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __(' Q&A unpaired') }}
    </h2>
    <br>
    @if(isset($faqs))
    
        @foreach($faqs as $faq)
       
       
        @if($faq->tags->isEmpty()) 
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                        <strong>Q:</strong><a href="{{route('faq.edit',$faq)}}"> {{ $faq->question }}</a><br><br>
                        <strong>A:</strong><a href="{{route('faq.edit',$faq)}}"> {{ $faq->answer }}</a>
                    
        </div> 
          
    </div>
    
</div> 
<br>
@endif
        @endforeach
    
    @endif    

</x-app-layout>

@endif
