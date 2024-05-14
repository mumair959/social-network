<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\FAQs\CreateFAQsRequest;
use App\Http\Requests\Admin\FAQs\DeleteFAQsRequest;
use App\Http\Requests\Admin\FAQs\GetAllFAQsRequest;
use App\Http\Requests\Admin\FAQs\GetFAQsDetailsRequest;
use App\Http\Requests\Admin\FAQs\UpdateFAQsRequest;
use App\Http\Requests\FAQs\GetAllFAQsListRequest;
use Illuminate\Http\Request;

class FaqController extends Controller
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
     * Show the faq list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('faqs.index');
    }

    /**
     * Show the faq list for admin.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        return view('admin.faqs.list');
    }

    function getAllFaqsList(GetAllFAQsListRequest $request){
        $response = $request->process();
        return response()->json($response);
    }

    function getAll(GetAllFAQsRequest $request){
        $response = $request->process();
        return response()->json($response);
    }

    function get(GetFAQsDetailsRequest $request, $id){
        $response = $request->process($id);
        return response()->json($response);
    }

    function create(CreateFAQsRequest $request){
        $response = $request->process($request->all());
        return response()->json($response);
    }

    function update(UpdateFAQsRequest $request){
        $response = $request->process($request->all());
        return response()->json($response);
    }

    function delete(DeleteFAQsRequest $request){
        $response = $request->process($request->id);
        return response()->json($response);
    }
}
