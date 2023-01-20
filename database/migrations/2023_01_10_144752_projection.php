<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projections', function (Blueprint $table){
            $table->id();
            $table->foreignId('movie_id')->references('id')->on('movies');
            $table->foreignId('room_id')->references('id')->on('rooms');
            //$table->foreignId('ticket_id')->references('id')->on('ticket');
            $table->string('time');
            $table->string('date');
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
     //   Schema::dropIfExists('projection');
    }
};
