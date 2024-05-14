<?php

namespace App\Http\Controllers;

use App\Http\Requests\Friend\GetTopFriendsListDataRequest;
use Illuminate\Http\Request;

class FriendController extends Controller
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
     * Show the friend list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('friends.index');
    }

    /**
     * Show the friend requests.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function friendRequests()
    {
        return view('friends.friend_requests');
    }

    /**
     * Show the friend lists.
     */
    public function friendsList()
    {
        return view('friends.friends_list');
    }

    public function getTopFriendsList(GetTopFriendsListDataRequest $request){
        $response = $request->process();
        return response()->json($response);
    }
}
