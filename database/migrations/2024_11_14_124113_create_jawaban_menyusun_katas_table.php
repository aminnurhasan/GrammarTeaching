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
        Schema::create('jawaban_menyusun_kata', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_menyusun_kata');
            $table->unsignedBigInteger('id_data_diri');
            $table->text('jawaban');
            $table->boolean('benar');
            $table->timestamps();

            $table->foreign('id_menyusun_kata')->references('id')->on('menyusun_kata')->onDelete('cascade');
            $table->foreign('id_data_diri')->references('id')->on('data_diri')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_menyusun_kata');
    }
};
