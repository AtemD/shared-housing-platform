<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlacePreferenceLocation extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    
    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }

    public function placePreference()
    {
        return $this->belongsTo(PlacePreference::class);
    }
}
