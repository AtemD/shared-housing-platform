<?php

namespace App\Models;

use App\References\Gender;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'gender',
        'dob',
        'bio',
    ];

    /**
     * Get the place listings rent period.
     *
     * @param  string  $value
     * @return string
     */
    public function getDobAttribute($value)
    {
        return Carbon::parse($value)->age;
    }

    public function getGenderAttribute($value)
    {
        return Gender::getName($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function occupations()
    {
        return $this->hasMany(Occupation::class);
    }
}
