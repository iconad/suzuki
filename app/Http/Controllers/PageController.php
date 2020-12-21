<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Branch;
use App\Models\Vehicle;
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

    public function vehicles(){
        $vehicles = Vehicle::where('status', 1)->with('media')->get();
        return view('vehicle.index', compact('vehicles'));
    }

    public function singeVehicle($vehicle)
    {
        $vehicle = Vehicle::where('slug', $vehicle)->first();
        return view('vehicle.show', compact('vehicle'));
    }

    public function vehiclesPage()
    {
        return view('vehicle.page');
    }

    public function showroomLocation($location, $type)
    {
        $branches = Branch::whereHas($type, function($query) {
            $query->where('status', 1);
         })->get();

        $branche = Branch::where('slug', $location)->first();


        return view('locations', compact('branches', 'branche', 'location', 'type'));

    }

}
