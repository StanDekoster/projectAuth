<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
       
        
        return view('admin.dashboard');
    }

    public function adminUserList()
    {
        $users = User::all();
        
        return view('data.user-list',compact('users'));
    }

    public function appointAdmin($id) //chatgpt
    {
       $user = User::find($id);

        $user->isAdmin = true;

        $user->save();
        
        return redirect(route('admin.user.list'));
    }

}
