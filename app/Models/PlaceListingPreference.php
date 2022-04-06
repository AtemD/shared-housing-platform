<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceListingPreference extends Model
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
