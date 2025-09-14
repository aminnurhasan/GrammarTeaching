<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\SoalPilihanGanda;
use App\Models\SoalAcakKata;
use App\Models\PertanyaanSurvey;
use App\Models\HasilKuis;
use App\Models\JawabanPilihanGanda;
use App\Models\JawabanAcakKata;
use App\Models\JawabanSurveyPertama;
use App\Models\JawabanSurveyKedua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KuisUserController extends Controller
{
    public function pretest()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Jika tidak ada sesi kuis, buat entri HasilKuis baru
        if (!Session::has('hasil_kuis_id')) {
            $hasilKuis = HasilKuis::create([
                'user_id' => Auth::user()->id,
                'skor_pilihan_ganda' => 0,
                'skor_acak_kata' => 0,
            ]);
            session(['hasil_kuis_id' => $hasilKuis->id]);
        }

        $pertanyaanSurvey = PertanyaanSurvey::where('jenis_survey', 'pertama')
                                            ->orderBy('urutan')
                                            ->get();

        return view('user.kuis.survey.pretest', compact('pertanyaanSurvey'));
    }

    public function storePretest(Request $request)
    {
        $request->validate([
            'survey' => 'required|array',
            'survey.*' => 'required|integer|min:1|max:5',
        ], [
            'survey.*.required' => 'Semua pertanyaan survei harus dijawab.',
            'survey.*.min' => 'Jawaban harus dalam skala 1 hingga 5.',
            'survey.*.max' => 'Jawaban harus dalam skala 1 hingga 5.',
        ]);

        $hasilKuisId = Session::get('hasil_kuis_id');
        if (!$hasilKuisId) {
            return redirect()->back()->with('error', 'Sesi kuis tidak valid.');
        }

        DB::beginTransaction();
        try {
            $jawabanSurveyUser = $request->input('survey', []);
            foreach ($jawabanSurveyUser as $pertanyaanId => $jawaban) {
                JawabanSurveyPertama::create([
                    'hasil_kuis_id' => $hasilKuisId,
                    'pertanyaan_survey_id' => $pertanyaanId,
                    'jawaban' => $jawaban,
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan jawaban survey. Silakan coba lagi.');
        }

        // Arahkan ke halaman soal pilihan ganda setelah berhasil menyimpan
        return redirect()->route('kuis.pilihanGanda');
    }

    public function pilihanGanda()
    {
        $soalPilihanGanda = SoalPilihanGanda::all();
        return view('user.kuis.pilihanGanda', compact('soalPilihanGanda'));
    }

    public function storePilihanGanda(Request $request)
    {
        $hasilKuisId = Session::get('hasil_kuis_id');
        if (!$hasilKuisId) {
            return redirect()->route('kuis.biodata')->with('error', 'Sesi kuis tidak valid.');
        }

        DB::beginTransaction();
        try {
            $hasilKuis = HasilKuis::findOrFail($hasilKuisId);
            $scorePilihanGanda = 0;
            $jawabanPilihanGandaUser = $request->input('pg', []);

            // Hitung total soal untuk perhitungan nilai
            $totalSoal = SoalPilihanGanda::count();
            $nilaiPerSoal = $totalSoal > 0 ? 100 / $totalSoal : 0;

            $soalPilihanGandaDB = SoalPilihanGanda::whereIn('id', array_keys($jawabanPilihanGandaUser))->get()->keyBy('id');

            foreach ($jawabanPilihanGandaUser as $soalId => $jawaban) {
                $soal = $soalPilihanGandaDB->get($soalId);
                $benar = ($soal && strtolower($soal->jawaban_benar) === strtolower($jawaban));

                // Jika jawaban benar, tambahkan nilai per soal ke skor
                if ($benar) {
                    $scorePilihanGanda += $nilaiPerSoal;
                }

                JawabanPilihanGanda::create([
                    'hasil_kuis_id' => $hasilKuisId,
                    'soal_pilihan_ganda_id' => $soalId,
                    'dijawab' => $jawaban,
                    'benar' => $benar,
                ]);
            }

            // Update skor pilihan ganda di tabel hasil_kuis
            $hasilKuis->update(['skor_pilihan_ganda' => $scorePilihanGanda]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan jawaban pilihan ganda.');
        }

        return redirect()->route('kuis.acakKata');
    }

    public function acakKata()
    {
        $soalAcakKata = SoalAcakKata::all();
        return view('user.kuis.acakKata', compact('soalAcakKata'));
    }

    public function storeAcakKata(Request $request)
    {
        $hasilKuisId = Session::get('hasil_kuis_id');
        if (!$hasilKuisId) {
            return redirect()->back()->with('error', 'Sesi kuis tidak valid.');
        }

        DB::beginTransaction();
        try {
            $hasilKuis = HasilKuis::findOrFail($hasilKuisId);
            $scoreAcakKata = 0;
            $jawabanAcakKataUser = $request->input('ak', []);

            // Hitung total soal untuk perhitungan nilai
            $totalSoal = SoalAcakKata::count();
            $nilaiPerSoal = $totalSoal > 0 ? 100 / $totalSoal : 0;
            
            $soalAcakKataDB = SoalAcakKata::whereIn('id', array_keys($jawabanAcakKataUser))->get()->keyBy('id');

            foreach ($jawabanAcakKataUser as $soalId => $jawaban) {
                $soal = $soalAcakKataDB->get($soalId);
                $cleanedUserAnswer = strtolower(trim(preg_replace('/\s+/', ' ', $jawaban)));
                $cleanedCorrectAnswer = strtolower(trim(preg_replace('/\s+/', ' ', $soal->kalimat_benar)));
                $benar = ($soal && $cleanedUserAnswer === $cleanedCorrectAnswer);

                // Jika jawaban benar, tambahkan nilai per soal ke skor
                if ($benar) {
                    $scoreAcakKata += $nilaiPerSoal;
                }

                JawabanAcakKata::create([
                    'hasil_kuis_id' => $hasilKuisId,
                    'soal_acak_kata_id' => $soalId,
                    'dijawab' => $jawaban,
                    'benar' => $benar,
                ]);
            }

            // Update skor acak kata di tabel hasil_kuis
            $hasilKuis->update(['skor_acak_kata' => $scoreAcakKata]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan jawaban acak kata.');
        }

        return redirect()->route('kuis.posttest');
    }

    public function posttest()
    {
        if (!Session::has('hasil_kuis_id')) {
            return redirect()->back()->with('error', 'Sesi kuis tidak valid.');
        }

        $pertanyaanSurvey = PertanyaanSurvey::where('jenis_survey', 'kedua')
                                        ->orderBy('urutan')
                                        ->get();

        return view('user.kuis.survey.posttest', compact('pertanyaanSurvey'));
    }

    public function storePosttest(Request $request)
    {
        $request->validate([
            'survey' => 'required|array',
            'survey.*' => 'required|integer|min:1|max:5',
        ], [
            'survey.*.required' => 'Semua pertanyaan survei harus dijawab.',
            'survey.*.min' => 'Jawaban harus dalam skala 1 hingga 5.',
            'survey.*.max' => 'Jawaban harus dalam skala 1 hingga 5.',
        ]);

        $hasilKuisId = Session::get('hasil_kuis_id');
        if (!$hasilKuisId) {
            return redirect()->back()->with('error', 'Sesi kuis tidak valid.');
        }

        DB::beginTransaction();
        try {
            $jawabanSurveyUser = $request->input('survey', []);
            foreach ($jawabanSurveyUser as $pertanyaanId => $jawaban) {
                JawabanSurveyKedua::create([
                    'hasil_kuis_id' => $hasilKuisId,
                    'pertanyaan_survey_id' => $pertanyaanId,
                    'jawaban' => $jawaban,
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan jawaban survey. Silakan coba lagi.');
        }

        // Bersihkan sesi dan arahkan ke halaman hasil akhir
        Session::forget('hasil_kuis_id');
        return redirect()->route('kuis.hasil', ['id' => $hasilKuisId]);
    }

    public function showResults($id)
    {
        $hasilKuis = HasilKuis::with([
            'user', // Gunakan relasi user untuk data pengguna
            'jawabanPilihanGandas',
            'jawabanAcakKatas',
            'jawabanSurveyPertama',
            'jawabanSurveyKedua' // Tambahkan relasi untuk survey posttest
        ])->findOrFail($id);

        return view('user.kuis.hasilKuis', compact('hasilKuis'));
    }
}
