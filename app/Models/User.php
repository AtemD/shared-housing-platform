<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Laravel\Sanctum\HasApiTokens;
use App\References\UserType;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
        'last_active',
        'verification_status',
        'account_status',
        'profile_status',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['first_name', 'last_name'])
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
     * Determine wether the logged in user is an admin
     * 
     * @return bool
     */
    public function isAdmin()
     {
         return Auth::check() && $this->user_type === UserType::ADMIN;
     }

     public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

     public function basicProfile()
     {
         return $this->hasOne(BasicProfile::class);
     }

     public function placeListingPreferences()
     {
         return $this->hasOne(PlaceListingPreference::class);
     }

     public function placeListings()
     {
         return $this->hasMany(PlaceListing::class);
     }

     public function images()
     {
         return $this->morphMany(Image::class, 'imageable');
     }

     public function personalPreference()
     {
         return $this->hasOne(PersonalPreference::class);
     }

     public function compatibilityPreference()
     {
         return $this->hasOne(CompatibilityPreference::class);
     }

     public function interests()
     {
         return $this->belongsToMany(Interest::class, 'user_has_interests', 'user_id', 'interest_id');
     }
}
