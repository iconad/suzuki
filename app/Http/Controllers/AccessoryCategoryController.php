<?php

namespace App\Http\Controllers;

use App\Models\AccessoryCategory;
use Illuminate\Http\Request;

class AccessoryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = AccessoryCategory::all();
        return view('manage.accessory_category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.accessory_category.create');
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
            'type' => 'required',
        ]);

        $category = AccessoryCategory::create([
            'title' => $request->title,
            'type' => $request->type
        ]);

        if ($category) {
            $request->session()->flash('green', 'Accessory Category was successful added!');
            return redirect("/manage/accessory-categories/$category->id");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccessoryCategory  $accessoryCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AccessoryCategory $accessoryCategory)
    {
        return view('manage.accessory_category.show', compact('accessoryCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccessoryCategory  $accessoryCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(AccessoryCategory $accessoryCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccessoryCategory  $accessoryCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccessoryCategory $accessoryCategory)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
        ]);

        $accessoryCategory->title = $request->title;
        $accessoryCategory->type = $request->type;
        $done = $accessoryCategory->save();
        if ($done) {
            $request->session()->flash('green', 'Accessory Category successful updated!');
            return redirect("/manage/accessory-categories/$accessoryCategory->id");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccessoryCategory  $accessoryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AccessoryCategory $accessoryCategory)
    {
        if($accessoryCategory->delete()){
            $request->session()->flash('green', 'Accessory Category successful deleted!');
            return redirect("/manage/accessory-categories");
        }else {
            $request->session()->flash('red', 'Something went wrong, Please try again!');
            return back();
        }
    }
}
