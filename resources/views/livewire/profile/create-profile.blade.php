<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
            
            
                <div  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form method="POST" action="{{route('store.profile')}}" enctype="multipart/form-data">
                        @csrf
                        <br>
                       <u> <p>Username:</p></u>
                        <input name="username" required type="text">
                        <br>
                        <u> <p>E-mail:</p></u>
                        <input name='email' type="text" >
                        <br>
                        <u> <p>Birthday:</p></u>
                        <input name='birthday' type="date" >
                        <br>
                        <u> <p>Avatar:</p></u>
                        <input type="file" name="avatar" id="avatar">
                        <br>
                        <u> <p>About me:</p></u>
                        <textarea name='aboutme' rows="4" cols="50"></textarea>
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
</x-app-layout>