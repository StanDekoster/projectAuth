<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <a href="{{route("create-item")}}"><u>>Create Item<</u><a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if(isset($items))
                    @foreach($items as $item)
                    <div style="border: 3px solid rgb(24, 24, 27); margin:5px; padding:5px">
                       <u> <a href="{{route('item.view',['item'=>$item])}}">{{ $item->title }}</a> </u>
                       
                       <form action="{{ route('item.like', ['item' => $item->id]) }}" method="POST">
                        @csrf
                        <button type="submit">Like</button>
                        </form>

                       <br><br>
                       <p>By: {{$item->user->name}}<p>
                       <div style="position:absolute;left : 50%">
                       
                       <form action="{{ route('remove.item', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');">
                            Remove post
                        </button>
                    </form>
                </div>

                       <br><br>
                        <a href="{{route('item.edit', $item)}}">Edit post</a>
                        
                    </div>
                    @endforeach
                    @endif
                </div>
               
           
        </div>

    </div>
</x-app-layout>
