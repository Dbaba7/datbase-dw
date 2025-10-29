<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Officer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'rank',
        'badge_number',
        'phone_number',
        'station',
    ];

    public function crimes()
    {
        return $this->belongsToMany(Crime::class);
    }
}
