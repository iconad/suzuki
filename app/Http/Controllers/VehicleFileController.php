<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\vehicleFile;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class VehicleFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Vehicle $vehicle)
    {
        $files = vehicleFile::where('vehicle_id', $vehicle->id)->get();
        return view('manage.vehicle.file.index', compact('vehicle', 'files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vehicle $vehicle)
    {
        return view('manage.vehicle.file.create', compact('vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'file' => 'required',
        ]);


        $file = vehicleFile::create([
            'title' => $request->title,
            'year' => $request->year,
            'type' => $request->type,
            'vehicle_id' => $vehicle->id,
        ]);

        if($request->has('file')) {
            $pathToFile = $this->createImage($request->file);
            $file->addMedia($pathToFile)
                    ->toMediaCollection('file');
        }

        if ($file) {
            $request->session()->flash('green', 'File was successful added!');
            return redirect("/cms/vehicles/$vehicle->id/files/$file->id");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vehicleFile  $vehicleFile
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle, $vehicleFile)
    {
        $file = vehicleFile::where('id', $vehicleFile)->first();
        $pdf = $file->getMedia('file')->count() != 0 ? $file->getMedia('file')[0]->getUrl() : null;
        return view('manage.vehicle.file.show', compact('vehicle', 'file', 'pdf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vehicleFile  $vehicleFile
     * @return \Illuminate\Http\Response
     */
    public function edit(vehicleFile $vehicleFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vehicleFile  $vehicleFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle, $vehicleFile)
    {
        $file = vehicleFile::where('id', $vehicleFile)->first();

        $request->validate([
            'title' => 'required',
            'type' => 'required',
        ]);

        if($request->has('file')) {
            $mediaItems = $file->getMedia('file');
            if(count($mediaItems) != 0) {
                $mediaItems[0]->delete();
            }
            $pathToFile = $this->createImage($request->file);
            $file->addMedia($pathToFile)
                    ->toMediaCollection('file');
        }

        $file->title = $request->title;
        $file->type = $request->type;
        $file->year = $request->year;

        if ($file->save()) {
            $request->session()->flash('green', 'File successful updated!');
            return redirect("/cms/vehicles/$vehicle->id/files/$file->id");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vehicleFile  $vehicleFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Vehicle $vehicle, $vehicleFile)
    {

        $file = vehicleFile::where('id', $vehicleFile)->first();

        if($file->delete()){
            $request->session()->flash('green', 'File successful deleted!');
            return redirect("/cms/vehicles/$vehicle->id/files");
        }else {
            $request->session()->flash('red', 'Something went wrong, Please try again!');
            return back();
        }
    }

    public function createImage($file) {
        $file =  $file;
        $monthYear = date('FY');
        $imgName = Str::random();

        $folder_by_month = public_path().'/storage/';
        !file_exists($folder_by_month) && mkdir($folder_by_month , 0777, true);
        $fileName = $imgName . '.' . $file->getClientOriginalExtension();
        $pathToFile = public_path().'/storage/' . $fileName;
        $file->move(public_path().'/storage/', $fileName);
        return $pathToFile;


    }
}
