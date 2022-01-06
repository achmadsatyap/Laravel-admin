<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihans', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_katagori');
            $table->string('namapelatihan');
            $table->date('tglpelatihan');
            $table->string('lokasipelatihan');
            $table->timestamps();

            $table->foreign('id_katagori')->references('id')->on('katagoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelatihans');
    }
}
