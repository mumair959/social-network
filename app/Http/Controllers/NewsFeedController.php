<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsFeedController extends Controller
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
     * Show the newsfeed.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('newsfeed.index');
    }
}
