<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTheaterShowTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theater_show_time', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theater_id');
            $table->unsignedBigInteger('show_time_id');
            $table->unsignedBigInteger('movie_id');
            $table->timestamps();


            $table->foreign('theater_id')->references('id')->on('theaters')->onDelete('cascade');
            $table->foreign('show_time_id')->references('id')->on('show_times')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theater_show_time');
    }
}
