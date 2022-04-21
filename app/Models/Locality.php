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

    public function placeListings()
    {
        return $this->hasMany(PlaceListing::class);
    }
}
