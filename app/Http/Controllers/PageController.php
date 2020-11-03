<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Branch;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }

    public function home()
    {
        return view('home');
    }

    public function singeVehicle()
    {
        return view('vehicle.show');
    }

    public function showroomLocation($location, $type)
    {
        $branches = Branch::whereHas($type, function($query) {
            $query->where('status', 1);
         })->get();

        $branche = Branch::where('slug', $location)->first();

        // return $branche->$type[0]->title;

        return view('locations', compact('branches', 'branche', 'location', 'type'));
    }

    public function servicesLocation()
    {
        return view('locations');
    }

    public function partsLocation()
    {
        return view('locations');
    }

    public function getQuote()
    {
        return view('forms.get-quote');
    }

    public function getBroucher()
    {
        return view('forms.get-broucher');
    }

    public function testDrive()
    {
        return view('forms.test-drive');
    }

    public function RequestQuoteAccessories()
    {
        return view('forms.request-quote-accessories');
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
