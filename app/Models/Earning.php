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
        'last_claim_date' => 'datetime:Y-m-d H:i:s',
        'next_claim_date' => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function scholar()
    {
        return $this->belongsTo(Scholar::class);
    }
}
