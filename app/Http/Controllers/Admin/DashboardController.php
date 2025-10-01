<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Materi;
use App\Models\HasilKuis;
use App\Models\PertanyaanSurvey;
use App\Models\JawabanSurveyPertama; 
use App\Models\JawabanSurveyKedua;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard admin dengan data statistik utama.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 1. STATISTIK UTAMA (BARIS 1)
        
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalMaterials = Materi::count();
        
        // Total kuis yang telah diselesaikan (berdasarkan entri di hasil_kuis)
        $pilihanGanda = 
        $totalQuizAttempts = HasilKuis::count(); 
        
        // Total siswa unik yang pernah ikut setidaknya 1 survey (Survey 1 atau Survey 2)
        // Variabel ini digunakan untuk mengisi card "Total Siswa Pengisi Survey"
        $allSurveyParticipants = DB::table('hasil_kuis')
            // Siswa yang memiliki jawaban di Survey Pertama
            ->whereIn('id', function ($query) {
                $query->select('hasil_kuis_id')->from('jawaban_survey_pertama');
            })
            // ATAU Siswa yang memiliki jawaban di Survey Kedua
            ->orWhereIn('id', function ($query) {
                $query->select('hasil_kuis_id')->from('jawaban_survey_kedua');
            })
            ->distinct('user_id')
            ->count('user_id');

        $totalSurveyAttempts = $allSurveyParticipants; // Ini adalah variabel yang digunakan di view
        
        
        // 2. RANGKUMAN HASIL KUIS (BARIS 2: Rata-rata Skor Mentah)
        
        // --- Rata-rata Skor Pilihan Ganda (Skor Mentah) ---
        // Mengambil rata-rata kolom 'skor_pilihan_ganda' di tabel 'hasil_kuis'
        $averageMcqScore = DB::table('hasil_kuis')->avg('skor_pilihan_ganda');
        // Hanya format ke satu desimal tanpa dikalikan 100 (bukan persen)
        $averageMcqScore = number_format($averageMcqScore ?? 0, 1);

        // --- Rata-rata Skor Acak Kata (Skor Mentah) ---
        // Mengambil rata-rata kolom 'skor_acak_kata' di tabel 'hasil_kuis'
        $averageWordQuizScore = DB::table('hasil_kuis')->avg('skor_acak_kata');
        // Hanya format ke satu desimal tanpa dikalikan 100 (bukan persen)
        $averageWordQuizScore = number_format($averageWordQuizScore ?? 0, 1);


        // 3. RANGKUMAN HASIL SURVEY (Persentase Penyelesaian tetap dihitung)
        
        $completedSurveysPercentage = 0;
        
        if ($totalSiswa > 0) {
            // Dapatkan ID user unik yang telah menjawab di Survey Pertama
            $usersCompleted1 = DB::table('jawaban_survey_pertama')
                ->join('hasil_kuis', 'jawaban_survey_pertama.hasil_kuis_id', '=', 'hasil_kuis.id')
                ->distinct('hasil_kuis.user_id')
                ->pluck('hasil_kuis.user_id');

            // Dapatkan ID user unik yang telah menjawab di Survey Kedua
            $usersCompleted2 = DB::table('jawaban_survey_kedua')
                ->join('hasil_kuis', 'jawaban_survey_kedua.hasil_kuis_id', '=', 'hasil_kuis.id')
                ->distinct('hasil_kuis.user_id')
                ->pluck('hasil_kuis.user_id');

            // Cari irisan (intersection): User yang ada di KEDUA daftar (telah menyelesaikan KEDUA survey)
            $usersCompletedBoth = collect($usersCompleted1)->intersect($usersCompleted2)->count();

            // Hitung persentase siswa yang menyelesaikan KEDUA survey
            // Variabel ini tetap ada meskipun tidak digunakan di card yang diminta
            $completedSurveysPercentage = number_format(($usersCompletedBoth / $totalSiswa) * 100, 1);
        }

        
        // Mengirim semua data ke view
        return view('admin.dashboard', compact(
            'totalSiswa',
            'totalMaterials',
            'totalQuizAttempts',
            'totalSurveyAttempts', // Total Siswa unik pengisi survey
            // Variabel untuk view
            'averageMcqScore', // Rata-rata skor mentah
            'averageWordQuizScore', // Rata-rata skor mentah
            'completedSurveysPercentage' // Persentase survey
        ));
    }
}
