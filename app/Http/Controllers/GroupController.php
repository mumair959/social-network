<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Group\GetAllGroupsRequest;
use App\Http\Requests\Admin\Group\UpdateGroupStatusRequest;
use Illuminate\Http\Request;

class GroupController extends Controller
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
     * Show the application groups.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.groups.index');
    }

    /**
     * Return all groups data.
     *
     */
    public function getAllGroups(GetAllGroupsRequest $request){
        $response = $request->process();
        return response()->json($response);
    }

    /**
     * Update group status: Active/Block.
     *
     */
    public function updateStatus(UpdateGroupStatusRequest $request){
        $response = $request->process($request->all());
        return response()->json($response);
    }
}
