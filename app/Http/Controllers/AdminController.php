<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Item;

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
    
    public function adminItems()
    {
        $items = Item::all();
        
        return view('Item.admin-items',compact('items'));
    }

}
