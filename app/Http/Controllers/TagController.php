<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Tag\GetTopTagsRequest;
use App\Http\Requests\Admin\Tag\GetAllTagsRequest;
use App\Http\Requests\Admin\Tag\UpdateTagStatusRequest;
use App\Http\Requests\Admin\Tag\CreateTagsRequest;
use App\Http\Requests\Admin\Tag\DeleteTagsRequest;
use App\Http\Requests\Admin\Tag\GetTagsDetailsRequest;
use App\Http\Requests\Admin\Tag\UpdateTagsRequest;

class TagController extends Controller
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
     * Show the application tags.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.tags.index');
    }
 
    /**
     * Return top tags data.
     *
     */
    public function getTopTags(GetTopTagsRequest $request){
        $response = $request->process($request->all());
        return response()->json($response);
    }

    /**
     * Return all tags data.
     *
     */
    public function getAllTags(GetAllTagsRequest $request){
        $response = $request->process();
        return response()->json($response);
    }

    /**
     * Update tag status: Active/Block.
     *
     */
    public function updateStatus(UpdateTagStatusRequest $request){
        $response = $request->process($request->all());
        return response()->json($response);
    }

    function get(GetTagsDetailsRequest $request, $id){
        $response = $request->process($id);
        return response()->json($response);
    }

    function create(CreateTagsRequest $request){
        $response = $request->process($request->all());
        return response()->json($response);
    }

    function update(UpdateTagsRequest $request){
        $response = $request->process($request->all());
        return response()->json($response);
    }

    function delete(DeleteTagsRequest $request){
        $response = $request->process($request->id);
        return response()->json($response);
    }
}
