<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('interests')->truncate();

        // Interest::factory()->times(10)->create();

        Interest::factory()->create([
            'name' => 'Playing Football'
        ]);

        Interest::factory()->create([
            'name' => 'Swimming'
        ]);

        Interest::factory()->create([
            'name' => 'Reading books'
        ]);

        Interest::factory()->create([
            'name' => 'Playing Basketball'
        ]);

        Interest::factory()->create([
            'name' => 'going to the gym'
        ]);

        Interest::factory()->create([
            'name' => 'programming'
        ]);

        Interest::factory()->create([
            'name' => 'watching movies'
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
