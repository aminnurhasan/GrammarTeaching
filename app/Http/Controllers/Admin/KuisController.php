<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoalPilihanGanda;
use App\Models\SoalAcakKata;
use Illuminate\Support\Str;

class KuisController extends Controller
{
    public function index()
    {
        // Menghitung total soal pilihan ganda
        $totalPilihanGanda = SoalPilihanGanda::count();

        // Menghitung total soal susun kata
        $totalSusunKata = SoalAcakKata::count();

        // Menghitung total kuis (jumlah pilihan ganda dan susun kata)
        $totalKuis = $totalPilihanGanda + $totalSusunKata;

        // Meneruskan data total ke view admin.kuis.index
        return view('admin.kuis.index', compact('totalKuis', 'totalPilihanGanda', 'totalSusunKata'));
    }

    public function indexPilihanGanda()
    {
        $soalPilihanGanda = SoalPilihanGanda::all(); // Mengambil semua soal pilihan ganda
        return view('admin.kuis.pilihanGanda.index', compact('soalPilihanGanda'));
    }

    public function createPilihanGanda()
    {
        // Anda bisa menambahkan logika untuk urutan otomatis di sini jika diperlukan
        // Contoh: $lastSoal = SoalPilihanGanda::orderBy('urutan', 'desc')->first();
        // $nextUrutan = ($lastSoal) ? $lastSoal->urutan + 1 : 1;
        return view('admin.kuis.pilihanGanda.create'); // , compact('nextUrutan')
    }

    public function storePilihanGanda(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'opsi_a' => 'required|string',
            'opsi_b' => 'required|string',
            'opsi_c' => 'required|string',
            'opsi_d' => 'required|string',
            'jawaban_benar' => 'required|string|in:A,B,C,D', // Asumsi jawaban benar adalah A, B, C, atau D
            'penjelasan' => 'nullable|string', // Menambahkan validasi untuk 'penjelasan'
        ]);

        SoalPilihanGanda::create($request->all());

        return redirect()->route('admin.kuis.pilihanGanda')->with('success', 'Kuis Pilihan Ganda berhasil ditambahkan.');
    }

    public function showPilihanGanda(SoalPilihanGanda $pilihanGanda)
    {
        return view('admin.kuis.pilihanGanda.show', compact('pilihanGanda'));
    }

    public function editPilihanGanda(SoalPilihanGanda $pilihanGanda)
    {
        return view('admin.kuis.pilihanGanda.edit', compact('pilihanGanda'));
    }
    public function updatePilihanGanda(Request $request, SoalPilihanGanda $pilihanGanda)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'opsi_a' => 'required|string',
            'opsi_b' => 'required|string',
            'opsi_c' => 'required|string',
            'opsi_d' => 'required|string',
            'jawaban_benar' => 'required|string|in:A,B,C,D',
            'penjelasan' => 'nullable|string', // Menambahkan validasi untuk 'penjelasan'
        ]);

        $pilihanGanda->update($request->all());

        return redirect()->route('admin.kuis.pilihanGanda')->with('success', 'Kuis Pilihan Ganda berhasil diperbarui.');
    }

    public function destroyPilihanGanda(SoalPilihanGanda $pilihanGanda)
    {
        $pilihanGanda->delete();
        return redirect()->route('admin.kuis.pilihanGanda')->with('success', 'Kuis Pilihan Ganda berhasil dihapus.');
    }

    public function indexSusunKata()
    {
        $soalSusunKata = SoalAcakKata::all();
        return view('admin.kuis.susunKata.index', compact('soalSusunKata'));
    }

    public function createSusunKata()
    {
        return view('admin.kuis.susunKata.create');
    }

    public function storeSusunKata(Request $request)
    {
        $request->validate([
            'kalimat_benar' => 'required|string|max:255',
            'penjelasan' => 'nullable|string',
        ]);

        SoalAcakKata::create($request->all());

        return redirect()->route('admin.kuis.susunKata')->with('success', 'Soal susun kata berhasil ditambahkan.');
    }

    public function showSusunKata(SoalAcakKata $susunKata)
    {
        return view('admin.kuis.susunKata.show', compact('susunKata'));
    }

    public function editSusunKata(SoalAcakKata $susunKata)
    {
        return view('admin.kuis.susunKata.edit', compact('susunKata'));
    }

    public function updateSusunKata(Request $request, SoalAcakKata $susunKata)
    {
        $request->validate([
            'kalimat_benar' => 'required|string|max:255',
            'penjelasan' => 'nullable|string',
        ]);

        $susunKata->update($request->all());

        return redirect()->route('admin.kuis.susunKata')->with('success', 'Soal susun kata berhasil diubah.');
    }

    public function destroySusunKata(SoalAcakKata $susunKata)
    {
        $susunKata->delete();

        return redirect()->route('admin.kuis.susunKata')->with('success', 'Soal susun kata berhasil dihapus.');
    }
}
