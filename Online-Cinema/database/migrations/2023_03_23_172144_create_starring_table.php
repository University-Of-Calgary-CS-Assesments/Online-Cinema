<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starring', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("movie_id");
            $table->timestamps();

            $table->foreign("movie_id")->references("id")->on("movies")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('starring');
    }
}
