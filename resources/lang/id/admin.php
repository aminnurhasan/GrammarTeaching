<?php

return [

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD & STATISTIK
    |--------------------------------------------------------------------------
    */
    'dashboard_title' => 'Dashboard Admin',
    'dashboard_header' => 'Dashboard',
    'welcome_message' => 'Selamat datang kembali, :name! Berikut adalah ringkasan data terbaru.',

    // Kartu Statistik Utama
    'total_students' => 'Total Siswa',
    'total_materials' => 'Total Materi',
    'total_quizzes' => 'Total Percobaan Kuis',
    'total_surveys' => 'Total Percobaan Survey',
    'recent_activities' => 'Aktivitas Terbaru',
    'user_logged_in' => ':name masuk :time yang lalu.',

    // Ringkasan Hasil
    'summary_heading' => 'Ringkasan Hasil Aplikasi',
    'quiz_summary_heading' => 'Ringkasan Hasil Kuis',
    'average_mcq_score' => 'Rata-rata Skor Pilihan Ganda',
    'average_word_quiz_score' => 'Rata-rata Skor Acak Kata',
    'quiz_mcq_description' => 'Rata-rata skor dari semua kuis Pilihan Ganda.',
    'quiz_word_description' => 'Rata-rata skor dari semua kuis Acak Kata.',

    // Ringkasan Survey
    'survey_summary_heading' => 'Ringkasan Partisipasi Survey',
    'surveys_completed_percent' => 'Total Siswa Pengisi Survey',
    'survey_completed_description' => 'Jumlah siswa unik yang telah berpartisipasi dalam salah satu atau kedua survey.',


    /*
    |--------------------------------------------------------------------------
    | NAVIGASI & AUTENTIKASI
    |--------------------------------------------------------------------------
    */
    'navbar_materi' => 'Materi',
    'navbar_kuis' => 'Kuis',
    'navbar_survey' => 'Survey',
    'navbar_gantiPassword' => 'Ganti Password',
    'logout' => 'Logout',
    
    // Ganti Password
    'password_change' => 'Ganti Password',
    'current_password' => 'Password Saat Ini',
    'new_password' => 'Password Baru',
    'confirm_new_password' => 'Konfirmasi Password Baru',
    'update_password' => 'Simpan Password',


    /*
    |--------------------------------------------------------------------------
    | UMUM & AKSI (TOMBOL, LABEL, FORM)
    |--------------------------------------------------------------------------
    */
    'judul' => 'Judul',
    'kategori' => 'Kategori',
    'urutan' => 'Urutan',
    'konten' => 'Konten',
    'slug' => 'Slug',
    'pertanyaan' => 'Pertanyaan',
    'aksi' => 'Aksi',
    'simpan' => 'Simpan',
    'batal' => 'Batal',
    'tambah' => 'Tambah',
    'ubah' => 'Ubah',
    'edit' => 'Edit', // Digunakan jika ingin membedakan dengan 'ubah' (judul halaman)
    'lihat' => 'Lihat',
    'hapus' => 'Hapus',
    'perbarui' => 'Perbarui',
    'kembali' => 'Kembali',
    'view_details' => 'Lihat Detail',
    'pilih_kategori' => 'Pilih Kategori',
    'nama_siswa' => 'Nama Siswa', // Untuk hasil kuis/survey
    'pengguna_dihapus' => 'Pengguna Dihapus', // Untuk hasil kuis/survey


    /*
    |--------------------------------------------------------------------------
    | MATERI & KATEGORI
    |--------------------------------------------------------------------------
    */
    'materi_title' => 'Materi',
    'materi_header' => 'Kelola Materi',
    'materi_plural' => 'Materi', // Untuk penggunaan yang fleksibel
    'add_materi' => 'Tambah Materi',
    'ubah_materi' => 'Ubah Materi',
    'detail_materi' => 'Detail Materi',
    'daftar_materi' => 'Daftar Materi',
    'materi_berdasarkan_kategori' => 'Materi Berdasarkan Kategori',

    // Kategori
    'kelola_kategori' => 'Kelola Kategori',
    'total_kategori' => 'Total Kategori',
    'add_kategori' => 'Tambah Kategori',
    'edit_kategori' => 'Edit Kategori',
    'nama_kategori' => 'Nama Kategori',
    'tambah_kategori_baru' => 'Buat Kategori',


    /*
    |--------------------------------------------------------------------------
    | KUIS & MANAJEMEN SOAL
    |--------------------------------------------------------------------------
    */
    'manajemen_kuis' => 'Manajemen Kuis',
    'total_kuis' => 'Total Kuis',
    'daftar_kuis' => 'Daftar Kuis',
    'total_pilihan_ganda' => 'Total Pilihan Ganda',
    'total_susun_kata' => 'Total Susun Kata',

    // Pilihan Ganda
    'kuis_pilihan_ganda' => 'Kuis Pilihan Ganda',
    'daftar_kuis_pilihan_ganda' => 'Daftar Kuis Pilihan Ganda',
    'tambah_kuis_pilihan_ganda' => 'Tambah Kuis Pilihan Ganda',
    'detail_kuis_pilihan_ganda' => 'Detail Kuis Pilihan Ganda',
    'ubah_kuis_pilihan_ganda' => 'Ubah Kuis Pilihan Ganda',
    'opsi_a' => 'Opsi A',
    'opsi_b' => 'Opsi B',
    'opsi_c' => 'Opsi C',
    'opsi_d' => 'Opsi D',
    'jawaban_benar' => 'Jawaban Benar',
    'pilih_jawaban_benar' => 'Pilih Jawaban Benar',
    'penjelasan' => 'Penjelasan',

    // Susun Kata (Acak Kata)
    'kuis_susun_kata' => 'Kuis Susun Kata',
    'daftar_kuis_susun_kata' => 'Daftar Kuis Susun Kata',
    'tambah_kuis_susun_kata' => 'Tambah Kuis Susun Kata',
    'detail_kuis_susun_kata' => 'Detail Kuis Susun Kata',
    'ubah_kuis_susun_kata' => 'Ubah Kuis Susun Kata',
    'informasi_soal' => 'Informasi Soal',
    'kata_atau_kalimat_benar' => 'Kata atau Kalimat Benar',
    'kata_atau_kalimat_acak' => 'Kata atau Kalimat Acak',
    'kata_benar' => 'Kata Benar',
    'penjelasan_jawaban' => 'Penjelasan Jawaban',


    /*
    |--------------------------------------------------------------------------
    | HASIL KUIS
    |--------------------------------------------------------------------------
    */
    'hasil_pengerjaan_kuis' => 'Hasil Pengerjaan Kuis',
    'daftar_semua_hasil_kuis' => 'Daftar Semua Hasil Kuis',
    'nilai_pilihan_ganda' => 'Nilai Pilihan Ganda',
    'nilai_acak_kata' => 'Nilai Acak Kata',
    'waktu_selesai' => 'Waktu Selesai',
    'kembali_ke_dashboard' => 'Kembali ke Dashboard',
    
    // Detail Hasil Kuis
    'detail_hasil_kuis' => 'Detail Hasil Kuis',
    'kembali_ke_daftar_hasil' => 'Kembali ke Daftar Hasil',
    'hasil_kuis_siswa' => 'Hasil Kuis Siswa: :name',
    'waktu_selesai_label' => 'Waktu Selesai: :time',
    'ringkasan_skor' => 'Ringkasan Skor',
    'skor_pilihan_ganda_label' => 'Skor Pilihan Ganda:',
    'skor_acak_kata_label' => 'Skor Acak Kata:',
    'detail_jawaban_pilihan_ganda' => 'Detail Jawaban Pilihan Ganda',
    'soal_ke' => 'Soal :number',
    'jawaban_siswa_label' => 'Jawaban Siswa:',
    'jawaban_benar_label' => 'Jawaban Benar:',
    'detail_jawaban_acak_kata' => 'Detail Jawaban Acak Kata',
    'soal_acak_kata_label' => 'Soal :number: Susunlah kata-kata berikut: ":scrambled_words"',


    /*
    |--------------------------------------------------------------------------
    | SURVEY & HASIL SURVEY
    |--------------------------------------------------------------------------
    */
    'survey' => 'Survey',
    'manajemen_survey' => 'Manajemen Survey',
    'total_survey' => 'Total Survey',
    'total_pretest' => 'Total Pre Test',
    'total_posttest' => 'Total Post Test',
    'daftar_survey' => 'Daftar Survey',
    'survey_pretest' => 'Survey Pre Test',
    'survey_posttest' => 'Survey Post Test',

    // Manajemen Survey
    'tambah_survey_pretest' => 'Tambah Survey Pre Test',
    'tambah_survey_posttest' => 'Tambah Survey Post Test',
    'detail_survey_pretest' => 'Detail Survey Pre Test',
    'detail_survey_posttest' => 'Detail Survey Post Test',
    'jenis_survey' => 'Jenis Survey',
    'ubah_survey' => 'Edit Survey',

    // Hasil Survey
    'hasil_pengerjaan_survey' => 'Hasil Pengerjaan Survey',
    'daftar_hasil_survey_peserta' => 'Daftar Hasil Survey Peserta',
    'status_pretest' => 'Status Pretest',
    'status_posttest' => 'Status Posttest',
    'selesai' => 'Selesai',
    'belum' => 'Belum',
    'detail_pretest' => 'Detail Pretest', // Hanya untuk status
    
    // Detail Hasil Survey
    'detail_hasil_survey' => 'Detail Hasil Survey',
    'kembali_ke_daftar_hasil_survey' => 'Kembali ke Daftar Hasil Survey',
    'hasil_survey_siswa' => 'Hasil Survey Siswa: :name',
    'waktu_selesai_survey_label' => 'Waktu Selesai: :time',
    'ringkasan_data_survey' => 'Ringkasan Data Survey',
    'total_pertanyaan_survey_pertama' => 'Total Pertanyaan Survey Pertama:',
    'total_pertanyaan_survey_kedua' => 'Total Pertanyaan Survey Kedua:',
    'detail_jawaban_survey_pertama' => '1. Detail Jawaban Survey Pertama (Pretest)',
    'detail_jawaban_survey_kedua' => '2. Detail Jawaban Survey Kedua (Posttest)',
    'pertanyaan_ke' => 'Pertanyaan :number:',
    'jawaban_siswa_survey_label' => 'Jawaban Siswa:',
    'skor_label' => 'Skor:',


    /*
    |--------------------------------------------------------------------------
    | PESAN & NOTIFIKASI
    |--------------------------------------------------------------------------
    */
    'password_changed_success' => 'Password berhasil diubah!',
    
    // Materi & Kategori Messages
    'konfirmasi_hapus_materi' => 'Apakah Anda yakin ingin menghapus materi ini?',
    'tidak_ada_materi' => 'Tidak ada materi ditemukan.',
    'belum_ada_materi' => 'Belum ada materi.',
    'materi_created' => 'Materi berhasil ditambahkan!',
    'kategori_created' => 'Kategori berhasil ditambahkan.',
    'kategori_updated' => 'Kategori berhasil diperbarui.',
    'kategori_deleted' => 'Kategori berhasil dihapus.',
    'confirm_delete' => 'Apakah Anda yakin ingin menghapus kategori ini?',
    'no_data' => 'Tidak ada data.',
    'pertanyaan_tidak_ditemukan' => 'Pertanyaan tidak ditemukan/terhapus',

    // Kuis Messages
    'konfirmasi_hapus_survey' => 'Apakah Anda yakin ingin menghapus survey ini?',
    'tidak_ada_survey' => 'Tidak ada survey yang tersedia.',
    'konfirmasi_hapus_kuis' => 'Apakah Anda yakin ingin menghapus kuis ini?',
    'tidak_ada_kuis_pilihan_ganda' => 'Tidak ada kuis pilihan ganda yang tersedia.',
    'tidak_ada_kuis_susun_kata' => 'Tidak ada kuis susun kata yang tersedia.',
    'tidak_ada_penjelasan' => 'Tidak ada penjelasan.',
    
    // Hasil Kuis/Survey Messages
    'belum_ada_hasil_kuis' => 'Belum ada hasil kuis yang tercatat.',
    'tidak_ada_jawaban_pilihan_ganda' => 'Tidak ada jawaban pilihan ganda yang ditemukan.',
    'tidak_ada_jawaban_acak_kata' => 'Tidak ada jawaban susun kata yang ditemukan.',
    'kalimat_benar_tidak_ditemukan' => 'Kalimat Benar Tidak Ditemukan',
    'belum_ada_hasil_survey_yang_selesai' => 'Belum ada hasil survey yang selesai.',
    'tidak_ada_jawaban_survey_pertama' => 'Tidak ada jawaban Survey Pertama yang ditemukan.',
    'tidak_ada_jawaban_survey_kedua' => 'Tidak ada jawaban Survey Kedua yang ditemukan.',
];
