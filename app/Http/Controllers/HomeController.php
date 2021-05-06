<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dymantic\InstagramFeed\Profile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $instafeed = Profile::where('username', 'suzukicaruae')->first()->refreshFeed(4);
        // return view('home', compact('instafeed'));
    }


    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }


}
