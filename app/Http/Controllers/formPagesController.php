<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formPagesController extends Controller
{
    public function getQuote()
    {
        return view('forms.get-quote');
    }

    public function RequestQuoteAccessories()
    {
        return view('forms.request-quote-accessories');
    }

    public function getBroucher(Request $request)
    {
        $selectedModel = $request->vehicle;
        return view('forms.get-broucher', compact('selectedModel'));
    }

    public function getSpecsheet(Request $request)
    {
        $selectedModel = $request->vehicle;
        return view('forms.get-specsheet', compact('selectedModel'));
    }

    public function testDrive()
    {
        return view('forms.test-drive');
    }

    public function ourCommitment()
    {
        return view('forms.our-commitment');
    }

    public function bookService()
    {
        return view('forms.book-service');
    }

    public function contactUs()
    {
        return view('contact');
    }
}
