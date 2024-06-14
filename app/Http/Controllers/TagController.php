<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       

       
       if (Auth::check() && Auth::user()->isAdmin) {
           
        $tags = Tag::All();
       return view('faq.admin-cat-create',compact('tags'));

    }

    
    return view('admin.restricted');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        if (Auth::check() && Auth::user()->isAdmin) {
           
            $validator = $request->validate([
                'name' => 'required|max:255',
                
    
            ]);
    
            $tag = new Tag;
           
            $tag->name = $validator['name'];
        
            
    
            $tag->save();
            
           
    
            return redirect()->route('admin.cat.create');
    
        }
    
        
        return view('admin.restricted');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        

        if (Auth::check() && Auth::user()->isAdmin) {
           
            $tags = Tag::All();
            return view('faq.admin-cat-edit',compact('tag','tags'));
    
        }
    
        
        return view('admin.restricted');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        



        if (Auth::check() && Auth::user()->isAdmin) {
           
            $validatorData = $request->validate([
                'name' => 'required|max:255',           
    
            ]);
    
            
          
            $tag->name = $validatorData['name'];
            
            $tag->save();
            //chatGPT
            return redirect(route('admin.faq'));
    
        }
    
        
        return view('admin.restricted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        

        if (Auth::check() && Auth::user()->isAdmin) {
            $tag->delete();

            return redirect(route('admin.faq'));
    
        }
    
        
        return view('admin.restricted');
    }
}
