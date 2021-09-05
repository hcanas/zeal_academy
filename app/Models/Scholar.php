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
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function axies()
    {
        return $this->hasMany(Axie::class);
    }

    public function earnings()
    {
        return $this->hasMany(Earning::class);
    }

    public function latestEarning()
    {
        return $this->hasOne(Earning::class)->latest();
    }
}
