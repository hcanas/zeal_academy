<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Axie extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'scholar_id',
        'name',
        'class',
        'image',
        'breed_count',
    ];

    public function parts()
    {
        return $this->belongsToMany(Part::class);
    }

    public function scholar()
    {
        return $this->belongsTo(Scholar::class);
    }
}
