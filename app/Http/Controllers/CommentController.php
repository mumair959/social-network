<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\Comment\GetAllCommentsRequest;

class CommentController extends Controller
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
     * Show the application comments.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.comments.index');
    }

    /**
     * Return all comments data.
     *
     */
    public function getAllComments(GetAllCommentsRequest $request){
        $response = $request->process();
        return response()->json($response);
    }
}
