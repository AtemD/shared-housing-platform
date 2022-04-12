<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceListingHasAmenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_listing_has_amenities', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('place_listing_id')->nullable()->unsigned();
            $table->foreign('place_listing_id')->references('id')->on('place_listings')->onDelete('cascade');
            
            $table->smallInteger('amenity_id')->nullable()->unsigned();
            $table->foreign('amenity_id')->references('id')->on('amenities')->onDelete('cascade');

            $table->timestamps();

            $table->unique(['place_listing_id', 'amenity_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_listing_has_amenities');
    }
}
