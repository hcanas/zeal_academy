<?php

namespace Database\Seeders;

use App\Models\Earning;
use Illuminate\Database\Seeder;

class EarningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scholars = [
//            [
//                'scholar_id' => '0xa0f8564616d4fd3c86041ad3fbfd13dceab464e2',
//                'last_claim_date' => '2021-08-11 14:12:35',
//                'next_claim_date' => '2021-08-26 14:12:35',
//                'last_claimed_slp' => 0,
//                'ronin_slp' => 0,
//                'in_game_slp' => 1668,
//                'mmr' => 1001,
//                'rank' => 1149861,
//                'created_at' => '2021-09-04 23:59:00',
//            ],
//            [
//                'scholar_id' => '0x5dcefcf9130dc6b8d616d6780b7cf08c796080c0',
//                'last_claim_date' => '2021-08-11 10:43:43',
//                'next_claim_date' => '2021-08-26 10:43:43',
//                'last_claimed_slp' => 0,
//                'ronin_slp' => 0,
//                'in_game_slp' => 2091,
//                'mmr' => 1021,
//                'rank' => 1117986,
//                'created_at' => '2021-09-04 23:59:00',
//            ],
//            [
//                'scholar_id' => '0x1d58bac598729cbb1056a0a16d7fbf9655bc983b',
//                'last_claim_date' => '2021-08-11 10:30:32',
//                'next_claim_date' => '2021-08-26 10:30:32',
//                'last_claimed_slp' => 0,
//                'ronin_slp' => 0,
//                'in_game_slp' => 2843,
//                'mmr' => 1412,
//                'rank' => 401288,
//                'created_at' => '2021-09-04 23:59:00',
//            ],
//            [
//                'scholar_id' => '0x7373fb971afb8cb853adbe90317588e31142435d',
//                'last_claim_date' => '2021-08-11 12:25:52',
//                'next_claim_date' => '2021-08-26 12:25:52',
//                'last_claimed_slp' => 0,
//                'ronin_slp' => 0,
//                'in_game_slp' => 1910,
//                'mmr' => 1261,
//                'rank' => 657970,
//                'created_at' => '2021-09-04 23:59:00',
//            ],
//            [
//                'scholar_id' => '0x2843d895078c5103f64852a72193ed2f29950386',
//                'last_claim_date' => '2021-08-16 12:55:15',
//                'next_claim_date' => '2021-08-31 12:55:15',
//                'last_claimed_slp' => 0,
//                'ronin_slp' => 0,
//                'in_game_slp' => 2171,
//                'mmr' => 1228,
//                'rank' => 723991,
//                'created_at' => '2021-09-04 23:59:00',
//            ],
//            [
//                'scholar_id' => '0x6aaaceb65188b2eb52e6ae886adb29b9dc7f176e',
//                'last_claim_date' => '2021-08-16 13:36:34',
//                'next_claim_date' => '2021-08-31 13:36:34',
//                'last_claimed_slp' => 0,
//                'ronin_slp' => 0,
//                'in_game_slp' => 2264,
//                'mmr' => 1386,
//                'rank' => 439427,
//                'created_at' => '2021-09-04 23:59:00',
//            ],
//            [
//                'scholar_id' => '0x42058063877861bf2ab327f627d53cc121617087',
//                'last_claim_date' => '2021-08-22 15:36:34',
//                'next_claim_date' => '2021-09-06 15:36:34',
//                'last_claimed_slp' => 0,
//                'ronin_slp' => 0,
//                'in_game_slp' => 2013,
//                'mmr' => 1528,
//                'rank' => 259323,
//                'created_at' => '2021-09-04 23:59:00',
//            ],
//            [
//                'scholar_id' => '0x699265bef9c7b48ca6c1204b734669da619d9671',
//                'last_claim_date' => '2021-08-23 11:58:51',
//                'next_claim_date' => '2021-09-27 11:58:51',
//                'last_claimed_slp' => 0,
//                'ronin_slp' => 0,
//                'in_game_slp' => 1377,
//                'mmr' => 1266,
//                'rank' => 648459,
//                'created_at' => '2021-09-04 23:59:00',
//            ],
//            [
//                'scholar_id' => '0x26c4c4853449efe880526bc63988b6a7687eeb97',
//                'last_claim_date' => '2021-08-28 08:13:06',
//                'next_claim_date' => '2021-09-12 08:13:06',
//                'last_claimed_slp' => 0,
//                'ronin_slp' => 0,
//                'in_game_slp' => 614,
//                'mmr' => 916,
//                'rank' => 1249837,
//                'created_at' => '2021-09-04 23:59:00',
//            ],
//            [
//                'scholar_id' => '0x269d36fa2d3e3aa4217484e40f623a380f53ccfb',
//                'last_claim_date' => '2021-08-28 14:15:22',
//                'next_claim_date' => '2021-09-12 14:15:22',
//                'last_claimed_slp' => 0,
//                'ronin_slp' => 0,
//                'in_game_slp' => 590,
//                'mmr' => 1017,
//                'rank' => 1126174,
//                'created_at' => '2021-09-04 23:59:00',
//            ],
//            [
//                'scholar_id' => '0xcd63c5259b11a149371d1e4909c1714ba0b969ba',
//                'last_claim_date' => '2021-08-28 04:03:12',
//                'next_claim_date' => '2021-09-12 04:03:12',
//                'last_claimed_slp' => 0,
//                'ronin_slp' => 0,
//                'in_game_slp' => 843,
//                'mmr' => 1145,
//                'rank' => 906929,
//                'created_at' => '2021-09-04 23:59:00',
//            ],
            [
                'scholar_id' => '0xc734637cdc2628e2a1078e66826b8b768e0227d8',
                'last_claim_date' => '2021-09-10 21:12:39',
                'next_claim_date' => '2021-09-25 21:12:39',
                'last_claimed_slp' => 0,
                'ronin_slp' => 0,
                'in_game_slp' => 56,
                'mmr' => 856,
                'rank' => 1405712,
                'created_at' => '2021-09-10 23:59:00',
            ],
            [
                'scholar_id' => '0x59cb24baeea8ace2465441028fe99515a9a2781d',
                'last_claim_date' => '2021-09-10 23:04:53',
                'next_claim_date' => '2021-09-25 23:04:53',
                'last_claimed_slp' => 0,
                'ronin_slp' => 0,
                'in_game_slp' => 81,
                'mmr' => 1151,
                'rank' => 969312,
                'created_at' => '2021-09-10 23:59:00',
            ],
        ];

        foreach ($scholars AS $scholar) {
            Earning::create($scholar);
        }
    }
}
