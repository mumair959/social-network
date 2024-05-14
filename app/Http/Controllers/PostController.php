<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\Post\GetAllPostsRequest;
use App\Http\Requests\Post\UserSubmitPostsRequest;
use App\Http\Requests\Post\GetUserPostListsRequest;
use App\Http\Requests\Post\UserLikePostsRequest;
use App\Http\Requests\Post\UserPostCommentsRequest;

class PostController extends Controller
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
     * Show the application posts.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Return all user posts data.
     *
     */
    public function getUserPostList(GetUserPostListsRequest $request){
        $response = $request->process();
        return response()->json($response);
    }

    /**
     * Return all posts data.
     *
     */
    public function getAllPosts(GetAllPostsRequest $request){
        $response = $request->process();
        return response()->json($response);
    }

    /**
     * User submit the post.
     *
     */
    public function userPost(UserSubmitPostsRequest $request){
        $response = $request->process($request->all());
        return response()->json($response);
    }

    /**
     * User like the post.
     *
     */
    public function userPostLike(UserLikePostsRequest $request){
        $response = $request->process($request->all());
        return response()->json($response);
    }

    /**
     * User submit comment on the post.
     *
     */
    public function userPostComment(UserPostCommentsRequest $request){
        $response = $request->process($request->all());
        return response()->json($response);
    }
}
