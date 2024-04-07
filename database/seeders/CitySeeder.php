<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Constants\CityesTable;


class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Városok listája
        $cities = [
            [
                CityesTable::FIELD_TELEPULESNEV => 'Aszód',
                CityesTable::FIELD_LAT => 47.6537578,
                CityesTable::FIELD_LON => 19.4848873,
                CityesTable::FIELD_ACTIVE => true
            ],
            [
                CityesTable::FIELD_TELEPULESNEV => 'Zagyvaszántó',
                CityesTable::FIELD_LAT => 47.774557,
                CityesTable::FIELD_LON => 19.6689809,
                CityesTable::FIELD_ACTIVE => true
            ],
            [
                CityesTable::FIELD_TELEPULESNEV => 'Budapest XX ker',
                CityesTable::FIELD_LAT => 47.4328848,
                CityesTable::FIELD_LON => 19.1235267,
                CityesTable::FIELD_ACTIVE => true
            ],
            [
                CityesTable::FIELD_TELEPULESNEV => 'Kecskemét',
                CityesTable::FIELD_LAT => 46.9063618,
                CityesTable::FIELD_LON => 19.6976202,
                CityesTable::FIELD_ACTIVE => true
            ],
            [
                CityesTable::FIELD_TELEPULESNEV => 'Balatonszemes',
                CityesTable::FIELD_LAT => 46.806749,
                CityesTable::FIELD_LON => 17.7615958,
                CityesTable::FIELD_ACTIVE => true
            ],
            [
                CityesTable::FIELD_TELEPULESNEV => 'Kiskunfélegyháza',
                CityesTable::FIELD_LAT => 46.7121,
                CityesTable::FIELD_LON => 19.8446,
                CityesTable::FIELD_ACTIVE => true
            ],
            [
                CityesTable::FIELD_TELEPULESNEV => 'Zebegény',
                CityesTable::FIELD_LAT => 47.8002,
                CityesTable::FIELD_LON => 18.909,
                CityesTable::FIELD_ACTIVE => true
            ],
            [
                CityesTable::FIELD_TELEPULESNEV => 'Budapest XIX. kerület',
                CityesTable::FIELD_LAT => 47.4529,
                CityesTable::FIELD_LON => 19.1494,
                CityesTable::FIELD_ACTIVE => true
            ],
            [
                CityesTable::FIELD_TELEPULESNEV => 'Miskolc',
                CityesTable::FIELD_LAT => 48.1,
                CityesTable::FIELD_LON => 20.7833,
                CityesTable::FIELD_ACTIVE => true
            ],
            [
                CityesTable::FIELD_TELEPULESNEV => 'Szeged',
                CityesTable::FIELD_LAT => 46.253,
                CityesTable::FIELD_LON => 20.1482,
                CityesTable::FIELD_ACTIVE => true
            ],
            [
                CityesTable::FIELD_TELEPULESNEV => 'Balassagyarmat',
                CityesTable::FIELD_LAT => 48.073,
                CityesTable::FIELD_LON => 19.2961,
                CityesTable::FIELD_ACTIVE => true
            ],
            [
                CityesTable::FIELD_TELEPULESNEV => 'Palotás',
                CityesTable::FIELD_LAT => 47.7953,
                CityesTable::FIELD_LON => 19.5962,
                CityesTable::FIELD_ACTIVE => true
            ],
            [
                CityesTable::FIELD_TELEPULESNEV => 'Debrecen',
                CityesTable::FIELD_LAT => 47.5333,
                CityesTable::FIELD_LON => 21.6333,
                CityesTable::FIELD_ACTIVE => true
            ],
            [
                CityesTable::FIELD_TELEPULESNEV => 'Százhalombatta',
                CityesTable::FIELD_LAT => 47.3258,
                CityesTable::FIELD_LON => 18.9214,
                CityesTable::FIELD_ACTIVE => true
            ],
            [
                CityesTable::FIELD_TELEPULESNEV => 'Eger',
                CityesTable::FIELD_LAT => 47.5356,
                CityesTable::FIELD_LON => 20.2229,
                CityesTable::FIELD_ACTIVE => true
            ],

        ];


        // Városok feltöltése az adatbázisba
        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
