<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::All();
       return view('faq.admin-cat-create',compact('tags'));
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
        $validator = $request->validate([
            'name' => 'required|max:255',
            

        ]);

        $tag = new Tag;
       
        $tag->name = $validator['name'];
    
        

        $tag->save();
        
       

        return redirect()->route('admin.cat.create');
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
        $tags = Tag::All();
        return view('faq.admin-cat-edit',compact('tag','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $validatorData = $request->validate([
            'name' => 'required|max:255',           

        ]);

        
      
        $tag->name = $validatorData['name'];
        
        $tag->save();
        //chatGPT
        return redirect(route('admin.faq'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect(route('admin.faq'));
    }
}
