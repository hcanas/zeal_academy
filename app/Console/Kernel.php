<?php

namespace App\Console;

use App\Models\Scholar;
use App\Services\StatisticsService;
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
            $scholars = Scholar::get();
            $statistics_service = new StatisticsService();

            foreach ($scholars AS $scholar) {
                $stats = $statistics_service->stats($scholar->id);
                if ($stats) {
                    $scholar->last_claim_date = date('Y-m-d H:i:s', $stats['claim_timestamp']);
                    $scholar->next_claim_date = date('Y-m-d H:i:s', $stats['next_claim_timestamp']);
                    $scholar->last_claimed_slp = $stats['last_claim_amount'];
                    $scholar->ronin_slp = $stats['ronin_slp'];
                    $scholar->in_game_slp = $stats['ingame_slp'];
                    $scholar->mmr = $stats['pvpData']['mmr'];
                    $scholar->rank = $stats['pvpData']['rank'];
                    $scholar->save();
                }
            }
        })
        ->timezone('Asia/Manila')
        ->hourly();
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
