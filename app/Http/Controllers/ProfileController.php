<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profile');
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
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'aboutme' => 'required|string', 
        ]);


            // Store new avatar
           
        

        $profile = new Profile;
        $profile->user_id = Auth::id();
        $profile->username = $validator['username'];
        $profile->email = $validator['email'];
        $profile->birthday = $validator['birthday'];
    

        if ($request->hasFile('avatar')) {
            $avatarImagePath = $request->file('avatar')->store('avatars', 'public');
            $profile->avatar = $avatarImagePath;
        }
        else{
            return redirect()->back()->with('failure','No avatar image provided : Please upload an avatar');
        }
        $profile->aboutme = $validator['aboutme'];


        $profile->save();
        
       
        return redirect()->route('profile')->with('success','Profile successfully made');

        
    }

    /**
     * Display the specified resource.
     */
    public function show($userId)
    {
        $user = User::findOrFail($userId);
        $profile = $user->profile;
        return view('livewire.profile.view-profile',compact('profile','user'));
    }

    public function visitorShow($userId)
    {
        $user = User::findOrFail($userId);
        $profile = $user->profile;
        return view('visitor.view-profile',compact('profile','user'));
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
        
       
        return redirect()->route('profile')->with('success','Profile successfully edited');

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
