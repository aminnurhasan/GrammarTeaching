<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoalPilihanGandaSeeder extends Seeder
{
    /**
     * Jalankan seed database.
     *
     * @return void
     */
    public function run()
    {
        // Masukkan data contoh ke dalam tabel 'soal_pilihan_ganda'
        DB::table('soal_pilihan_ganda')->insert([
            // Soal 1 (Past Tense)
            [
                'pertanyaan' => '<p><em>I ..... my friend last night</em></p><p>Manakah kata yang tepat untuk mengisi bagian kosong dari kalimat diatas</p>',
                'opsi_a' => 'Meet',
                'opsi_b' => 'Meeting',
                'opsi_c' => 'Met',
                'opsi_d' => 'Meeted',
                'jawaban_benar' => 'c',
                'penjelasan' => '<p>Konteks dari kalimat diatas adalah masa lampau / sudah berlalu (<em>Past Tense</em>). Jadi <em>verb</em> yang digunakan adalah <em>verb </em>2.</p><p><em>To meet</em> menjadi <em>met</em> pada <em>verb</em> 2.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Soal 2 (Present Tense)
            [
                'pertanyaan' => '<p><em>He ..... vegetables every day, that\'s why he ..... healthy.</em></p><p>Lengkapi kalimat diatas dengan menggunakan kata yang benar menurut <em>Grammar</em>.</p>',
                'opsi_a' => 'Eat, Is',
                'opsi_b' => 'Eats, Are',
                'opsi_c' => 'Eat, Are',
                'opsi_d' => 'Eats, Is',
                'jawaban_benar' => 'd',
                'penjelasan' => '<p>Konteks kalimat menggunakan <em>Present Tense </em>dan subjek merupakan <em>He</em>, jadi memberikan tambahan -<em>s</em><em> </em>pada akhir dari <em>verb</em>.</p><p><em>To be</em> yang digunakan adalah <em>is</em> karena menggunakan subjek <em>He</em>.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Soal 3 (Present Continuous - Future)
            [
                'pertanyaan' => '<p><em>They ..... to the beach tomorrow.</em></p><p>Kata mana yang paling tepat untuk melengkapi kalimat tersebut?</p>',
                'opsi_a' => 'go',
                'opsi_b' => 'went',
                'opsi_c' => 'are going',
                'opsi_d' => 'goes',
                'jawaban_benar' => 'c',
                'penjelasan' => '<p>Kalimat ini merujuk pada rencana di masa depan (tomorrow), sehingga menggunakan <em>Present Continuous Tense</em> untuk mengungkapkan rencana yang sudah pasti. Polanya adalah <em>Subject + to be (are) + verb-ing</em>.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Soal 4 (Present Simple - Third Person)
            [
                'pertanyaan' => '<p><em>She ..... a new dress for the party.</em></p><p>Pilih kata kerja yang benar untuk mengisi bagian kosong.</p>',
                'opsi_a' => 'buy',
                'opsi_b' => 'buys',
                'opsi_c' => 'buying',
                'opsi_d' => 'bought',
                'jawaban_benar' => 'b',
                'penjelasan' => '<p>Kalimat ini menggunakan <em>Present Simple Tense</em> dengan subjek tunggal orang ketiga (<em>She</em>). Oleh karena itu, kata kerja (<em>verb</em>) harus ditambahkan akhiran -s.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Soal 5 (Simple Past Tense)
            [
                'pertanyaan' => '<p><em>She ..... her keys yesterday.</em></p><p>Pilih kata yang tepat untuk melengkapi kalimat di atas.</p>',
                'opsi_a' => 'loses',
                'opsi_b' => 'lost',
                'opsi_c' => 'is losing',
                'opsi_d' => 'will lose',
                'jawaban_benar' => 'b',
                'penjelasan' => '<p>Kata <em>yesterday</em> menunjukkan bahwa kalimat ini menggunakan <em>Simple Past Tense</em>. Jadi, kita harus menggunakan <em>verb </em>2 dari kata kerja <em>lose</em>, yaitu <em>lost</em>.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Soal 6 (Future Simple Tense)
            [
                'pertanyaan' => '<p><em>I think it ..... rain later.</em></p><p>Manakah kata yang tepat untuk mengisi bagian kosong?</p>',
                'opsi_a' => 'is',
                'opsi_b' => 'will',
                'opsi_c' => 'is going to',
                'opsi_d' => 'was',
                'jawaban_benar' => 'b',
                'penjelasan' => '<p>Kata <em>will</em> digunakan untuk membuat prediksi tentang masa depan, terutama ketika prediksi tersebut tidak didasarkan pada bukti yang kuat. Pilihan <em>is going to</em> bisa digunakan jika ada bukti, namun dalam konteks "I think," <em>will</em> lebih umum.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Soal 7 (Modal Verbs)
            [
                'pertanyaan' => '<p><em>He ..... speak three languages fluently.</em></p><p>Pilih kata kerja bantu (<em>modal verb</em>) yang benar.</p>',
                'opsi_a' => 'cans',
                'opsi_b' => 'can',
                'opsi_c' => 'is can',
                'opsi_d' => 'coulds',
                'jawaban_benar' => 'b',
                'penjelasan' => '<p>Kata kerja bantu <em>can</em> tidak berubah bentuk, tidak peduli subjeknya tunggal atau jamak. Setelah <em>can</em>, kita menggunakan bentuk dasar dari kata kerja (<em>base form of the verb</em>), yaitu <em>speak</em>.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Soal 8 (Comparatives)
            [
                'pertanyaan' => '<p><em>This book is ..... than the last one.</em></p><p>Lengkapi kalimat dengan bentuk perbandingan (<em>comparative</em>) yang benar.</p>',
                'opsi_a' => 'more interesting',
                'opsi_b' => 'most interesting',
                'opsi_c' => 'interestinger',
                'opsi_d' => 'interesting',
                'jawaban_benar' => 'a',
                'penjelasan' => '<p>Untuk kata sifat yang panjang seperti <em>interesting</em> (lebih dari dua suku kata), bentuk perbandingannya adalah dengan menambahkan kata <em>more</em> di depannya.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Soal 9 (Conjunctions)
            [
                'pertanyaan' => '<p><em>I wanted to go, ..... I was too busy.</em></p><p>Kata penghubung (<em>conjunction</em>) mana yang paling tepat?</p>',
                'opsi_a' => 'and',
                'opsi_b' => 'so',
                'opsi_c' => 'but',
                'opsi_d' => 'for',
                'jawaban_benar' => 'c',
                'penjelasan' => '<p>Kata <em>but</em> digunakan untuk menghubungkan dua klausa yang memiliki makna berlawanan atau kontras. Dalam kalimat ini, keinginan untuk pergi berlawanan dengan fakta bahwa ia terlalu sibuk.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Soal 10 (Prepositions)
            [
                'pertanyaan' => '<p><em>The cat is sitting ..... the mat.</em></p><p>Pilih kata depan (<em>preposition</em>) yang benar.</p>',
                'opsi_a' => 'in',
                'opsi_b' => 'at',
                'opsi_c' => 'on',
                'opsi_d' => 'for',
                'jawaban_benar' => 'c',
                'penjelasan' => '<p>Preposisi <em>on</em> digunakan untuk menunjukkan posisi di atas permukaan sesuatu, seperti kucing yang duduk di atas keset.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
