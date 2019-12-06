<?php

namespace App\Console;

use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $bids = DB::connection('pentaho')->table('hr_people_all')->where('person_full_name','=','ABDUL ROHIM')->get();

            foreach($bids as $bid) {
                DB::connection('portalbi')->table('testing')->where('npk', $bid->person_empl_id)
                    ->update(['qa' =>'TOMPI'
                    ]);
            }

        })->dailyAt('16:50');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
