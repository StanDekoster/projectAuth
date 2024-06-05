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
                    <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
                        @csrf
                       <u> <p>Title:</p></u>
                        <input name="title" required type="text">
                        <br>
                        <u> <p>Cover image:</p></u>
                        <input type="file" name="coverImage" id="coverImage">
                        <br>
                        <u> <p>Description:</p></u>
                        <textarea name='description' rows="4" cols="50"></textarea>
                        <br>
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
