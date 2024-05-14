<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Explore\GetUserDashboardDataRequest;

class ExploreController extends Controller
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
     * Show the explore page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('explore.index');
    }

    /**
     * Return user dashboard widget data.
     *
     */
    public function getUserDashboardData(GetUserDashboardDataRequest $request){
        $response = $request->process();
        return response()->json($response);
    }
}
