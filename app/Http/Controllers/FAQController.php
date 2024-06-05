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
        $f_a_q_s = FAQ::All();
        return view('faq.index', compact('f_a_q_s'));
    }

    public function adminIndex()
    {
        $f_a_q_s = FAQ::All();
        return view('faq.admin-faq', compact('f_a_q_s'));
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
        
       

        return redirect()->route('admin.faq');
        

        
    }

    /**
     * Display the specified resource.
     */
    public function show(FAQ $fAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FAQ $fAQ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FAQ $fAQ)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FAQ $fAQ)
    {
        //
    }
}
