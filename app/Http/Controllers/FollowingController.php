<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\General\Followings\GetFollowingsRecommendationRequest;
use App\Http\Requests\General\Followings\FollowUsersRequest;
use App\Http\Requests\General\Followings\UnfollowUsersRequest;

class FollowingController extends Controller
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

    function getFollowingsRecommendations(GetFollowingsRecommendationRequest $request){
        $response = $request->process($request->all());
        return response()->json($response);
    }

    function followUser(FollowUsersRequest $request){
        $response = $request->process($request->all());
        return response()->json($response);
    }

    function unfollowUser(UnfollowUsersRequest $request){
        $response = $request->process($request->all());
        return response()->json($response);
    }

}
