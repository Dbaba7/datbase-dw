<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
    use HasFactory;

    protected $fillable = [
        'crime_id',
        'name',
        'address',
        'phone_number',
        'date_of_birth',
        'statement',
    ];

    public function crime()
    {
        return $this->belongsTo(Crime::class);
    }
}
