<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagePages extends Controller
{
    public function dashboard () {
        return view('manage.dashboard');
    }
}
