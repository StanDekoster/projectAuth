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
                        <form method="POST" action="{{route('item.update', $item)}}"enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                    
                    
                           <u> <p>Title:</p></u>
                            <input name='title' type="text" value="{{ $item->title }}">
                            <br>
                    
                            <u> <p>Cover image:</p></u>
                          
                        
                        
            
                <img src="{{ asset('storage/' . $item->coverImage) }}" id="preview" src="#" alt="New Avatar Preview" class="img-thumbnail" style=" width: 150px; height: 150px;">
            
            <input type="file" name="coverImage" id="coverImage"  onchange="previewImage(event)">
                       
                        <br>
                            <u> <p>Description:</p></u>
                            <textarea name='description' rows="4" cols="50">{{$item->description}}</textarea>
                            <br>
                            <button type="submit">Edit</button>
                        </form>
                        <script>
                            function previewImage(event) {
                                var reader = new FileReader();
                                reader.onload = function(){
                                    var output = document.getElementById('preview');
                                    output.src = reader.result;
                                    output.style.display = 'block';
                                }
                                reader.readAsDataURL(event.target.files[0]);
                            }
                            </script>
                    
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


