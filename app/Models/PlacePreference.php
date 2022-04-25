<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlacePreference extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'min_rent_amount',
        'max_rent_amount',
        'rent_period',
        'availability_date'
    ];

    public function getAvailabilityDateAttribute($value)
    {
        return Carbon::parse($value)->format('d M');
    }

    public function getMinRentAmountAttribute($value)
    {
        return $value/100;
    }

    public function getMaxRentAmountAttribute($value)
    {
        return $value/100;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function preferredLocations()
    {
        return $this->belongsToMany(Locality::class, 'place_preference_has_preferred_locations', 'place_preference_id', 'locality_id');
    }
}
