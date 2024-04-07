<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Constants\WeatherTable;
use App\Constants\Tables;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Tables::TABLE_TAROLT_ADATOK, function (Blueprint $table) {
            $table->id();
            $table->dateTime(WeatherTable::FIELD_LETRATOLAS_IDEJE)->default(now());

            // idegen kulcs a cityes táblára, ezzel kötöm össze logikailag, hogy a cityes tábla ID oszlopának az értéke ennek a kulcsnak a párja
            $table->foreignId(WeatherTable::FIELD_TELEPULES_AZONOSITO)->constrained(Tables::TABLE_TELEPULESEK);
            $table->integer(WeatherTable::FIELD_HOMERSEKLET);
            $table->integer(WeatherTable::FIELD_PARATARTALOM);
            $table->integer(WeatherTable::FIELD_SZELSEBESSEG);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stored_weather_datas');
    }
};
