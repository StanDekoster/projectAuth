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
        
        if (Auth::check() && Auth::user()->isAdmin) {
           
            return view('Item.create-item');
        }

        
        return view('admin.restricted');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         
        if (Auth::check() && Auth::user()->isAdmin) {
           
            $validationData = $request->validate([
                'title' => 'required|max:255',
                'description' =>'required|max:10000',
                'coverImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
            ]);
    
            $item = new Item;
            $item->user_id = Auth::id();
            $item->title = $validationData['title'];
            $item->description = $validationData['description'];
            if ($request->hasFile('coverImage')) {
                $coverImagePath = $request->file('coverImage')->store('coverImages', 'public');
                $item->coverImage = $coverImagePath;
            }
            else{
                return redirect()->back()->with('failure','No image provided');
            }
           
    
            $item->save();

            return redirect(route('admin.items'))->with('success', 'Newsitem successfully created.');

        }

        
        return view('admin.restricted');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('Item.details-item', compact('item'));

    }

    public function visitorShow(Item $item)
    {
        return view('visitor.details-item', compact('item'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
      

        if (Auth::check() && Auth::user()->isAdmin) {
           
            return view('Item.edit-item')->with('item',$item );
        }

        
        return view('admin.restricted');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        

        if (Auth::check() && Auth::user()->isAdmin) {
           
            $validationData = $request->validate([
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
    
            $item->title = $validationData['title'];
            $item->description = $validationData['description'];
    
            $item->save();
    
            return redirect(route('admin.items'))->with('success', 'Newsitem successfully edited.');

        }

        
        return view('admin.restricted');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
       

        if (Auth::check() && Auth::user()->isAdmin) {
           
            $item->delete();

        
            return redirect(route('admin.items'))->with('success', 'Newsitem successfully removed.');

        }

        
        return view('admin.restricted');
        
    }
}
