<?php

namespace App\Classes;



use App\Constants\CityesTable;
use App\Models\City;
use App\Models\TableStoredWeatherDatas;

use Classes\OpenWeather;


class Cron
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function collectWeatherInfos()
    {

        foreach (City::where(CityesTable::FIELD_ACTIVE, true)->orderBy(CityesTable::FIELD_TELEPULESNEV)->get() as $city)
        {
            $weather = new OpenWeather;
            $weather->setLon($city->cityLong);
            $weather->setLat($city->cityLat);

            $varosAdatai = $weather->getCityWeatherInfo();

            $storedWeatherData = new TableStoredWeatherDatas();
            $storedWeatherData->cityID = $city->id;
            $storedWeatherData->dataStoredTime = date("Y-m-d H:i:s", time());
            $storedWeatherData->tempereture = $varosAdatai->main->temp;
            $storedWeatherData->humidity = $varosAdatai->main->humidity;
            $storedWeatherData->windSpeed = $varosAdatai->wind->speed;
            $storedWeatherData->save();
        }


   }



}
