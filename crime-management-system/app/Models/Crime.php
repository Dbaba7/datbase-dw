<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Crime extends Model
{
    use HasFactory;

    protected $fillable = [
        'crime_type',
        'description',
        'location',
        'reported_at',
        'status',
    ];

    public function officers()
    {
        return $this->belongsToMany(Officer::class);
    }

    public function evidence()
    {
        return $this->hasMany(Evidence::class);
    }
}
