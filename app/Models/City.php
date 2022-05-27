<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'region_id',
        'acronym',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function localities()
    {
        return $this->hasMany(Locality::class);
    }

    public function placeLocations()
    {
        return $this->hasMany(PlaceLocation::class);
    }

    public function userLocations()
    {
        return $this->hasMany(UserLocation::class);
    }

    public function placePreferences()
    {
        return $this->belongsToMany(PlacePreference::class, 'preferred_locations', 'city_id', 'place_preference_id');
    }
}
