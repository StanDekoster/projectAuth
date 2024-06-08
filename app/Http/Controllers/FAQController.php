<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Tag;
use Illuminate\Http\Request;
use \App\Http\Controllers\faqController;
use \App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;


class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags =Tag::All();
        $faqs = FAQ::All();
        return view('faq.index', compact('faqs','tags'));
    }

    public function adminIndex()
    {
        
        $tags =Tag::All();
        $faqs = FAQ::All();
        return view('faq.admin-faq', compact('tags','faqs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faqs = FAQ::All();
        $tags = Tag::All();
        return view('faq.admin-faq-create',compact('faqs','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'question' => 'required|max:255',
            'answer' =>'required|max:255',
            

        ]);

        $faq = new Faq;
      
        $faq->question = $validator['question'];
        $faq->answer = $validator['answer'];
        $faq->save();
        //chatGPT
        $selectedTags = array_keys($request->except('_token', 'question', 'answer'));

        // Find the tags by their names
        $selectedTags = array_keys($request->except('_token', 'question', 'answer'));

        // Find the tags by their names
        $selectedTags = $request->input('tags',[]);
    
        // Attach the FAQ to the selected tags
        $faq->tags()->attach($selectedTags);
       
        
        
        

        
        
       

        return redirect()->route('admin.faq');
        

        
    }

    /**
     * Display the specified resource.
     */
    public function show(FAQ $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FAQ $faq)
    {
        $tags = Tag::All();
            return view('faq.admin-faq-edit',compact('faq','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FAQ $faq)
    {
        $validatorData = $request->validate([
            'question' => 'required|max:255',
            'answer' =>'required|max:255',
            

        ]);

        
      
        $faq->question = $validatorData['question'];
        $faq->answer = $validatorData['answer'];
        $faq->save();
        //chatGPT
        $selectedTags = array_keys($request->except('_token', 'question', 'answer'));

        // Find the tags by their names
        $selectedTags = $request->input('tags',[]);
    
        // Attach the FAQ to the selected tags
        $faq->tags()->sync($selectedTags);
       
        
        
        

        
        
       

        return redirect()->route('admin.faq');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faq');
    }
}
