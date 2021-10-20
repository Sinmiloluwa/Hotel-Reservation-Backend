<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_type_id');
            $table->unsignedBigInteger('status_id');
            $table->bigInteger('room_number');
            $table->bigInteger('floor_number')->nullable();
            $table->timestamps();

            $table->foreign('room_type_id')->references('id')->on('room_type')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('room_status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
