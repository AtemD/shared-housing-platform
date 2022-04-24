<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacePreferenceHasPreferredLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_preference_has_preferred_locations', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('place_preference_id')->nullable()->unsigned();
            $table->foreign('place_preference_id', 'place_pref_id')->references('id')->on('place_preferences')->onDelete('cascade');

            $table->integer('city_id')->nullable()->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->integer('locality_id')->nullable()->unsigned();
            $table->foreign('locality_id')->references('id')->on('localities')->onDelete('cascade');

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
        Schema::dropIfExists('place_preference_has_preferred_locations');
    }
}
