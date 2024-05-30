@if(auth()->user()->isAdmin == true)

<p> ok yes</p>
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
                        <a href="{{route("create-item")}}"><u>>Create newsitem<</u><a>
                    </div>   
                </div>
        </div> 

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{route("create-item")}}"><u>>Create new project<</u><a>
                </div>   
            </div>
    </div> 

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{route("admin.user.list")}}"><u>>Go to user list<</u><a>
            </div>   
        </div>
</div> 

    </div>
    

</x-app-layout>

@endif
