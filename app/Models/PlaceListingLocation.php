<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceListingLocation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'place_listing_id',
        'city_id',
        'locality_id',
        'street',
        'specific_information',
        'address',
        'lng',
        'lat',
    ];

    public function placeListing()
    {
        return $this->belongsTo(PlaceListing::class);
    }
}
