<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri;
use App\Models\PertanyaanSurvey;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function biodata()
    {
        return view('siswa.game.biodata');
    }

    public function biodataStore(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
        ]);

        // Simpan data ke dalam tabel data_diri
        $dataDiri = DataDiri::create([
            'nama' => $validated['nama'],
            'asal_sekolah' => $validated['asal_sekolah'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'alamat' => $validated['alamat'],
        ]);

        // Setelah berhasil disubmit, arahkan pengguna ke halaman survey
        return redirect('/survey')->with('success', 'Biodata berhasil disubmit! Silakan isi survey.');
    }

    public function preTest()
    {
        $pertanyaan = PertanyaanSurvey::where('tipe_survey', 'pra')->get();
        return view('siswa.game.survey1', compact('pertanyaan'));
    }

    public function storePreTest(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'jawaban' => 'required|array', // Jawaban harus berupa array
            'jawaban.*' => 'required|integer|min:1|max:5', // Setiap jawaban adalah nilai 1-5
        ]);

        $idDataDiri = $request->session()->get('id_data_diri'); // Ambil id_data_diri dari session
        if (!$idDataDiri) {
            return redirect('/biodata')->withErrors('Data diri belum diisi.');
        }

        // Loop melalui setiap jawaban yang diterima
        foreach ($validated['jawaban'] as $idPertanyaanSurvey => $jawaban) {
            Survey::create([
                'id_data_diri' => $idDataDiri,
                'id_pertanyaan_survey' => $idPertanyaanSurvey,
                'jawaban' => $jawaban,
            ]);
        }

        // Redirect setelah berhasil menyimpan
        return redirect('/game')->with('success', 'Survey berhasil disimpan! Selamat bermain.');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
