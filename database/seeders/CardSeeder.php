<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();

            $cards = Http::get('https://storage.googleapis.com/axie-cdn/game/cards/card-abilities.json')->json();

            foreach ($cards AS $card) {
                Card::create([
                    'code' => $card['id'],
                    'part' => $card['partName'],
                    'skill' => $card['skillName'],
                    'attack' => $card['defaultAttack'],
                    'defense' => $card['defaultDefense'],
                    'energy' => $card['defaultEnergy'],
                    'type' => $card['expectType'],
                    'icon' => $card['iconId'],
                    'description' => $card['description'],
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            logger($e);
            DB::rollBack();
        }
    }
}
