<?php

namespace App\Console\Commands;

use App\Models\Earning;
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
                Earning::create([
                    'scholar_id' => $scholar->id,
                    'last_claim_date' => date('Y-m-d H:i:s', $stats['claim_timestamp']),
                    'next_claim_date' => date('Y-m-d H:i:s', $stats['next_claim_timestamp']),
                    'last_claimed_slp' => $stats['last_claim_amount'],
                    'ronin_slp' => $stats['ronin_slp'],
                    'in_game_slp' => $stats['ingame_slp'],
                    'mmr' => $stats['pvpData']['elo'],
                    'rank' => $stats['pvpData']['rank'],
                ]);
            }
        }
    }
}
