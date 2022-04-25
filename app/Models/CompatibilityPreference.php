<?php

namespace App\Models;

use App\References\AlcoholHabit;
use App\References\DietHabit;
use App\References\Gender;
use App\References\GuestHabit;
use App\References\MaritalStatus;
use App\References\OccupationType;
use App\References\PartyingHabit;
use App\References\SmokingHabit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompatibilityPreference extends Model
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

    public function getPreferredGenderAttribute($value)
    {
        return Gender::getName($value);
    }

    public function getDietHabitAttribute($value)
    {
        return DietHabit::getName($value);
    }

    public function getSmokingHabitAttribute($value)
    {
        return SmokingHabit::getName($value);
    }

    public function getAlcoholHabitAttribute($value)
    {
        return AlcoholHabit::getName($value);
    }

    public function getPartyingHabitAttribute($value)
    {
        return PartyingHabit::getName($value);
    }

    public function getGuestHabitAttribute($value)
    {
        return GuestHabit::getName($value);
    }

    public function getOccupationTypeAttribute($value)
    {
        return OccupationType::getName($value);
    }

    public function getMaritalStatusAttribute($value)
    {
        return MaritalStatus::getName($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
