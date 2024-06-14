@if(auth()->user()->isAdmin == true)


<x-app-layout>
    
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
        </x-slot>

        @if (session('success'))
        <div style="color: rgb(1, 17, 1); border: 1px solid black; padding: 10px; margin: 10px 0;width:fit-content">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12">
        <div style="margin-bottom:10px;" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <a href="{{route("admin.items")}}"><u>Go to newsitems</u><a>
                    </div>   
                </div>
        </div> 

      <!--  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{route("create-item")}}"><u>>Create new project<</u><a>
                </div>   
            </div>
    </div> -->

    <div style="margin-bottom:10px;" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{route("admin.user.list")}}"><u>Go to user list</u><a>
            </div>   
        </div>
</div> 


<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <a href="{{route("admin.faq")}}"><u>Go to FAQ</u><a>
        </div>   
    </div>
</div> 

    </div>
    

</x-app-layout>

@endif
