<?php

namespace Database\Seeders;

use App\Models\Axie;
use App\Models\Card;
use App\Models\Part;
use App\Models\Scholar;
use App\Services\StatisticsService;
use Illuminate\Database\Seeder;

class AxieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = new StatisticsService();
        $scholars = Scholar::all();

        foreach ($scholars AS $scholar) {
            $axies = $service->axies($scholar->id);

            foreach ($axies AS $axie) {
                Axie::firstOrCreate([
                    'id' => $axie['id'],
                    'scholar_id' => $scholar['id'],
                    'name' => $axie['name'],
                    'class' => strtolower($axie['class']),
                    'image' => $axie['image'],
                    'breed_count' => $axie['breedCount'],
                ]);

                if (count($axie['parts']) > 0) {
                    foreach ($axie['parts'] AS $axie_part) {
                        $name = $axie_part['name'];
                        $class = strtolower($axie_part['class']);
                        $type = strtolower($axie_part['type']);

                        if (in_array($type, ['mouth', 'horn', 'back', 'tail'])) {
                            $part = Part::query()
                                ->where('name', $name)
                                ->where('class', $class)
                                ->where('type', $type)
                                ->first();

                            if ($part === null) {
                                $card = Card::query()
                                    ->where('code', 'LIKE', $class.'-'.$type.'%')
                                    ->where('part', $name)
                                    ->first();

                                $part = Part::create([
                                    'card_id' => $card['id'],
                                    'name' => $name,
                                    'class' => $class,
                                    'type' => $type,
                                ]);
                            }

                            $part->axies()->attach([$axie['id']]);
                        }
                    }
                }
            }
        }
    }
}
