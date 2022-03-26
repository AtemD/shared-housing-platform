<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_preferences', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('user_id')->nullable()->unsigned()->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->tinyInteger('diet_habit');
            $table->tinyInteger('smoking_habit');
            $table->tinyInteger('alcohol_habit');
            $table->tinyInteger('partying_habit');
            $table->tinyInteger('guest_habit');
            $table->tinyInteger('occupation_type');
            $table->tinyInteger('marital_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_preferences');
    }
}
