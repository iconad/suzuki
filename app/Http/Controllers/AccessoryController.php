<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\AccessoryCategory;
use App\Models\Vehicle;
use CreateAccessoryCategoriesTable;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Vehicle $vehicle)
    {
        $accessories = Accessory::where('vehicle_id', $vehicle->id)->get();
        return view('manage.vehicle.accessory.index', compact('accessories', 'vehicle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vehicle $vehicle)
    {
        $categories = AccessoryCategory::where('status', 1)->get();
        return view('manage.vehicle.accessory.create', compact('vehicle', 'categories'));
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
            'sku' => 'required',
            'color' => 'required',
            'thumbnail' => 'required',
            'category' => 'required',
        ]);

        $accessory = Accessory::create([
            'title' => $request->title,
            'sku' => $request->sku,
            'width' => $request->width,
            'height' => $request->height,
            'length' => $request->length,
            'weight' => $request->weight,
            'color' => $request->color,
            'price' => $request->price,
            'vehicle_id' => $vehicle->id,
            'excerpt' => $request->excerpt,
            'detail' => $request->detail,
            'accessory_category_id' => $request->category,
            'iframe' => $request->iframe
        ]);

        if($request->has('thumbnail')) {
            $pathToFile = $this->createImage($request->thumbnail);
            $accessory->addMedia($pathToFile)
                    ->toMediaCollection('thumbnail');
        }

        if ($accessory) {
            $request->session()->flash('green', 'Accessory was successful added!');
            return redirect("/cms/vehicles/$vehicle->id/accessories/$accessory->id");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle, Accessory $accessory)
    {
        $categories = AccessoryCategory::where('status', 1)->get();
        $thumbnail = $accessory->getMedia('thumbnail')->count() != 0 ? $accessory->getMedia('thumbnail')[0]->getUrl() : null;
        return view('manage.vehicle.accessory.show', compact('accessory','vehicle', 'thumbnail', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function edit(Accessory $accessory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle, Accessory $accessory)
    {
        $request->validate([
            'title' => 'required',
            'sku' => 'required',
            'color' => 'required',
            'category' => 'required',
        ]);

        if($request->has('thumbnail')) {
            $mediaItems = $accessory->getMedia('thumbnail');
            if(count($mediaItems) != 0) {
                $mediaItems[0]->delete();
            }
            $pathToFile = $this->createImage($request->thumbnail);
            $accessory->addMedia($pathToFile)
                    ->toMediaCollection('thumbnail');
        }

        $accessory->title = $request->title;
        $accessory->sku = $request->sku;
        $accessory->width = $request->width;
        $accessory->height = $request->height;
        $accessory->length = $request->length;
        $accessory->weight = $request->weight;
        $accessory->color = $request->color;
        $accessory->price = $request->price;
        $accessory->vehicle_id = $vehicle->id;
        $accessory->accessory_category_id = $request->category;
        $accessory->excerpt = $request->excerpt;
        $accessory->detail = $request->detail;
        $accessory->status = $request->status;

        if ($accessory->save()) {
            $request->session()->flash('green', 'Accessory successful updated!');
            return redirect("/cms/vehicles/$vehicle->id/accessories/$accessory->id");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Vehicle $vehicle, Accessory $accessory)
    {
        if($accessory->delete()){
            $request->session()->flash('green', 'Accessory successful deleted!');
            return redirect("/cms/vehicles/$vehicle->id/accessories");
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
        Image::make($file)->save($pathToFile);

        // SpatieImage::load($pathToFile)
        // ->format(Manipulations::FORMAT_WEBP)
        // ->save();

        return $pathToFile;
    }


}
