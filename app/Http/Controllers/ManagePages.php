<?php

namespace App\Http\Controllers;
use App\Models\Lead;

use Illuminate\Http\Request;

class ManagePages extends Controller
{
    public function dashboard () {
        return view('manage.dashboard');
    }

    public function newsletter () {
        $leads = Lead::where('type', 'newsletter')->get();
        return view('manage.newsletter', compact('leads'));
    }
}
