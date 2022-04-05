<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerChoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
    ];


    public function compatibilityQuestion()
    {
        return $this->belongsTo(CompatibilityQuestion::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_has_answer_choices', 'user_answer_id', 'user_id')
        ->withPivot('compatibility_question_id', 'compatibility_question_relevance', 'match_answer_id');
    }
}
