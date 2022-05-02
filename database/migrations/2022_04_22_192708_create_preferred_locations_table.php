<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferredLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferred_locations', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('place_preference_id')->nullable()->unsigned();
            $table->foreign('place_preference_id')->references('id')->on('place_preferences')->onDelete('cascade');

            $table->integer('city_id')->nullable()->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->integer('locality_id')->nullable()->unsigned();
            $table->foreign('locality_id')->references('id')->on('localities')->onDelete('cascade');

            $table->timestamps();
            $table->unique(['place_preference_id', 'city_id', 'locality_id'], 'unique_preferred_location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferred_locations');
    }
}
