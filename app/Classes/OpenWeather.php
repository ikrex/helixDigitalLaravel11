<?php
namespace Classes;

use Exception;

/**
 * Usage
 * $weatherInfo = new OpenWeather();
 * $weatherInfo->setLat($latitude); //Ez a szélességi kör
 * $weatherInfo->setLon($longitude); // Ez a hosszúsági fok
 * $weatherInfo->getCityWeatherInfo(); A beállított szélességi kör és hosszúsági fok alapján lekéri az aktuális időjárási adatokat
 *
 * Kiegészítő lehetőségek
 * $weatherInfo->setUnits($units); standatd|metric|imperial //alapértelmezett a standard, ami anglikán mértékegységeket használ pl °F
 * $weatherInfo->setMode($mode); json|xml|html //Alapértelmezett a json
 * $weatherInfo->setLang($language); A nyelvet tudod beállítani, alapértelmezett az en, de én az appomban hu azaz Magyarra állítom az alapértelmezettet
 *
 */



class OpenWeather {

    const MODE_JSON = 'json';
    const MODE_XML = 'xml';
    const MODE_HTML = 'html';


    const UNITS_STANDARD = 'standard';
    const UNITS_METRIC = 'metric';
    const UNITS_IMPERIAL = 'imperial';

    // const _ = '';



    private $mode = self::MODE_JSON;
    private $units = self::UNITS_METRIC;

    private $lat = NULL;
    private $lon = NULL;
    private $appUrl = "https://api.openweathermap.org/data/2.5/weather?";
    private $baseAppUrl = "https://api.openweathermap.org/data/2.5/";
    private $apiKey = "5fc76e4e480f83af65d8a53832008827";
    private $lang = "hu";



    public function __construct()
    {

    }



    private function buildUrl()
    {
        // Két kötelező bemeneti adat van, a szélességi kör és hosszúsági fok. Ha ezek közül nincs meg legalább egy, akkor nem lehet lekérni, visszatérek NULL -lal
        if (is_null($this->lat) OR is_null($this->lon)) {return NULL;}

        $urlParts=[];
        $urlParts[]="lat=".$this->lat;
        $urlParts[]="lon=".$this->lon;
        $urlParts[]="appid=".$this->apiKey;
        $urlParts[]="lang=".$this->lang;
        $urlParts[]="units=".$this->units;
        $urlParts[]="mode=".$this->mode;

        return $this->appUrl.(implode('&', $urlParts));

    }

    public function getCityWeatherInfo()
    {

        try {
            $fullAppUrl = $this->buildUrl();
            // dd($fullAppUrl);
            $response = file_get_contents($fullAppUrl);

            // Válasz JSON dekódolása
            $data = json_decode($response);
            if ($data && $data->cod == 200) {
                return $data;
            }
            else {
                return NULL;
            }
        } catch (Exception $e)
        {
            echo $e->__toString();
        }


    }



    public function getCityCoordinetes($city)
    {
        try {
            $fullAppUrl = $this->appUrl."q={$city}&appid=5fc76e4e480f83af65d8a53832008827";
            // dd($fullAppUrl);
            $response = file_get_contents($fullAppUrl);

            // Válasz JSON dekódolása
            $data = json_decode($response);
            if ($data && $data->cod == 200) {
                return $data;
            }
            else {
                return NULL;
            }
            } catch (Exception $e)
            {
                echo $e->__toString();
            }


    }






    /**
     * Get the value of mode
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set the value of mode
     *
     * @return  self
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Get the value of units
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Set the value of units
     *
     * @return  self
     */
    public function setUnits($units)
    {
        $this->units = $units;

        return $this;
    }

    /**
     * Get the value of lon
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * Set the value of lon
     *
     * @return  self
     */
    public function setLon($lon)
    {
        $this->lon = $lon;

        return $this;
    }

    /**
     * Get the value of lat
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set the value of lat
     *
     * @return  self
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }




    /**
     * Get the value of lang
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set the value of lang
     *
     * @return  self
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }
}
?>
