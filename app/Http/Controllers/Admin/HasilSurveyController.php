<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HasilKuis;
use App\Models\JawabanSurveyPertama;
use App\Models\JawabanSurveyKedua;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HasilSurveyController extends Controller
{
    /**
     * Menampilkan daftar semua hasil survey (Pretest/Posttest)
     */
    public function index()
    {
        // --- LOGIKA BARU UNTUK MENGHINDARI EROR 'Unknown column user_id' ---

        // 1. Ambil unique 'hasil_kuis_id' dari tabel Jawaban Survey Pertama (Pretest)
        // Ini adalah ID dari tabel HasilKuis yang telah menyelesaikan Survey Pertama.
        $hkIdsWithSurvey1 = JawabanSurveyPertama::select('hasil_kuis_id')
            ->distinct()
            ->pluck('hasil_kuis_id');

        // 2. Ambil unique 'hasil_kuis_id' dari tabel Jawaban Survey Kedua (Posttest)
        // Ini adalah ID dari tabel HasilKuis yang telah menyelesaikan Survey Kedua.
        $hkIdsWithSurvey2 = JawabanSurveyKedua::select('hasil_kuis_id')
            ->distinct()
            ->pluck('hasil_kuis_id');
        
        // 3. Konversi HasilKuis ID menjadi User ID untuk kebutuhan status di view
        // Kita mengambil user_id dari tabel HasilKuis, difilter berdasarkan ID HasilKuis yang relevan.
        $userIdsWithSurvey1 = HasilKuis::whereIn('id', $hkIdsWithSurvey1)->pluck('user_id');
        $userIdsWithSurvey2 = HasilKuis::whereIn('id', $hkIdsWithSurvey2)->pluck('user_id');

        // 4. Gabungkan semua HasilKuis ID yang relevan (S1 atau S2) untuk mendapatkan daftar peserta utama
        $allRelevantHasilKuisIds = $hkIdsWithSurvey1->merge($hkIdsWithSurvey2)->unique()->toArray();

        // 5. Ambil data HasilKuis (yang berisi user_id) untuk pengguna yang telah mengisi Survey
        // Menggunakan with(['user']) untuk memuat data pengguna.
        $participants = HasilKuis::whereHas('user')
            ->with(['user'])
            // Filter daftar peserta utama berdasarkan ID HasilKuis yang relevan
            ->whereIn('id', $allRelevantHasilKuisIds)
            ->get();

        // 6. Kirim data ke view
        return view('admin.hasilSurvey.index', [
            'participants' => $participants,
            // Mengirim daftar User ID untuk pengecekan status di view (badge Selesai/Belum)
            'usersWithSurvey1' => $userIdsWithSurvey1,
            'usersWithSurvey2' => $userIdsWithSurvey2,
        ]);
    }
    
    /**
     * Menampilkan detail hasil survey (Pretest atau Posttest) untuk user tertentu.
     */
    public function showSurveyResult($userId, $type)
    {
        // Muat 'hasilKuis' berdasarkan user_id.
        // Eager load relasi dengan nama yang sudah diperbaiki.
        $hasilKuis = HasilKuis::where('user_id', $userId)
            ->with([
                'user', 
                // Menggunakan nama relasi: jawabanSurveyPertama
                'jawabanSurveyPertama.pertanyaanSurvey', 
                // Menggunakan nama relasi: jawabanSurveyKedua
                'jawabanSurveyKedua.pertanyaanSurvey'
            ]) 
            ->first();

        if (!$hasilKuis) {
            return redirect()->back()->with('error', 'Hasil kuis (induk survey) untuk user ini tidak ditemukan.');
        }

        // Tentukan data jawaban mana yang akan ditampilkan (Pretest/Survey Pertama atau Posttest/Survey Kedua)
        // Akses data menggunakan nama relasi yang benar
        $jawabanDetail = ($type === 'pre') 
            ? $hasilKuis->jawabanSurveyPertama 
            : $hasilKuis->jawabanSurveyKedua;

        // Menghitung total skor (asumsi kolom 'jawaban' berisi nilai numerik skor)
        // Jika kolom 'jawaban' berisi teks, Anda mungkin perlu mengubah ini ke kolom skor yang sebenarnya jika ada.
        $totalSkor = $jawabanDetail->sum('jawaban'); 

        if ($jawabanDetail->isEmpty()) {
            $typeName = ($type === 'pre') ? 'Survey Pertama (Pretest)' : 'Survey Kedua (Posttest)';
            return redirect()->back()->with('error', 'Tidak ada data jawaban untuk ' . $typeName . ' user ini.');
        }

        return view('admin.hasilSurvey.show', [
            'jawabanDetail' => $jawabanDetail, 
            'hasilKuis'     => $hasilKuis, 
            'user'          => $hasilKuis->user, 
            'totalSkor'     => $totalSkor,
            'type'          => $type,
        ]);
    }
}