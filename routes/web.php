<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CityController;
use App\Constants\MenuLinks;


Route::get('/', function () {
    return view('welcome');
});


Route::get(MenuLinks::TELEPULES_LISTA, 'App\Http\Controllers\CityController@getCityListToTable');



// ha olyan URL lenne meghívva, amit az előzőekben nem kezeltem le, akkor ezt hívja meg
Route::fallback([CityController::class, 'getCityListToTable']);
