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
}
