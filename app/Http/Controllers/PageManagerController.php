<?php

namespace App\Http\Controllers;

use App\Models\PageManager;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PageManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = PageManager::all();
        return view('manage.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.page.create');
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
            'body' => 'required',
        ]);

        $page = PageManager::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if($request->has('cover')) {
            $pathToFile = $this->createImage($request->cover);
            $page->addMedia($pathToFile)
                    ->toMediaCollection('cover');
        }

        if ($page) {
            $request->session()->flash('green', 'Page was successful created!');
            return redirect("/cms/pages/$page->id");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PageManager  $pageManager
     * @return \Illuminate\Http\Response
     */
    public function show(PageManager $page)
    {
        $cover = $page->getMedia('cover')->count() != 0 ? $page->getMedia('cover')[0]->getUrl() : null;
        return view('manage.page.show', compact('page', 'cover'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PageManager  $pageManager
     * @return \Illuminate\Http\Response
     */
    public function edit(PageManager $pageManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PageManager  $pageManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pid)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'slug' => 'required',
        ]);


        $page = PageManager::where('id', $pid)->first();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->body = $request->body;

        if($request->has('cover')) {
            $mediaItems = $page->getMedia('cover');
            if(count($mediaItems) != 0) {
                $mediaItems[0]->delete();
            }
            $pathToFile = $this->createImage($request->cover);
            $page->addMedia($pathToFile)
                    ->toMediaCollection('cover');
        }

        if ($page->save()) {
            $request->session()->flash('green', 'Page was successful updated!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PageManager  $pageManager
     * @return \Illuminate\Http\Response
     */
    public function destroy($pid)
    {
        $pageManager = PageManager::where('id', $pid)->first();
        if($pageManager->delete()) {
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
