<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Constants\Tables;
use App\Constants\CityesTable;


class City extends Model
{
    use HasFactory;

    protected $table = Tables::TABLE_TELEPULESEK;

    protected $fillable = [
        CityesTable::FIELD_TELEPULESNEV,
        CityesTable::FIELD_LAT,
        CityesTable::FIELD_LON,
        CityesTable::FIELD_ACTIVE
    ];
}
