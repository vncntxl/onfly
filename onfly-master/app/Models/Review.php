<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_id',
        'review',
        'comment',
        'star',
    ];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
