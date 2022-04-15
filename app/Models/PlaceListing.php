<?php

namespace App\Models;

use App\References\FurnishingType;
use App\References\PeriodType;
use App\References\PlaceType;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceListing extends Model
{
    use HasFactory, HasSlug;

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
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        // Obtain living place type as string
        $place_types = PlaceType::placeTypeList();
        $place_type = $place_types[$this->place_type];

        // Obtain furnishing as string
        $furnishing_types = FurnishingType::furnishingTypeList();
        $furnishing_type = $furnishing_types[$this->furnishing_type];

        return SlugOptions::create()
            ->generateSlugsFrom(function () use ($place_type, $furnishing_type) {
                return "{$place_type} {$furnishing_type}";
            })
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

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
