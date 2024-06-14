<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
            
            
                <div style="padding:20px" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form method="POST" action="{{route('update.profile',$profile)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 
                        <br><br>
                       <u> <p>Username:</p></u>
                        <input name="username" required type="text" value="{{$profile->username}}">
                        <br><br>
                        <u> <p>E-mail:</p></u>
                        <input name='email' type="text" value="{{$profile->email}}">
                        <br><br>
                        <u> <p>Birthday:</p></u>
                        <input name='birthday' type="date" value="{{$profile->birthday}}">
                        <br><br>
                        <u> <p>Avatar:</p></u> <img src="{{ asset('storage/' . $profile->avatar) }}" id="preview" alt="Avatar" class="img-thumbnail" style="width: 150px; height: 150px;">

                        <input type="file" name="avatar" id="avatar" value="{{$profile->avatar}}" onchange="previewImage(event)" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg">

                        <br><br>
                        <u> <p>About me:</p></u>
                        <textarea name='aboutme' rows="4" cols="50" >{{$profile->aboutme}}</textarea>
                        <br><br>
                        <button type="submit">Edit</button>
                    </form>
                    <br>
                    <hr>
                    <br>
                    <a href="{{route('profile')}}">Go Back<a> 
                        <br><br>
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
</x-app-layout>