


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (session('success'))
    <div style="color: rgb(1, 17, 1); border: 1px solid black; padding: 10px; margin: 10px 0;width:fit-content">
        {{ session('success') }}
    </div>
@endif

<br>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{route("user.user.list")}}"><u>Go to user list</u><a>
            </div>   
        </div>
</div> 

   
    

</x-app-layout>


