<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Item;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::check() && Auth::user()->isAdmin) {
           
            return view('admin.dashboard');
        }

        
        return view('admin.restricted');
        
        
    }

    public function adminUserList()
    {

       
        if (Auth::check() && Auth::user()->isAdmin) {
           
            $users = User::all();
        
        return view('data.user-list',compact('users'));

        }

       
        return view('admin.restricted');
    }

    public function appointAdmin($id) //chatgpt
    {
      

        if (Auth::check() && Auth::user()->isAdmin) {
            $user = User::find($id);

        $user->isAdmin = true;

        $user->save();
        
        return redirect(route('admin.user.list'));
            
        }

        
        return view('admin.restricted');
    }
    
    public function adminItems()
    {
       

        if (Auth::check() && Auth::user()->isAdmin) {
           
            $items = Item::all();
        
        return view('Item.admin-items',compact('items'));
        }

        
        return view('admin.restricted');
    }

}
