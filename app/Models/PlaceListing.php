<?php

namespace App\Models;

use App\References\FurnishingType;
use App\References\LivingPlaceType;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlaceListing extends Model
{
    use HasFactory, HasSlug;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        // Obtain living place type as string
        $living_place_types = LivingPlaceType::livingPlaceTypeList();
        $living_place_type = $living_place_types[$this->living_place_type];

        // Obtain furnishing as string
        $furnishing_types = FurnishingType::furnishingTypeList();
        $furnishing_type = $furnishing_types[$this->furnishing_type];

        return SlugOptions::create()
            ->generateSlugsFrom(function() use($living_place_type, $furnishing_type){
                return "{$living_place_type} {$furnishing_type}";
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
}
