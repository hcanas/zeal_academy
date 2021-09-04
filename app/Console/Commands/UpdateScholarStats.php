<?php

namespace App\Console\Commands;

use App\Models\Scholar;
use App\Services\StatisticsService;
use Illuminate\Console\Command;

class UpdateScholarStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:updateScholarStats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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
                $scholar->mmr = $stats['pvpData']['elo'];
                $scholar->rank = $stats['pvpData']['rank'];
                $scholar->save();
            }
        }
    }
}
