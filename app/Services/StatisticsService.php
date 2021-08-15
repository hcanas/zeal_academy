<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class StatisticsService
{
    public function earnings($address)
    {
        $response = Http::get('https://axie-proxy.secret-shop.buzz/_schoEarnings/'.$address);

        if ($response->json('earnings')['last_claimed'] === null) {
            return null;
        } else {
            return $response->json('earnings');
        }
    }

    public function leaderboards($address)
    {
        $response = Http::get('https://axie-proxy.secret-shop.buzz/_basicStats/'.$address);

        if ($response->json('stats')['name'] === null) {
            return null;
        } else {
            return $response->json('stats');
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
