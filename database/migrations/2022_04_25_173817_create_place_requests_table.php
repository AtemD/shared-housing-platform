<?php

use App\References\RequestStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_requests', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('sender_id')->nullable()->unsigned();
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('receiver_id')->nullable()->unsigned();
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('place_id')->nullable()->unsigned();
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            
            $table->tinyInteger('status')->default(RequestStatus::PENDING); // accept, reject, pending

            $table->timestamps();
            $table->unique(['sender_id', 'receiver_id', 'place_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_requests');
    }
}
