<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attraction_id');
            $table->string('str_address');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('name');
            $table->string('owner_firstname');
            $table->string('owner_lastname');
            $table->timestamps();

            $table->foreign('attraction_id')->references('id')->on('attractions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
