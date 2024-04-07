<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Constants\Tables;
use App\Constants\WeatherTable;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table(Tables::TABLE_TAROLT_ADATOK, function (Blueprint $table) {
            $table->decimal(WeatherTable::FIELD_HOMERSEKLET, 10, 6)->change();
            $table->decimal(WeatherTable::FIELD_PARATARTALOM, 10, 6)->change();
            $table->decimal(WeatherTable::FIELD_SZELSEBESSEG, 10, 6)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stored_weather_datas', function (Blueprint $table) {
            //
        });
    }
};
