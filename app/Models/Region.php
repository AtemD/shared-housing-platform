<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'country',
        'acronym',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function localities()
    {
        return $this->hasManyThrough(Locality::class, City::class);
    }
}
