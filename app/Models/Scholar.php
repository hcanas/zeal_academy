<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'share',
        'referrer',
    ];

    public function axies()
    {
        return $this->hasMany(Axie::class);
    }
}
