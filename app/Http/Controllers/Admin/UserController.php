<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Menampilkan daftar semua pengguna dengan role 'siswa'.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua user yang memiliki role 'siswa' dan melakukan pagination
        $students = User::where('role', 'siswa')->latest()->paginate(10);

        return view('admin.user.index', compact('students'));
    }

    /**
     * Menampilkan detail spesifik dari data siswa.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\View\View
     */
    public function show(User $student)
    {
        // Memastikan hanya data dengan role 'siswa' yang ditampilkan
        if ($student->role !== 'siswa') {
            return redirect()->route('admin.user.index')->with('error', 'Pengguna bukan siswa.');
        }

        return view('admin.user.show', compact('student'));
    }

    /**
     * Menampilkan form untuk mengedit data siswa yang spesifik.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\View\View
     */
    public function edit(User $student)
    {
        // Memastikan hanya data dengan role 'siswa' yang dapat diedit
        if ($student->role !== 'siswa') {
            return redirect()->route('admin.user.index')->with('error', 'Pengguna bukan siswa.');
        }

        return view('admin.user.edit', compact('student'));
    }

    /**
     * Memperbarui data siswa di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $student)
    {
        // Aturan validasi
        $rules = [
            'nama' => 'required|string|max:255',
            // Memastikan email unik, kecuali untuk user yang sedang diedit
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($student->id)],
            'sekolah' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed', // 'confirmed' mencari field password_confirmation
        ];

        $validatedData = $request->validate($rules);

        // Update data siswa
        $student->nama = $validatedData['nama'];
        $student->email = $validatedData['email'];
        $student->sekolah = $validatedData['sekolah'];
        $student->tanggal_lahir = $validatedData['tanggal_lahir'];
        $student->alamat = $validatedData['alamat'];

        // Hanya update password jika field 'password' diisi
        if (!empty($validatedData['password'])) {
            $student->password = Hash::make($validatedData['password']);
        }

        $student->save();

        return redirect()->route('admin.user.index')
                         ->with('success', 'Data siswa bernama ' . $student->nama . ' berhasil diperbarui!');
    }

    /**
     * Menghapus data siswa dari database.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $student)
    {
        $studentName = $student->nama;
        $student->delete();

        return redirect()->route('admin.user.index')
                         ->with('success', 'Data siswa bernama ' . $studentName . ' berhasil dihapus.');
    }
}
