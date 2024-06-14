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
        
        

        if (Auth::check() && Auth::user()->isAdmin) {
           
            $tags =Tag::All();
            $faqs = FAQ::All();
            return view('faq.admin-faq', compact('tags','faqs'));
        }

        
        return view('admin.restricted');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       

        if (Auth::check() && Auth::user()->isAdmin) {
           
            $tags =Tag::All();
            $faqs = FAQ::All();
            return view('faq.admin-faq', compact('tags','faqs'));
            
        }

        
        return view('admin.restricted');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        

        if (Auth::check() && Auth::user()->isAdmin) {
           
            $validator = $request->validate([
                'question' => 'required|max:255',
                'answer' =>'required|max:10000',
                
    
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
           
    
            return redirect(route('admin.faq', compact('tags','faqs')))->with('success', 'Q&A successfully created.');

        }

        
        return view('admin.restricted');
        
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
       

            if (Auth::check() && Auth::user()->isAdmin) {
           
                $tags = Tag::All();
                return view('faq.admin-faq-edit',compact('faq','tags'));
            }
    
            
            return view('admin.restricted');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FAQ $faq)
    {
       

        if (Auth::check() && Auth::user()->isAdmin) {
           
            $validatorData = $request->validate([
                'question' => 'required|max:255',
                'answer' =>'required|max:10000',
                
    
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
           
    
            return redirect(route('admin.faq', compact('tags','faqs')))->with('success', 'Q&A successfully edited.');;

        }

        
        return view('admin.restricted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FAQ $faq)
    {
       


        if (Auth::check() && Auth::user()->isAdmin) {
           
            $faq->delete();
            return redirect(route('admin.faq', compact('tags','faqs')))->with('success', 'Q&A successfully removed.');;

        }

        
        return view('admin.restricted');
    }
}
