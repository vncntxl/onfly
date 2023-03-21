<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['rating', 'comment', 'place_id', 'user_id', 'user_name'];


    public function place()
    {
        return $this->belongsTo(Place::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}
