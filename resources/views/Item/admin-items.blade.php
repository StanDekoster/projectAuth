<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News Items') }}
        </h2>
    </x-slot>
    @if (session('success'))
    <div style="color: rgb(1, 17, 1); border: 1px solid black; padding: 10px; margin: 10px 0;width:fit-content">
        {{ session('success') }}
    </div>
@endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
            </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <a href="{{route("create-item")}}"><u>>Create Item<</u><a>
                </div>
            </div>
            <br>
           
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if(isset($items))
                    @foreach($items as $item)
                    <div style="border: 3px solid rgb(24, 24, 27); margin:5px; padding:5px;display: flex">
                        <div style="width: 40%">
                       <u> <a href="{{route('item.view',['item'=>$item])}}">{{ $item->title }}</a> </u>
                       
                       

                       <br><br>
                       
                        <img src="{{ asset('storage/' . $item->coverImage) }}" alt="coverImage" class="img-thumbnail" style="width: 150px; height: 150px;">
                       <!-- <form action="{{ route('item.like', ['item' => $item->id]) }}" method="POST">
                            @csrf
                            <button type="submit">Like</button>
                            </form> -->
                        </div>


                       <div style=" display: flex;
                       flex-direction: column;
                       justify-content: space-between;">
                        <p>Created: {{$item->created_at}}</p>
                        
                        <p>Updated: {{$item->updated_at}}</p>
                        
                       <br>
                       <br>
                       <br>
                        <a href="{{route('item.edit', $item)}}">Edit Item</a>

                       <form action="{{ route('remove.item', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');">
                            Remove Item
                        </button>
                    </form>
                </div>

                       
                        
                    </div>
                    @endforeach
                    @endif
                </div>
               
           
        </div>

    </div>
</x-app-layout>
