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
        Schema::create('jawaban_acak_kata', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hasil_kuis_id');
            $table->unsignedBigInteger('soal_acak_kata_id');
            $table->text('dijawab')->nullable();
            $table->boolean('benar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_acak_kata');
    }
};
