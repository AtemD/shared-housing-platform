<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    public function places()
    {
        return $this->belongsToMany(Place::class, 'place_has_amenities', 'amenity_id', 'place_id');
    }
}
