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

    public function getBroucher()
    {
        return view('forms.get-broucher');
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
