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
        Schema::create('survey', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_data_diri');
            $table->unsignedBigInteger('id_pertanyaan_survey');
            $table->integer('nilai');
            $table->timestamps();

            $table->foreign('id_data_diri')->references('id')->on('data_diri')->onDelete('cascade');
            $table->foreign('id_pertanyaan_survey')->references('id')->on('pertanyaan_survey')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey');
    }
};
