<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoalAcakKataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Masukkan data contoh ke dalam tabel 'soal_acak_kata'
        DB::table('soal_acak_kata')->insert([
            [
                'kalimat_benar' => 'I went to school yesterday morning',
                'penjelasan' => '<p>Kalimat ini menggunakan <em>Simple Past Tense</em>, yang merujuk pada kejadian di masa lalu. Susunan kata yang benar adalah <em>Subject</em> + <em>Verb 2</em> + <em>Object</em> + <em>Adverb of time</em>.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kalimat_benar' => 'She is cooking a delicious dinner now',
                'penjelasan' => '<p>Kalimat ini menggunakan <em>Present Continuous Tense</em>, yang menjelaskan aktivitas yang sedang berlangsung. Susunan yang benar adalah <em>Subject</em> + <em>to be</em> (is) + <em>verb-ing</em> + <em>Object</em> + <em>Adverb of time</em>.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kalimat_benar' => 'They will visit their grandparents next week',
                'penjelasan' => '<p>Kalimat ini menggunakan <em>Simple Future Tense</em>, untuk rencana yang akan datang. Susunan yang benar adalah <em>Subject</em> + <em>will</em> + <em>verb 1</em> + <em>Object</em> + <em>Adverb of time</em>.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kalimat_benar' => 'He reads a book every night before bed',
                'penjelasan' => '<p>Kalimat ini menggunakan <em>Simple Present Tense</em>, untuk kebiasaan sehari-hari. Karena subjeknya adalah <em>He</em>, kata kerja <em>read</em> ditambahkan akhiran -s.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kalimat_benar' => 'My cat is sleeping under the table',
                'penjelasan' => '<p>Kalimat ini menggunakan <em>Present Continuous Tense</em>. Susunan yang benar adalah <em>Subject</em> + <em>to be</em> (is) + <em>verb-ing</em> + <em>Prepositional phrase</em>.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kalimat_benar' => 'We are watching a movie in the cinema',
                'penjelasan' => '<p>Kalimat ini menggunakan <em>Present Continuous Tense</em>. Susunan yang benar adalah <em>Subject</em> + <em>to be</em> (are) + <em>verb-ing</em> + <em>Object</em> + <em>Adverb of place</em>.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kalimat_benar' => 'She has finished her homework',
                'penjelasan' => '<p>Kalimat ini menggunakan <em>Present Perfect Tense</em>, untuk tindakan yang baru saja selesai. Susunan yang benar adalah <em>Subject</em> + <em>has</em> + <em>verb 3</em> + <em>Object</em>.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kalimat_benar' => 'I am listening to music on my headphones',
                'penjelasan' => '<p>Kalimat ini menggunakan <em>Present Continuous Tense</em>. Susunan yang benar adalah <em>Subject</em> + <em>to be</em> (am) + <em>verb-ing</em> + <em>Object</em> + <em>Adverb of place</em>.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kalimat_benar' => 'The sun rises in the east every morning',
                'penjelasan' => '<p>Kalimat ini menggunakan <em>Simple Present Tense</em>, untuk fakta umum. Kata kerja <em>rise</em> ditambahkan akhiran -s karena subjeknya <em>the sun</em> (tunggal orang ketiga).</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kalimat_benar' => 'They play football at the park every Sunday',
                'penjelasan' => '<p>Kalimat ini menggunakan <em>Simple Present Tense</em>, untuk kebiasaan yang rutin. Susunan yang benar adalah <em>Subject</em> + <em>verb 1</em> + <em>Object</em> + <em>Adverb of place</em> + <em>Adverb of time</em>.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
