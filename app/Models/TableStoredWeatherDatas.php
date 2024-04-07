<?php

namespace App\Models;

use App\Constants\WeatherTable;

use Illuminate\Database\Eloquent\Model;

class TableStoredWeatherDatas extends Model
{
    protected $table = 'stored_weather_datas'; // A tábla neve

    protected $fillable = [
        WeatherTable::FIELD_TELEPULES_AZONOSITO,
        WeatherTable::FIELD_LETRATOLAS_IDEJE,
        WeatherTable::FIELD_HOMERSEKLET,
        WeatherTable::FIELD_PARATARTALOM,
        WeatherTable::FIELD_SZELSEBESSEG,
    ]; // Engedélyezett attribútumok tömbje

    // A kapcsolatok definiálása más modellekkel, ha szükséges
}
