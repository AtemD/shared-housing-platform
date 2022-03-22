<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceListingPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // min_rent, max_rent, availability_type
        Schema::create('place_listing_preferences', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->nullable()->unsigned()->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // note price or amount are stored in cents
            $table->integer('min_rent_amount');
            $table->integer('max_rent_amount');

            $table->smallInteger('rent_period'); // in days
            $table->date('availability_date');
            
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
        Schema::dropIfExists('place_listing_preferences');
    }
}
