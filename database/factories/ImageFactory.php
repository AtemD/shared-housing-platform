<?php

namespace Database\Factories;

use App\Models\Place;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imageable = $this->faker->randomElement([
            Place::class,
            User::class,
        ]);

        if($imageable == 'App\Models\User'){
            $item = User::factory()->create();
        }

        if($imageable == 'App\Models\Place'){
            $item = Place::factory()->create();
        }
    
        return [
            
            'imageable_id' => $item->id,
            'imageable_type' => array_search(
                    $imageable, 
                    Relation::morphMap([
                        'place' => 'App\Models\Place',
                        'user' => 'App\Models\User',
                    ])
            ),
            'name' => time(). '_' . mt_rand(1, 100) . '.' . $this->faker->randomElement([
                'jpg',
                'jpeg',
                'png'
            ]),
        ];
    }
}
