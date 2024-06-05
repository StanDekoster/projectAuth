<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                

            
            
                <div style="border: 2px solid rgb(24, 24, 27);border-radius: 10px; margin:5px; padding:5px;display: flex">
                    <div style="width: 40%">
                   <u> <a href="{{route('visitor.item.view',$item)}}">{{ $item->title }}</a> </u>
                   
                   

                   <br><br>
                   
                    <img src="{{ asset('storage/' . $item->coverImage) }}" alt="coverImage" class="img-thumbnail" style="width: 150px; height: 150px;">
                   
                    </div>


                   <div style=" display: flex;
                   flex-direction: column;
                   justify-content: space-between;">
                    <p>Created: {{$item->created_at}}</p>
                    
                    <p>Updated: {{$item->updated_at}}</p>
                    
                   <br>
                   <br>
                   <br>
                   <p style='word-break: break-word;'>{{$item->description}}</p>

                   <br><br>
                   <br><br>

            </div>

                   
                    
                </div>

                            <a href="{{route('dashboard')}}"><b><u>ga terug</u></b></a>
                            
                            
                        
                    
                    
                
           
        </div>
    </div>
</x-app-layout>


