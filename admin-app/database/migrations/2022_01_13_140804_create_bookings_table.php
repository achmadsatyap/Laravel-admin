<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peserta');
            $table->unsignedBigInteger('id_pelatihan');
            $table->date('tglbooking');
            $table->timestamps();

            $table->foreign('id_peserta')->references('id')->on('pesertas');
            $table->foreign('id_pelatihan')->references('id')->on('pelatihans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
