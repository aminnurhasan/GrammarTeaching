<?php

namespace App\Http\Controllers\User;

use App\Models\SoalPilihanGanda;
use App\Models\SoalAcakKata;
use App\Models\PertanyaanSurvey;
use App\Models\HasilKuis;
use App\Models\JawabanPilihanGanda;
use App\Models\JawabanAcakKata;
use App\Models\JawabanSurveyPertama;
use App\Models\DataSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class KuisUserController extends Controller
{
    /**
     * Menampilkan form untuk mengisi biodata siswa.
     *
     * @return \Illuminate\View\View
     */
    public function biodata()
    {
        return view('user.kuis.biodata');
    }

    /**
     * Menyimpan biodata siswa dan membuat entri kuis baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeBiodata(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'sekolah' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
        ]);

        $siswa = DataSiswa::create($request->only(['nama', 'tanggal_lahir', 'sekolah', 'alamat']));
        
        $hasilKuis = HasilKuis::create([
            'data_siswa_id' => $siswa->id,
            'skor_pilihan_ganda' => 0,
            'skor_acak_kata' => 0,
        ]);

        session(['hasil_kuis_id' => $hasilKuis->id]);

        return redirect()->route('kuis.pretest');
    }

    /**
     * Menampilkan halaman survey pretest (pertanyaan jenis 'pertama').
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function pretest()
    {
        if (!Session::has('hasil_kuis_id')) {
            return redirect()->route('kuis.biodata')->with('error', 'Silakan isi data diri terlebih dahulu.');
        }

        $pertanyaanSurvey = PertanyaanSurvey::where('jenis_survey', 'pertama')
                                            ->orderBy('urutan')
                                            ->get();

        return view('user.kuis.survey.pretest', compact('pertanyaanSurvey'));
    }

    /**
     * Menyimpan jawaban dari survey pretest.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storePretest(Request $request)
    {
        // dd($request->all());
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
            // Jika sesi tidak valid, arahkan kembali ke halaman biodata
            return redirect()->route('kuis.biodata')->with('error', 'Sesi kuis tidak valid.');
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
            // Arahkan kembali dengan pesan error jika ada masalah di database
            // dd($e->getMessage()); // Anda bisa mengaktifkan ini untuk debugging
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan jawaban survey. Silakan coba lagi.');
        }

        // Arahkan ke halaman soal pilihan ganda setelah berhasil menyimpan
        return redirect()->route('kuis.pilihanGanda');
    }

    /**
     * Menampilkan halaman soal pilihan ganda.
     *
     * @return \Illuminate\View\View
     */
    public function pilihanGanda()
    {
        $soalPilihanGanda = SoalPilihanGanda::all();
        return view('user.kuis.pilihanGanda', compact('soalPilihanGanda'));
    }

    /**
     * Menyimpan jawaban pilihan ganda dan menghitung skor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

        // Arahkan ke halaman soal acak kata
        return redirect()->route('kuis.acakKata');
    }

    /**
     * Menampilkan halaman soal acak kata.
     *
     * @return \Illuminate\View\View
     */
    public function acakKata()
    {
        $soalAcakKata = SoalAcakKata::all();
        return view('user.kuis.acakKata', compact('soalAcakKata'));
    }

    /**
     * Menyimpan jawaban acak kata dan menghitung skor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeAcakKata(Request $request)
    {
        $hasilKuisId = Session::get('hasil_kuis_id');
        if (!$hasilKuisId) {
            return redirect()->route('kuis.biodata')->with('error', 'Sesi kuis tidak valid.');
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

        // Redirect ke halaman hasil akhir dan bersihkan session
        Session::forget('hasil_kuis_id');
        return redirect()->route('kuis.results', ['id' => $hasilKuisId]);
    }

    /**
     * Menampilkan halaman hasil akhir, termasuk jawaban user dan jawaban benar.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showResults($id)
    {
        $hasilKuis = HasilKuis::with(['dataSiswa', 'jawabanPilihanGanda', 'jawabanAcakKata', 'jawabanSurveyPertama'])
                              ->findOrFail($id);

        return view('user.kuis.results', compact('hasilKuis'));
    }
}
