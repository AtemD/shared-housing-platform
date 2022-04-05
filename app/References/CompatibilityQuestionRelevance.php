<?php 

namespace App\References;

class CompatibilityQuestionRelevance
{
    const IRRELEVANT = 1;
    const RELEVANT = 2;
    const MANDATORY = 3;

    // weight for each relevance
    const WEIGHT_IRRELEVANT = 0;
    const WEIGHT_RELEVANT = 50;
    const WEIGHT_MANDATORY = 150;

    /**
     * return list of gender and their labels
     * 
     * @return array
     */
     public static function compatibilityQuestionRelevanceList()
     {
        return [
            self::IRRELEVANT => [
                'id' => self::IRRELEVANT,
                'name' => 'irrelevant',
                'weight' => self::WEIGHT_IRRELEVANT
            ],
            self::RELEVANT => [
                'id' => self::RELEVANT,
                'name' => 'important',
                'weight' => self::WEIGHT_RELEVANT
            ],
            self::MANDATORY => [
                'id' => self::MANDATORY,
                'name' => 'mandatory',
                'weight' => self::WEIGHT_MANDATORY
            ]
        ];
     }

     public static function getRelevanceWeight($relevance)
     {
         if($relevance === self::IRRELEVANT){
             return self::WEIGHT_IRRELEVANT;
         }

         if($relevance === self::RELEVANT){
            return self::WEIGHT_RELEVANT;
        }

        if($relevance === self::MANDATORY){
            return self::WEIGHT_MANDATORY;
        }
         
        return self::WEIGHT_IRRELEVANT;
     }

}