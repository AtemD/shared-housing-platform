<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Laravel\Sanctum\HasApiTokens;
use App\References\UserType;
use App\Models\Image;
use App\References\ProfileStatus;
use App\References\UserAccountStatus;
use App\References\UserVerificationStatus;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasSlug, HasRoles;

    protected $guard_name = 'web';
    protected $table = 'users';

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
        'type',
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
    public function getSlugOptions(): SlugOptions
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

    /**
     * Get the place s minimum stay period.
     *
     * @param  string  $value
     * @return string
     */
    public function getVerificationStatusAttribute($value)
    {
        return UserVerificationStatus::getName($value);
    }

    public function getAccountStatusAttribute($value)
    {
        return UserAccountStatus::getName($value);
    }

    public function getProfileStatusAttribute($value)
    {
        return ProfileStatus::getName($value);
    }

    public function getTypeAttribute($value)
    {
        return UserType::getName($value);
    }

    public function basicProfile()
    {
        return $this->hasOne(BasicProfile::class);
    }

    public function placePreference()
    {
        return $this->hasOne(PlacePreference::class);
    }

    public function places()
    {
        return $this->hasMany(Place::class);
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

    public function compatibilityQuestions()
    {
        return $this->belongsToMany(CompatibilityQuestion::class, 'user_has_compatibility_question_answers', 'user_id', 'compatibility_question_id')
            ->withPivot('compatibility_question_relevance', 'user_answer_id', 'match_answer_id');
    }

    public function answerChoices()
    {
        return $this->belongsToMany(AnswerChoice::class, 'user_has_compatibility_question_answers', 'user_id', 'user_answer_id');
    }

    public function userLocation()
    {
        return $this->hasOne(UserLocation::class);
    }

    /**
     * Get all of the occupations for the user.
     */
    public function occupations()
    {
        return $this->hasManyThrough(Occupation::class, BasicProfile::class);
    }

    public function sentPlaceRequests()
    {
        return $this->belongsToMany(User::class, 'place_requests', 'sender_id', 'user_id')
            ->withPivot(['place_id', 'status'])
            ->withTimestamps();
    }

    public function placeRequests()
    {
        return $this->belongsToMany(User::class, 'place_requests', 'user_id', 'sender_id')
            ->withPivot(['place_id', 'status'])
            ->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function matches()
    {
        return $this->belongsToMany(User::class, 'matches', 'user_id', 'matched_user_id')
            ->withPivot(['place_id', 'compatibility_percentage'])
            ->withTimestamps();
    }

    public function placeMatches()
    {
        return $this->belongsToMany(Place::class, 'matches', 'user_id', 'place_id')
            ->withPivot(['matched_user_id', 'compatibility_percentage'])
            ->withTimestamps();
    }
}
