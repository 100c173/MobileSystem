<?php

namespace App\Http\Controllers\Country_City;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getProvinces($countryId)
    {
        
        $provinces = City::where('country_id', $countryId)->get();
        return response()->json($provinces);
    }
}
