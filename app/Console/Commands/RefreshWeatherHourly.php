<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Scheduling\Schedule;

class RefreshWeatherHourly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refresh-weather-hourly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        

        Log::info('Időzített feladat végrehajtva!');
    }


    protected function schedule(Schedule $schedule)
    {
        $schedule->command('refresh:weather-hourly')->hourly();
    }



}
