<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livewire.profile.create-profile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//chatGPT
    {
        $user = Auth::user();
       
        
        $validator = $request->validate([
            'username' => 'required|max:255',
            'email' => 'nullable|string|email|max:255|unique:profiles,email,',  //chatgpt        
            'birthday' => 'nullable|date',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'aboutme' => 'required|string', 
        ]);


            // Store new avatar
           
        

        $profile = new Profile;
        $profile->user_id = Auth::id();
        $profile->username = $validator['username'];
        $profile->email = $validator['email'];
        $profile->birthday = $validator['birthday'];
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        $profile->avatar = $avatarPath;
        $profile->aboutme = $validator['aboutme'];


        $profile->save();
        
       

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return view('livewire.profile.view-profile',compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        return view('livewire.profile.edit-profile',compact('profile'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        
        $profileId = $profile->id;
        
        $validator = $request->validate([
            'username' => 'required|max:255',
            'email' => 'nullable|string|email|max:255|unique:profiles,email,'.$profileId, 
            'birthday' => 'nullable|date',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048,',
            'aboutme' => 'required|string', 
        ]);


        if ($request->hasFile('avatar')) {
            // Delete old avatar if it exists
            if ($profile->avatar) {
                Storage::delete($profile->avatar);
            }
    
            // Store new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $profile->avatar = $avatarPath;
        }
           
        $profile->username = $validator['username'];
        $profile->email = $validator['email'];
        $profile->birthday = $validator['birthday'];
        
        $profile->aboutme = $validator['aboutme'];


        $profile->save();
        
       

        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
