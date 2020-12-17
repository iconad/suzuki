<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('manage.vehicle.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $vehicle = Vehicle::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'body' => $request->body,
            'html_content' => $request->html_content,
            'price' => $request->price,
            'iframe' => $request->iframe,
        ]);

        if($request->has('thumbnail')) {
            $pathToFile = $this->createImage($request->thumbnail);
            $vehicle->addMedia($pathToFile)
                    ->toMediaCollection('thumbnail');
        }
        if($request->has('showroom_image')) {
            $pathToFile = $this->createImage($request->showroom_image);
            $vehicle->addMedia($pathToFile)
                    ->toMediaCollection('showroom');
        }
        if($request->has('logo')) {
            $pathToFile = $this->createImage($request->logo);
            $vehicle->addMedia($pathToFile)
                    ->toMediaCollection('logo');
        }

        if ($vehicle) {
            $request->session()->flash('green', 'Vehicle was successful added!');
            return redirect("/manage/vehicles/$vehicle->id");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        $thumbnail = $vehicle->getMedia('thumbnail')->count() != 0 ? $vehicle->getMedia('thumbnail')[0]->getUrl() : null;
        $showroom = $vehicle->getMedia('showroom')->count() != 0 ? $vehicle->getMedia('showroom')[0]->getUrl() : null;
        $logo = $vehicle->getMedia('logo')->count() != 0 ? $vehicle->getMedia('logo')[0]->getUrl() : null;

        return view('manage.vehicle.show', compact('vehicle', 'thumbnail', 'showroom', 'logo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }

    public function createImage($file) {
        $file =  $file;
        $monthYear = date('FY');
        $imgName = Str::random();

        $folder_by_month = public_path().'/storage/';
        !file_exists($folder_by_month) && mkdir($folder_by_month , 0777, true);
        $fileName = $imgName . '.' . $file->getClientOriginalExtension();
        $pathToFile = public_path().'/storage/' . $fileName;
        Image::make($file)->save($pathToFile);

        // SpatieImage::load($pathToFile)
        // ->format(Manipulations::FORMAT_WEBP)
        // ->save();

        return $pathToFile;
    }
}
