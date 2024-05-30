<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userList(){}

    public function adminUserList()
    {
        $users = User::all();
        
        return view('admin.user-list',compact('users'));
    }

    public function appointAdmin($id) //chatgpt
    {
       $user = User::find($id);

        $user->isAdmin = true;

        $user->save();
        
        return redirect(route('admin.user.list'));
    }

}
