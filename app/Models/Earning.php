<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    use HasFactory;

    public $timestamps = ['created_at'];
    const UPDATED_AT = null;

    protected $fillable = [
        'scholar_id',
        'last_claim_date',
        'next_claim_date',
        'last_claimed_slp',
        'ronin_slp',
        'in_game_slp',
        'mmr',
        'rank',
    ];

    protected $casts = [
        'last_claim_date' => 'datetime',
        'next_claim_date' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function scholar()
    {
        return $this->belongsTo(Scholar::class);
    }
}
