<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PertanyaanSurvey; // Menggunakan model PertanyaanSurvey

class SurveySeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     *
     * @return void
     */
    public function run()
    {
        // Tambahkan pertanyaan-pertanyaan untuk pretest (jenis_survey = 'pertama')
        $pretestQuestions = [
            'Seberapa setuju Anda bahwa pretest ini relevan dengan materi yang akan diajarkan?',
            'Seberapa yakin Anda dengan kemampuan Anda untuk menjawab pertanyaan-pertanyaan ini?',
            'Apakah Anda merasa durasi pengerjaan pretest ini cukup?',
            'Apakah petunjuk pretest ini mudah dipahami?',
            'Seberapa pentingkah pretest ini bagi Anda?',
        ];

        foreach ($pretestQuestions as $index => $question) {
            PertanyaanSurvey::create([
                'pertanyaan' => $question,
                'jenis_survey' => 'pertama', // Untuk pretest
                'urutan' => $index + 1,
            ]);
        }

        // Tambahkan pertanyaan-pertanyaan untuk posttest (jenis_survey = 'kedua')
        $posttestQuestions = [
            'Seberapa yakin Anda bahwa Anda telah memahami materi yang disampaikan?',
            'Apakah materi yang disampaikan mudah dipahami?',
            'Seberapa bermanfaatkah materi ini untuk pekerjaan atau studi Anda?',
            'Apakah Anda akan merekomendasikan materi ini kepada orang lain?',
            'Apakah Anda merasa durasi penyampaian materi ini cukup?',
        ];

        foreach ($posttestQuestions as $index => $question) {
            PertanyaanSurvey::create([
                'pertanyaan' => $question,
                'jenis_survey' => 'kedua', // Untuk posttest
                'urutan' => $index + 1,
            ]);
        }
    }
}
