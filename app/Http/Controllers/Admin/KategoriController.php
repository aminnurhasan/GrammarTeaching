<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::orderBy('nama')->paginate(10);
        return view('admin.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:kategori,nama',
        ], [
            'nama.required' => __('validation.required', ['attribute' => __('admin.nama_kategori')]),
            'nama.string' => __('validation.string', ['attribute' => __('admin.nama_kategori')]),
            'nama.max' => __('validation.max.string', ['attribute' => __('admin.nama_kategori'), 'max' => 255]),
            'nama.unique' => __('validation.unique', ['attribute' => __('admin.nama_kategori')]),
        ]);

        $slug = Str::slug($request->nama);

        Kategori::create([
            'nama' => $request->nama,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.kategori.index')->with('success', __('admin.kategori_created'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:kategori,nama,' . $kategori->id,
        ], [
            'nama.required' => __('validation.required', ['attribute' => __('admin.nama_kategori')]),
            'nama.string' => __('validation.string', ['attribute' => __('admin.nama_kategori')]),
            'nama.max' => __('validation.max.string', ['attribute' => __('admin.nama_kategori')]),
            'nama.unique' => __('validation.unique', ['attribute' => __('admin.nama_kategori')]),
        ]);

        $slug = Str::slug($request->nama);

        $kategori->update([
            'nama' => $request->nama,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.kategori.index')->with('success', __('admin.kategori_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('admin.kategori.index')->with('success', __('admin.kategori_deleted'));
    }
}
