<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'card_id',
        'name',
        'class',
        'type',
    ];

    public function axies()
    {
        return $this->belongsToMany(Axie::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
