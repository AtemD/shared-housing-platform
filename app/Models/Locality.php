<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'city_id',
        'acronym',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function places()
    {
        return $this->hasMany(Place::class);
    }

    public function userLocations()
    {
        return $this->hasMany(UserLocation::class);
    }

    public function preferredLocations()
    {
        return $this->belongsToMany(PlacePreference::class, 'place_preference_has_preferred_locations', 'locality_id', 'place_preference_id');
    }
}
