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
            [
                'name' => 'Tusty#9342',
                'address' => '0xa0f8564616d4fd3c86041ad3fbfd13dceab464e2',
                'share' => 60,
                'referrer' => 'Helnar',
            ],
            [
                'name' => 'jnhl#4236',
                'address' => '0x5dcefcf9130dc6b8d616d6780b7cf08c796080c0',
                'share' => 60,
                'referrer' => 'Zeke',
            ],
            [
                'name' => 'Makoy#9681',
                'address' => '0x1d58bac598729cbb1056a0a16d7fbf9655bc983b',
                'share' => 60,
                'referrer' => 'Raiquia',
            ],
            [
                'name' => 'Pastanoodlesdoodles#2812',
                'address' => '0x7373fb971afb8cb853adbe90317588e31142435d',
                'share' => 60,
                'referrer' => 'Public',
            ],
            [
                'name' => 'vin14#5692',
                'address' => '0x2843d895078c5103f64852a72193ed2f29950386',
                'share' => 60,
                'referrer' => 'Mahesvara',
            ],
            [
                'name' => 'iampadz28#7521',
                'address' => '0x6aaaceb65188b2eb52e6ae886adb29b9dc7f176e',
                'share' => 60,
                'referrer' => 'Mushin',
            ],
        ];

        foreach ($scholars AS $scholar) {
            Scholar::create($scholar);
        }
    }
}
