<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Page\GetAllPagesRequest;
use App\Http\Requests\Admin\Page\UpdatePageStatusRequest;
use Illuminate\Http\Request;

class PageController extends Controller
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
        return view('admin.pages.index');
    }

    /**
     * Return all pages data.
     *
     */
    public function getAllPages(GetAllPagesRequest $request){
        $response = $request->process();
        return response()->json($response);
    }

    /**
     * Update page status: Active/Block.
     *
     */
    public function updateStatus(UpdatePageStatusRequest $request){
        $response = $request->process($request->all());
        return response()->json($response);
    }
}
