<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;

use App\Models\Tag;
use App\Models\Like;
use Illuminate\Http\Request;
use App\HTTP\Controllers\Tags;
use App\HTTP\Controllers\Likes;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with('user')->get();
       

        return view('dashboard', compact('items'));
    }

    public function welcome()
    {
        $items = Item::with('user')->get();
       

        return view('welcome', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Item.create-item');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|max:255',
            'description' =>'required|max:255',
            'tag' => 'required|max:255'
        ]);

        $item = new Item;
        $item->user_id = Auth::id();
        $item->title = $validator['title'];
        $item->description = $validator['description'];
        

       
        $item->tag = $validator['tag'];
        
        

        $item->save();
        $items = Item::all();
       

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('Item.details-item', compact('item'));

    }

    public function visitorshow(Item $item)
    {
        return view('visitor.details-item', compact('item'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('Item.edit-item')->with('item',$item );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $validator = $request->validate([
            'title' => 'required|max:255',
            'description' =>'required|max:255',
            'tag' => 'required|max:255'
        ]);

        $item->title = $validator['title'];
        $item->description = $validator['description'];

        $item->save();

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        
        return redirect()->route('dashboard');
    }
}
