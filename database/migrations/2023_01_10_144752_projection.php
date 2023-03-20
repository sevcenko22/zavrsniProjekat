<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('projections', function (Blueprint $table){
            $table->id();
            $table->foreignId('movie_id')->references('id')->on('movies');
            $table->foreignId('room_id')->references('id')->on('rooms');
            $table->time('time');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projection');
    }
};
