<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpokenLanguage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'basic_profile_id',
        'name',
    ];

    public function basicProfile()
    {
        return $this->belongsTo(BasicProfile::class);
    }
}
