<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class StatisticsService
{
    public function stats($address)
    {
        $response = Http::get('https://api.lunaciarover.com/stats/'.$address);

        if ($response->json('game_stats_success')) {
            return $response->json();
        } else {
            return null;
        }
    }

    public function axies($address)
    {
        $response = Http::get('https://axie-proxy.secret-shop.buzz/_axiesPlease/'.$address);

        if (count($response->json('available_axies')['results']) === 0) {
            return null;
        } else {
            return $response->json('available_axies')['results'];
        }
    }
}
