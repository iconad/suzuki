<?php

namespace App\Http\Controllers;

use App\Models\Recall;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class RecallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recalls = Recall::all();
        return view('manage.recall.index', compact('recalls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = Vehicle::where('status', 1)->get();
        return view('manage.recall.create', compact('vehicles'));
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
            'vehicle_type' => 'required',
            'detail' => 'required',
            'vehicle_id' => 'required',
            'till_date' => 'required',
        ]);

        $recall = Recall::create([
            'title' => $request->title,
            'vehicle_type' => $request->vehicle_type,
            'vehicle_id' => $request->vehicle_id,
            'detail' => $request->detail,
            'till_date' => $request->till_date
        ]);

        if($request->has('thumbnail')) {
            $pathToFile = $this->createImage($request->thumbnail);
            $recall->addMedia($pathToFile)
                    ->toMediaCollection('thumbnail');
        }

        if ($recall) {
            $request->session()->flash('green', 'Recall Announcement was successful created!');
            return redirect("/manage/recall-announcements/{{$recall->id}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recall  $recall
     * @return \Illuminate\Http\Response
     */
    public function show($rid)
    {
        $recall = Recall::where('id', $rid)->first();
        $vehicles = Vehicle::where('status', 1)->get();
        $thumbnail = $recall->getMedia('thumbnail')->count() != 0 ? $recall->getMedia('thumbnail')[0]->getUrl() : null;
        return view('manage.recall.show', compact('recall', 'vehicles', 'thumbnail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recall  $recall
     * @return \Illuminate\Http\Response
     */
    public function edit(Recall $recall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recall  $recall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rid)
    {
        $request->validate([
            'title' => 'required',
            'vehicle_type' => 'required',
            'detail' => 'required',
            'till_date' => 'required',
        ]);
        $recall = Recall::where('id', $rid)->first();

        if($request->has('thumbnail')) {
            $mediaItems = $recall->getMedia('thumbnail');
            if(count($mediaItems) != 0) {
                $mediaItems[0]->delete();
            }
            $pathToFile = $this->createImage($request->thumbnail);
            $recall->addMedia($pathToFile)
                    ->toMediaCollection('thumbnail');
        }

        $recall->title = $request->title;
        $recall->detail = $request->detail;
        $recall->till_date = $request->till_date;
        $recall->vehicle_id = $request->vehicle_id;
        $recall->vehicle_type = $request->vehicle_type;

        if ($recall->save()) {
            $request->session()->flash('green', 'Recall Announcement was successful updated!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recall  $recall
     * @return \Illuminate\Http\Response
     */
    public function destroy($rid)
    {
        $recall = Recall::where('id', $rid)->first();
        if($recall->delete()) {
            return "deleted";
        }else{
            return "something went wrong please try again";
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
