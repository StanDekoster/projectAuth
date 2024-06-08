@if(auth()->user()->isAdmin == true)


<x-app-layout>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <a href="{{route("admin.items")}}"><u>>Go to newsitems<</u><a>
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

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{route("admin.user.list")}}"><u>>Go to user list<</u><a>
            </div>   
        </div>
</div> 


<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <a href="{{route("admin.faq")}}"><u>>Go to FAQ<</u><a>
        </div>   
    </div>
</div> 

    </div>
    

</x-app-layout>

@endif
