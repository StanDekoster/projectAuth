<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    
    @if (session('success'))
    <div style="color: rgb(1, 17, 1); border: 1px solid black; padding: 10px; margin: 10px 0;width:fit-content">
        {{ session('success') }}
    </div>
@endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
       
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Public Profile Information') }}
                        </h2> 
          </header>
         <?php $user = Auth::user(); ?>
               @if (isset($user->profile))
               <br>
               <div class="flex items-center gap-4">
                <a href="{{route('edit.profile',['profile'=>$user->profile])}}"><u>Edit profile</u></a>
                
                <br>
                <br>
                <a href="{{route('view.profile',[$user->id])}}"><u>View Profile</u></a>
                    
            </div>
               @else
               <br>
               <p>No profile</p>
               <br>
               <div class="flex items-center gap-4">
                <a href="{{route('create.profile')}}"><u>Create Profile</u></a>
            </div>
               @endif
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
