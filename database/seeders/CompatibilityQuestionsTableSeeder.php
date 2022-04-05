<?php

namespace Database\Seeders;

use App\Models\CompatibilityQuestion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompatibilityQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('compatibility_questions')->truncate();

        CompatibilityQuestion::factory()->times(50)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
