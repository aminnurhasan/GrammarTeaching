<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Materi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalKategori = Kategori::count();
        $totalMateri = Materi::count();
        $kategoriDenganJumlahMateri = Kategori::withCount('materis')->get();
        $materis = Materi::with('kategori')->latest()->paginate(10);

        return view('admin.materi.index', compact('materis', 'totalKategori', 'totalMateri', 'kategoriDenganJumlahMateri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.materi.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'urutan' => 'nullable|integer',
        ], [
            'kategori_id.required' => __('validation.required', ['attribute' => __('admin.kategori')]),
            'kategori_id.exists' => __('validation.exists', ['attribute' => __('admin.kategori')]),
            'judul.required' => __('validation.required', ['attribute' => __('admin.judul')]),
            'judul.string' => __('validation.string', ['attribute' => __('admin.judul')]),
            'judul.max' => __('validation.max.string', ['attribute' => __('admin.judul'), 'max' => 255]),
            'konten.required' => __('validation.required', ['attribute' => __('admin.konten')]),
            'konten.string' => __('validation.string', ['attribute' => __('admin.konten')]),
            'urutan.integer' => __('validation.integer', ['attribute' => __('admin.urutan')]),
        ]);

        $slug = Str::slug($validated['judul']);

        Materi::create([
            'kategori_id' => $validated['kategori_id'],
            'judul' => $validated['judul'],
            'slug' => $slug,
            'konten' => $validated['konten'],
            'urutan' => $validated['urutan'],
        ]);

        return redirect()->route('admin.materi.index')->with('success', __('admin.materi_created'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Materi $materi)
    {
        return view('admin.materi.show', compact('materi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $materi)
    {
        $kategoris = Kategori::all();
        return view('admin.materi.edit', compact('materi', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materi $materi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|integer|exists:kategoris,id',
            'konten' => 'required',
            'urutan' => 'nullable|integer|min:1',
        ]);

        $data = $request->except('file');
        $data['slug'] = Str::slug($request->judul);


        $materi->update($data);

        return redirect()->route('admin.materi.index')->with('success', 'Materi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        $materi->delete();
        return redirect()->route('admin.materi.index')->with('success', 'Materi berhasil dihapus.');
    }
}
