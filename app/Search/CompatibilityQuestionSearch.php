<?php 

namespace App\Search;

use App\Models\CompatibilityQuestion;
use Illuminate\Database\Eloquent\Builder;

class CompatibilityQuestionSearch 
{
    public static function apply($filters){

        $question = (new CompatibilityQuestion())->newQuery();

        if($filters->has('list') && !empty($filters->input('list'))){
            $list = $filters->input('list');

            if($list == 'answered'){
                $question->whereHas('users', function(Builder $query){
                        $query->where('user_id', auth()->user()->id);
                    });
            }

            if($list == 'unanswered'){
                $question->whereDoesntHave('users', function(Builder $query){
                        $query->where('user_id', auth()->user()->id);
                    });
            }
        }
        
        return $question;
    }
}