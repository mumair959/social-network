<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dashboard\GetDashboardWidgetDataRequest;
use App\Http\Requests\Admin\Dashboard\GetUserGenderChartDataRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
        return view('admin.dashboard');
    }

    /**
     * Return admin dashboard data.
     *
     */
    public function getDashboardData(GetDashboardWidgetDataRequest $request){
        $response = $request->process();
        return response()->json($response);
    }

    /**
     * Return user gender data.
     *
     */
    public function getUserGenderData(GetUserGenderChartDataRequest $request)
    {
        $response = $request->process();
        return response()->json($response);
    }
}
