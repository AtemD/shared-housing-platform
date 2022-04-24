<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->text('description');
            $table->integer('rent_amount');
            $table->smallInteger('rent_period'); // daily, weekly, monthly, yearly
            $table->string('rent_currency');
            $table->smallInteger('min_stay_period');

            $table->bigInteger('featured_image_id')->nullable()->unsigned();
            $table->foreign('featured_image_id')->references('id')->on('images')->onDelete('cascade');
            
            $table->tinyInteger('place_type'); // private room, shared room, entire place
            $table->boolean('bills_included');
            $table->date('availability_date'); // the move in date
            $table->tinyInteger('furnishing_type'); // fully furnished, partially furnished, not furnished
            $table->tinyInteger('profile_status');
            // $table->tinyInteger('size');
            // $table->tinyInteger('size_type');
            // $table->tinyInteger('no_of_roommates');
            $table->string('slug'); // place_type + furnishing_type + listed by + user_full_name
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
        Schema::dropIfExists('places');
    }
}
