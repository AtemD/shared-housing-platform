<?php

namespace App\Models;

use App\References\FurnishingType;
use App\References\PeriodType;
use App\References\PlaceType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceListing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rent_amount',
        'rent_period',
        'bills_included',
        'currency',
        'place_type',
        'furnishing_type',
        'min_stay_period',
        'availability_date',
        'description',
        'featured_image_id',
        'rent_currency',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    /**
     * Get the place listings rent period.
     *
     * @param  string  $value
     * @return string
     */
    public function getRentPeriodAttribute($value)
    {
        return PeriodType::convertDaysToPeriodType($value);
    }

    /**
     * Get the place listings minimum stay period.
     *
     * @param  string  $value
     * @return string
     */
    public function getMinStayPeriodAttribute($value)
    {
        return PeriodType::convertDaysToPeriodType($value);
    }

    /**
     * Get the place listings furnishing type
     *
     * @param  string  $value
     * @return string
     */
    public function getFurnishingTypeAttribute($value)
    {
        return FurnishingType::getTypeName($value);
    }

    public function getRentAmountAttribute($value)
    {
        return $value/100;
    }

    public function getPlaceTypeAttribute($value)
    {
        return PlaceType::getName($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function featuredImage()
    {
        return $this->belongsTo(Image::class, 'featured_image_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function placeListingLocation()
    {
        return $this->hasOne(PlaceListingLocation::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'place_listing_has_amenities', 'place_listing_id', 'amenity_id');
    }
}
