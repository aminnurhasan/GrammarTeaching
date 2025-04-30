<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hasil_kuis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_siswa_id');
            $table->unsignedInteger('skor_pilihan_ganda')->nullable();
            $table->unsignedInteger('skor_acak_kata')->nullable();
            $table->timestamps();

            $table->foreign('data_siswa_id')->references('id')->on('data_siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_kuis');
    }
};
