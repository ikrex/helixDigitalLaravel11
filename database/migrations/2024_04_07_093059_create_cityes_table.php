<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\CityesTable;
use App\Constants\Tables;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Tables::TABLE_TELEPULESEK, function (Blueprint $table) {
            $table->id();
            $table->string(CityesTable::FIELD_TELEPULESNEV);
            $table->decimal(CityesTable::FIELD_LAT, 10,6);
            $table->decimal(CityesTable::FIELD_LON, 10,6);
            $table->boolean(CityesTable::FIELD_ACTIVE)->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cityes');
    }
};
