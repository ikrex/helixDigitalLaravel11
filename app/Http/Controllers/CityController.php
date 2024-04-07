<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{

    public function getCityListToTable()
    {
        $cities = City::where('active', true)->orderBy('cityName')->get();
        return view('cityList', compact('cities'));
    }

}
