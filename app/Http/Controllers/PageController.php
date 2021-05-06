<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Branch;
use App\Models\PageManager;
use App\Models\Vehicle;
use Dymantic\InstagramFeed\Profile;
use Harimayco\Menu\Facades\Menu;
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
    public function show($slug)
    {
        $page = PageManager::where('slug', $slug)->first();
        $cover = $page->getMedia('cover')->count() != 0 ? $page->getMedia('cover')[0]->getUrl() : null;
        return view('page', compact('page', 'cover'));
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

        // $instagram = new \InstagramScraper\Instagram(new \GuzzleHttp\Client());
        // $nonPrivateAccountMedias = $instagram->getMedias('suzukicaruae');

        // $post1 = array(
        //     'link'=> $nonPrivateAccountMedias[0]->getLink(),
        //     'caption'=> $nonPrivateAccountMedias[0]->getCaption(),
        // );

        $instafeed = Profile::where('username', 'suzukicaruae')->first()->feed(10);
        return view('home', compact('instafeed'));
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
