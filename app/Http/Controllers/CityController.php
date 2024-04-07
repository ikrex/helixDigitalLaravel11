<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Constants\MenuLinks;
use App\Constants\CityesTable;
use App\Models\City;


use Classes\OpenWeather;

class CityController extends Controller
{




    /**
     * CRUD rész eleje
     */

    public function getCityListToTable()
    {
        $cities = City::where(CityesTable::FIELD_ACTIVE, true)->orderBy(CityesTable::FIELD_TELEPULESNEV)->get();
        return view('cityList', compact('cities'));
    }



    public function updateCityForm($id)
    {
        // Összes aktív város lekérése az adatbázisból
        $city = City::findOrFail($id);


        // Városok továbbítása a nézetnek
        return view('updateCityForm', compact('city'));
    }



    // Város szerkesztése (mentés)
    public function updateCity(Request $request)
    {
        // Az új városnév, szélességi és hosszúsági fok
        $cityId = $request->input('cityId');
        $newCityName = $request->input('cityName');
        $newCityLat = $request->input('cityLat');
        $newCityLong = $request->input('cityLong');

        // Az aktuális várost keresd meg az azonosító alapján az adatbázisban
        $city = City::findOrFail($cityId);

        // Frissítsd az adatokat a kapott értékekkel
        $city->cityName = $newCityName;
        $city->cityLat = $newCityLat;
        $city->cityLong = $newCityLong;



        if ($city->save())
        {
            return redirect(MenuLinks::TELEPULES_LISTA)->with('success', 'A(z) város '.$cityName = $city->cityName.' adatai sikeresen frissítve!');
        } else {
            return redirect(MenuLinks::TELEPULES_LISTA)->with('success', 'A(z) város '.$cityName = $city->cityName.' adatainek frissítése NEM SIKERÜLT!');
        }

    }



    public function addCity(Request $request)
    {
        // Validálás
        $request->validate([
            CityesTable::FIELD_TELEPULESNEV => 'required|string',
            CityesTable::FIELD_LAT => 'required|numeric',
            CityesTable::FIELD_LON => 'required|numeric',
        ]);

        // Ellenőrizze, hogy van-e már ilyen nevű város az adatbázisban
        $existingCity = City::where('cityName', $request->cityName)->first();
        if ($existingCity) {
            return redirect()->back()->with('error', 'Ez a város már létezik az adatbázisban!');
        }

        // Új város létrehozása és mentése az adatbázisba
        $city = new City();
        $city->cityName = $request->cityName;
        $city->cityLat = $request->cityLat;
        $city->cityLong = $request->cityLong;
        $city->active = true; // Vagy az aktuális logikának megfelelő érték
        $city->save();

        // Visszatérés a városok listájával
        return redirect()->route('getCityListToTable')->with('success', 'Új város sikeresen hozzáadva!');
    }






    public function deleteCityForm()
    {
        // Összes aktív város lekérése az adatbázisból
        $cities = City::where('active', true)->get();

        // Városok továbbítása a nézetnek
        return view('deleteCityForm', compact('cities'));
    }

    // Város törlése
    public function deleteCity($id)
    {
        $city = City::findOrFail($id);
        $cityName = $city->cityName; // Város nevének lekérése

        // Ellenőrizzük, hogy sikerült-e a várost törölni, az eredménytől függően adom vissza a választ
        if ($city->delete()) {
            return redirect(MenuLinks::TELEPULES_LISTA)->with('success', 'A(z) "'.$cityName.'" város sikeresen törölve!');
        } else {
            return redirect(MenuLinks::TELEPULES_LISTA)->with('error', 'Hiba történt a "'.$cityName.'" város törlése során!');
        }
    }



    /**
     * CRUD rész vége
     */





    /**
     * Kiegészítő részek
    */
    public function getCityCoordinates(Request $request)
    {

        $cityName = $request->input('cityName');

        $coordinates = (new OpenWeather())->getCityCoordinetes($cityName)->coord;

        return response()->json($coordinates);
    }


}
