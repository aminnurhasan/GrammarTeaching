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
        Schema::create('jawaban_survey_pertama', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hasil_kuis_id');
            $table->unsignedBigInteger('pertanyaan_survey_id');
            $table->unsignedInteger('jawaban')->nullable();
            $table->timestamps();

            $table->foreign('hasil_kuis_id')->references('id')->on('hasil_kuis')->onDelete('cascade');
            $table->foreign('pertanyaan_survey_id')->references('id')->on('pertanyaan_survey')->onDelete('cascade');

            $table->unique(['hasil_kuis_id', 'pertanyaan_survey_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_survey_pertama');
    }
};
