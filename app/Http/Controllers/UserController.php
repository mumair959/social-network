<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\User\GetAllUsersRequest;
use App\Http\Requests\Admin\User\UpdateUserStatusRequest;
use Illuminate\Http\Request;

class UserController extends Controller
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
     * Show the application users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Return all users data.
     *
     */
    public function getAllUsers(GetAllUsersRequest $request){
        $response = $request->process();
        return response()->json($response);
    }

    /**
     * Update user status: Active/Block.
     *
     */
    public function updateStatus(UpdateUserStatusRequest $request){
        $response = $request->process($request->all());
        return response()->json($response);
    }
}
