<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('seats')){
            Schema::create('seats', function (Blueprint $table) {
                $table->id();
                $table->string("seatId");
                $table->boolean("available")->nullable();
                $table->boolean("accessible")->nullable();
                $table->unsignedBigInteger("theater_id");
                $table->timestamps();

                $table->foreign("theater_id")->references("id")->on("theaters")->onDelete("cascade");
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
        Schema::dropIfExists('seats');
    }
}
