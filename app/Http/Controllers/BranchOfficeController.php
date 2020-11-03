<?php

namespace App\Http\Controllers;

use App\Models\BranchOffice;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $branches = Branch::all();
        // return view('manage.branch.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Branch $branch, Request $request)
    {
        $type = $request->type.'_a';
        $count = $branch->$type->count();
        if($count != 0) {
            $office = $branch->$type[0];
            return view('manage.branch.office.show', compact('branch', 'office'));
        }else{
            return view('manage.branch.office.create', compact('branch'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Branch $branch, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'open_days' => 'required',
            'map' => 'required',
        ]);

        $office = BranchOffice::create([
            'title' => $request->title,
            'email' => $request->email,
            'manager' => $request->manager,
            'tel' => $request->tel,
            'mobile' => $request->mobile,
            'fax' => $request->fax,
            'type' => $request->type,
            'open_days' => $request->open_days,
            'thursday' => $request->thursday,
            'map' => $request->map,
            'friday' => $request->friday,
            'branch_id' => $branch->id,
            'user_id' => auth()->id(),
        ]);

        if ($office) {
            $request->session()->flash('green', "{{$request->type}} was successful added!");
            return redirect()->route('branches.show', $branch->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch, BranchOffice $office)
    {
        return view('manage.branch.office.show', compact('branch', 'office'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(BranchOffice $branchOffice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch, $branchOffice)
    {
        $request->validate([
            'title' => 'required',
            'open_days' => 'required',
            'map' => 'required',
        ]);

        $branchOffice = BranchOffice::where('id', $branchOffice)->first();

        $branchOffice->title = $request->title;
        $branchOffice->email = $request->email;
        $branchOffice->manager = $request->manager;
        $branchOffice->tel = $request->tel;
        $branchOffice->fax = $request->fax;
        $branchOffice->friday = $request->friday;
        $branchOffice->mobile = $request->mobile;
        $branchOffice->open_days = $request->open_days;
        $branchOffice->thursday = $request->thursday;
        $branchOffice->map = $request->map;

        if ($branchOffice->save()) {
            $request->session()->flash('green', "{$branchOffice->type} was successful updated!");
            return back();
        }else{
            $request->session()->flash('red', "Something went wrong please try again.");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch, $branchOffice)
    {
        $branchOffice = BranchOffice::where('id', $branchOffice)->first();
        if($branchOffice->delete()) {
            return "deleted";
        }else{
            return "something went wrong please try again";
        }
    }
}
