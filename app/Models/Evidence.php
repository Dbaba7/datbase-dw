<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evidence extends Model
{
    use HasFactory;

    protected $fillable = [
        'crime_id',
        'description',
        'file_path',
        'collected_at',
    ];

    public function crime()
    {
        return $this->belongsTo(Crime::class);
    }
}
