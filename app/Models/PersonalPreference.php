<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalPreference extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'diet_habit',
        'smoking_habit',
        'alcohol_habit',
        'partying_habit',
        'guest_habit',
        'occupation_type',
        'marital_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
