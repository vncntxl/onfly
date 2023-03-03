<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->text('description');
            $table->float('average_rating')->nullable();
            $table->string('place_picture')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->float('latitude');
            $table->float('longitude');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('places');
    }
}
