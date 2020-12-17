<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function businessSolutions () {
        return view('business-solutions');
    }

    public function preOwnedCars () {
        return view('pre-owned-cars');
    }

    public function vehicles () {
        return view('pre-owned-cars');
    }

    public function vehicle () {
        return view('pre-owned-cars');
    }
}
