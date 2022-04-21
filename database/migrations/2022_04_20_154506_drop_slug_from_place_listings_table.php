<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropSlugFromPlaceListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('place_listings', function (Blueprint $table) {
            // if the id column exists on place listings table
			if(Schema::hasColumn('place_listings', 'slug')){
                Schema::table('place_listings', function(Blueprint $table) {
                    $table->dropColumn('slug');
                });
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('place_listings', function (Blueprint $table) {
            //
        });
    }
}
