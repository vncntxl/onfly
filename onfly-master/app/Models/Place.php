<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'description', 'average_rating', 'place_picture', 'category_id', 'latitude', 'longitude'];

    public function reviews()
    {
        return $this->hasMany(Review::class)->with('user');
    }
    public function getAvgRating()
    {
        $avgRating = $this->reviews()->avg('rating');
        return number_format($avgRating, 1);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
