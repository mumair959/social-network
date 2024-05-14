<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\Disputes\GetAllCommentsDisputesRequest;
use App\Http\Requests\Admin\Disputes\GetAllPostsDisputesRequest;
use App\Http\Requests\Admin\Disputes\GetAllUsersDisputesRequest;

class ProblemReportedController extends Controller
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
     * Show the application pages.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.problem_reported.index');
    }

    /**
     * Return all comments disputes data.
     *
     */
    public function getAllCommentsDisputes(GetAllCommentsDisputesRequest $request){
        $response = $request->process();
        return response()->json($response);
    }

    /**
     * Return all posts disputes data.
     *
     */
    public function getAllPostsDisputes(GetAllPostsDisputesRequest $request){
        $response = $request->process();
        return response()->json($response);
    }

    /**
     * Return all users disputes data.
     *
     */
    public function getAllUsersDisputes(GetAllUsersDisputesRequest $request){
        $response = $request->process();
        return response()->json($response);
    }
}
