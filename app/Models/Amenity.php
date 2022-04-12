<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    public function placeListings()
    {
        return $this->belongsToMany(PlaceListing::class, 'place_listing_has_amenities', 'amenity_id', 'place_listing_id');
    }
}
