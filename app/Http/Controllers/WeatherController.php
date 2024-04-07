<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TableStoredWeatherDatas;


class WeatherController extends Controller
{


    public function combinedDatas($cityId, $day)
    {
        $startOfDay = $day . ' 00:00:00';
        $endOfDay = $day . ' 23:59:59';

        $weatherData = TableStoredWeatherDatas::where('cityID', $cityId)
                ->whereBetween('dataStoredTime', [$startOfDay, $endOfDay])
                ->get();

        // Adatok továbbítása a nézetnek
        return view('combinedDiagramForCity', compact('weatherData'));
    }



}
