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
        Schema::create('jawaban_pilihan_ganda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hasil_kuis_id');
            $table->unsignedBigInteger('soal_pilihan_ganda_id');
            $table->enum('dijawab', ['a', 'b', 'c', 'd'])->nullable();
            $table->boolean('benar');
            $table->timestamps();

            $table->foreign('hasil_kuis_id')->references('id')->on('hasil_kuis')->onDelete('cascade');
            $table->foreign('soal_pilihan_ganda_id')->references('id')->on('soal_pilihan_ganda')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_pilihan_ganda');
    }
};
