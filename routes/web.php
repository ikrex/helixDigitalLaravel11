<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CityController;
use App\Constants\MenuLinks;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get( MenuLinks::TELEPULES_LISTA, 'App\Http\Controllers\CityController@getCityListToTable' )->name('getCityListToTable');

/** Az új település felvételéért felelős rész */
Route::get( MenuLinks::UJ_TELEPULES, function () {
    return view('newCity');
})->name('addCity');
Route::post(MenuLinks::UJ_TELEPULES, 'App\Http\Controllers\CityController@addCity');


/** A település törléséért felelős rész */
Route::get( MenuLinks::TELEPULES_TORLESE, 'App\Http\Controllers\CityController@deleteCityForm');
Route::get( MenuLinks::TELEPULES_TORLESE."/{id}", 'App\Http\Controllers\CityController@deleteCity');
Route::post( MenuLinks::TELEPULES_TORLESE."/{id}", 'App\Http\Controllers\CityController@deleteCity');


Route::get( MenuLinks::TELEPULES_VALTOZTATASA."/{id}", 'App\Http\Controllers\CityController@updateCityForm');
Route::post( MenuLinks::TELEPULES_VALTOZTATASA, 'App\Http\Controllers\CityController@updateCity');



Route::get( MenuLinks::ADATOK_KOMBINALT."/{id}/{day}", 'App\Http\Controllers\WeatherController@combinedDatas');


Route::get( "/cron", 'App\Classes\Cron@collectWeatherInfos');




Route::get('/getcityCoordinates', 'App\Http\Controllers\CityController@getCityCoordinates');




// ha olyan URL lenne meghívva, amit az előzőekben nem kezeltem le, akkor ezt hívja meg
Route::fallback([CityController::class, 'getCityListToTable']);
