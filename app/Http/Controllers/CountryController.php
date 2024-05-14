<?php

namespace App\Http\Controllers;

use App\Http\Requests\General\Country\GetAllCountriesListRequest;
use Illuminate\Http\Request;

class CountryController extends Controller
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
    public function getAllCountriesList(GetAllCountriesListRequest $request){
        $response = $request->process();
        return response()->json($response);
    }
}
