<?php

namespace App\Http\Controllers;

use App\Models\NoModel;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ManageMediaController extends Controller
{
    public function getAllMedia () {
        $media = Media::orderBy('id', 'DESC')->paginate();
        return view('manage.media.index', compact('media'));
    }

    public function store(Request $request) {

        $request->validate([
            'image' => 'required',
        ]);

        $nomodel = NoModel::create([
            'title' => "No Title",
        ]);

        $done = $nomodel->save();

        if($request->has('image')) {
            $pathToFile = $this->createImage($request->image);
            $nomodel->addMedia($pathToFile)
                    ->toMediaCollection('image');
        }

        if ($done) {
            $request->session()->flash('green', 'Media was successful added!');
            return redirect("/cms/media");
        }else{
            $request->session()->flash('red', 'Something went wrong! Please try again');
            return redirect("/cms/media");
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

        return $pathToFile;
    }


    public function destroy(Request $request, $id)
    {
        $media = Media::where('id', $id)->first();

        if($media->delete()){
            $request->session()->flash('green', 'Media successful deleted!');
            return redirect("/cms/media/");
        }else {
            $request->session()->flash('red', 'Something went wrong, Please try again!');
            return back();
        }
    }

}
