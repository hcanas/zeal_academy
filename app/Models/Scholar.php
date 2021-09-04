<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'name',
        'share',
        'relationship',
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
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function axies()
    {
        return $this->hasMany(Axie::class);
    }
}
