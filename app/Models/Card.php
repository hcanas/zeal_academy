<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'code',
        'part',
        'skill',
        'attack',
        'defense',
        'energy',
        'type',
        'icon',
        'description',
    ];

    public function part()
    {
        return $this->hasOne(Part::class);
    }
}
