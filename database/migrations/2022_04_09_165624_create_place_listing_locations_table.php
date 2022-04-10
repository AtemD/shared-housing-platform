<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceListingLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // place_listing_id, city_id, locality_id, street, specific_information, address, longitude, latitude
        Schema::create('place_listing_locations', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('place_listing_id')->nullable()->unsigned();
            $table->foreign('place_listing_id')->references('id')->on('place_listings')->onDelete('cascade');

            $table->integer('city_id')->nullable()->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->integer('locality_id')->nullable()->unsigned();
            $table->foreign('locality_id')->references('id')->on('localities')->onDelete('cascade');

            $table->string('street');
            $table->string('specific_information');
            $table->string('address');
            $table->decimal('lat', 11, 8);
            $table->decimal('lng', 11, 8);

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
        Schema::dropIfExists('place_listing_locations');
    }
}
