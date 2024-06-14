<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div  class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('failure'))
                <div style="color: rgb(1, 17, 1); border: 1px solid black; padding: 10px; margin: 10px 0;width:fit-content">
                    {{ session('failure') }}
                </div>
            @endif
               
            
            
                <div style="padding:20px"  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form method="POST" action="{{route('store.profile')}}" enctype="multipart/form-data">
                        @csrf
                        <br>
                       <u> <p>Username:</p></u>
                        <input name="username" required type="text">
                        <br><br>
                        <u> <p>E-mail:</p></u>
                        <input name='email' type="text" >
                        <br><br>
                        <u> <p>Birthday:</p></u>
                        <input name='birthday' type="date" >
                        <br><br>
                        <u> <p>Avatar:</p></u>
                        <img   id="preview" src="#" alt="New Avatar Preview" class="img-thumbnail" style=" width: 150px; height: 150px;display:none">

                        <input type="file" name="avatar" id="avatar" onchange="previewImage(event)" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg">
                        <br><br>
                        <u> <p>About me:</p></u>
                        <textarea name='aboutme' rows="4" cols="50" required maxlength="10000"></textarea>
                        <br><br>
                        <button type="submit">Create</button>
                    </form>
                    <br>
                    <hr>
                    <br>
                    <a href="{{route('profile')}}">Go Back<a> 
                
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