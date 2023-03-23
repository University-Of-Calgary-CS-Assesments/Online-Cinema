<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer("ticketId")->unique();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("movie_id");
            $table->unsignedBigInteger("theater_id");
            $table->unsignedBigInteger("show_time_id");
            $table->unsignedBigInteger("seat_id");
            $table->integer("purchaseTime");
            $table->integer("price");
            $table->string("assignedEmail");
            $table->timestamps();

            $table->foreign('seat_id')->references('id')->on('seats')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('show_time_id')->references('id')->on('show_times');
            $table->foreign('theater_id')->references('id')->on('theaters')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
