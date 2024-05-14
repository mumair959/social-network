<?php

namespace App\Http\Controllers;

use App\Http\Requests\General\City\GetAllCitiesListRequest;
use Illuminate\Http\Request;

class CityController extends Controller
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
     * Return all groups data.
     *
     */
    public function getAllCitiesList(GetAllCitiesListRequest $request){
        $response = $request->process();
        return response()->json($response);
    }
}
