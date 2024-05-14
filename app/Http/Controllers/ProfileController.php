<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdateUserPersonalInfoRequest;
use App\Http\Requests\Profile\UpdateUserSocialUrlRequest;
use App\Http\Requests\Profile\GetUserProfileDataRequest;
use App\Http\Requests\Profile\GetUserProfileImageRequest;
use App\Http\Requests\Profile\GetUserInfoRequest;
use App\Http\Requests\Profile\UpdateUserContactRequest;
use App\Http\Requests\Profile\UpdateUserPasswordRequest;
use App\Http\Requests\Profile\GetUserProfileSummaryRequest;
use App\Http\Requests\Profile\GetUserFriendRequestsRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
     * Show the profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Show the edit profile page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Return user profile data.
     *
     */
    public function getUserProfileData(GetUserProfileDataRequest $request){
        $response = $request->process();
        return response()->json($response);
    }

    /**
     * Return user profile image.
     *
     */
    public function getUserProfileImage(GetUserProfileImageRequest $request){
        $response = $request->process();
        return response()->json($response);
    }

    /**
     * Return user info.
     *
     */
    public function getUserInfo(GetUserInfoRequest $request){
        $response = $request->process();
        return response()->json($response);
    }

    function getUserProfileSummary(GetUserProfileSummaryRequest $request) {
        $response = $request->process();
        return response()->json($response);
    }

    function getUserFriendRequests(GetUserFriendRequestsRequest $request) {
        $response = $request->process();
        return response()->json($response);
    }

    function updateUserInfo(UpdateUserPersonalInfoRequest $request) {
        $response = $request->process($request->all());
        return response()->json($response);
    }

    function updateUserSocialUrls(UpdateUserSocialUrlRequest $request) {
        $response = $request->process($request->all());
        return response()->json($response);
    }

    function updateUserContact(UpdateUserContactRequest $request) {
        $response = $request->process($request->all());
        return response()->json($response);
    }

    function updateUserPassword(UpdateUserPasswordRequest $request) {
        $response = $request->process($request->all());
        return response()->json($response);
    }
    
}
