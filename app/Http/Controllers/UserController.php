<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Item;


use App\Models\Tag;
use App\Models\Like;

use App\HTTP\Controllers\Tags;
use App\HTTP\Controllers\Likes;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userList(){
        $users = User::all();
        
        return view('data.user-list',compact('users'));
    }

    public function userDashboard(){
        return view('user.dashboard');
    }

    public function visitorUserList(){
        $users = User::all();
        
        return view('visitor.user-list',compact('users'));
    }

    public function loggedIn()
    {
        $user = Auth::user();

        // Check a variable of the current user, e.g., 'role'
        if ($user->isAdmin == true) {
            // Perform some action if the user is an admin
            return redirect(route('admin.dashboard'));
        } else {
            // Perform some other action if the user is not an admin
            return redirect(route('user.dashboard'));
        }
    }
}
