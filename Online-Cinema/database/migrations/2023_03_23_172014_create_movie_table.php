<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('movie')){
            Schema::create('movie', function (Blueprint $table) {
                $table->id()->unique()->primary();
                $table->timestamps();
                $table->string("title");
                $table->integer("releaseYear");
                $table->integer("startDate");
                $table->integer("endDate");
                $table->string("director");
                $table->string("writer");
                $table->string("studio");
                $table->integer("price");
                $table->integer("rating");
                $table->integer("length");
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie');
    }
}
