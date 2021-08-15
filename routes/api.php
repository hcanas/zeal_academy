<?php

use Illuminate\Support\Facades\Route;

Route::get('token_price/{symbol}', [\App\Http\Controllers\TokenPriceController::class, 'show']);

Route::apiResource('scholars', \App\Http\Controllers\ScholarController::class);
