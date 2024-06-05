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
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function about()
    {

        return view('about');
    }

    public function visitorIndex()
    {
       
       $items = Item::All();

        return view('welcome',compact('items'));
    }

    public function index()
    {
        $items = Item::with('user')->get();
       

        return view('dashboard', compact('items'));
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
            'coverImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $item = new Item;
        $item->user_id = Auth::id();
        $item->title = $validator['title'];
        $item->description = $validator['description'];
        $coverImagePath = $request->file('coverImage')->store('coverImages', 'public');
        $item->coverImage = $coverImagePath;

       
        
        
        

        $item->save();
        
       

        return redirect()->route('admin.items');
        

        
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
            'description' =>'required',
            'coverImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048,'
        ]);

        if ($request->hasFile('coverImage')) {
            // Delete old coverImage if it exists
            if ($item->coverImage) {
                Storage::delete($item->coverImage);
            }
    
            // Store new coverImage
            $coverImagePath = $request->file('coverImage')->store('coverImages', 'public');
            $item->coverImage = $coverImagePath;
        }

        $item->title = $validator['title'];
        $item->description = $validator['description'];

        $item->save();

        return redirect(route('admin.items'));
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
