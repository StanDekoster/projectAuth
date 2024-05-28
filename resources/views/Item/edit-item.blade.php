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

            
            
                <div  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <p>ID:</p><p>{{$item->id}}
                        <form method="POST" action="{{route('item.update', $item)}}">
                            @csrf
                            @method('PUT')
                    
                    
                           <u> <p>Title:</p></u>
                            <input name='title' type="text" value="{{ $item->title }}">
                            <br>
                    
                            <u> <p>Tag:</p></u>
                            <input name='tag' type="text" value="{{ $item->tag }}">
                            <br>
                            <u> <p>Description:</p></u>
                            <textarea name='description' rows="4" cols="50">{{$item->description}}</textarea>
                            <br>
                            <button type="submit">Edit</button>
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
</x-app-layout>


