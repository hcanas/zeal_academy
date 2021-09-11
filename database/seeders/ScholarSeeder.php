<?php

namespace Database\Seeders;

use App\Models\Scholar;
use Illuminate\Database\Seeder;

class ScholarSeeder extends Seeder
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
//                'id' => '0xa0f8564616d4fd3c86041ad3fbfd13dceab464e2',
//                'name' => 'Woe#1978',
//                'share' => 60,
//                'relationship' => 'Helnar',
//            ],
//            [
//                'id' => '0x5dcefcf9130dc6b8d616d6780b7cf08c796080c0',
//                'name' => 'jnhl#4236',
//                'share' => 60,
//                'relationship' => 'Zeke',
//            ],
//            [
//                'id' => '0x1d58bac598729cbb1056a0a16d7fbf9655bc983b',
//                'name' => 'Makoy#9681',
//                'share' => 60,
//                'relationship' => 'Raiquia',
//            ],
//            [
//                'id' => '0x7373fb971afb8cb853adbe90317588e31142435d',
//                'name' => 'Pastanoodlesdoodles#2812',
//                'share' => 60,
//                'relationship' => 'Academy',
//            ],
//            [
//                'id' => '0x2843d895078c5103f64852a72193ed2f29950386',
//                'name' => 'vin14#5692',
//                'share' => 60,
//                'relationship' => 'Mahesvara',
//            ],
//            [
//                'id' => '0x6aaaceb65188b2eb52e6ae886adb29b9dc7f176e',
//                'name' => 'iampadz28#7521',
//                'share' => 60,
//                'relationship' => 'Mushin',
//            ],
//            [
//                'id' => '0x42058063877861bf2ab327f627d53cc121617087',
//                'name' => 'lexteezy#0423',
//                'share' => 60,
//                'relationship' => 'Academy',
//            ],
//            [
//                'id' => '0x699265bef9c7b48ca6c1204b734669da619d9671',
//                'name' => 'Makatao#4462',
//                'share' => 60,
//                'relationship' => 'Mushin',
//            ],
//            [
//                'id' => '0x26c4c4853449efe880526bc63988b6a7687eeb97',
//                'name' => 'Boneless#6094',
//                'share' => 60,
//                'relationship' => 'Mushin',
//            ],
//            [
//                'id' => '0x269d36fa2d3e3aa4217484e40f623a380f53ccfb',
//                'name' => 'TNTiramisu#0381',
//                'share' => 60,
//                'relationship' => 'Helnar',
//            ],
//            [
//                'id' => '0xcd63c5259b11a149371d1e4909c1714ba0b969ba',
//                'name' => 'Mephisto1213#2074',
//                'share' => 60,
//                'relationship' => 'Academy',
//            ],
            [
                'id' => '0xc734637cdc2628e2a1078e66826b8b768e0227d8',
                'name' => 'Anitos#8691',
                'share' => 60,
                'relationship' => 'Mahesvara',
            ],
            [
                'id' => '0x59cb24baeea8ace2465441028fe99515a9a2781d',
                'name' => 'Willem#1101',
                'share' => 60,
                'relationship' => 'Academy',
            ],
        ];

        foreach ($scholars AS $scholar) {
            Scholar::firstOrCreate($scholar);
        }
    }
}
