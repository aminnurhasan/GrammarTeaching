<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman formulir login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Menangani proses login pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah user ingin "remember me"
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            // Logika pengalihan berdasarkan peran (role)
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/user/dashboard');
            }
        }

        return redirect()->back()->withInput($request->only('email'))->with('error', 'Kredensial yang Anda masukkan tidak cocok dengan data kami.');
    }

    /**
     * Menampilkan halaman formulir registrasi.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('register');
    }

    /**
     * Menangani proses registrasi pengguna baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validasi data yang masuk dari formulir registrasi
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tanggal_lahir' => ['required', 'date'],
            'sekolah' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
        ]);

        // Buat pengguna baru dengan data dari formulir
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tanggal_lahir' => $request->tanggal_lahir,
            'sekolah' => $request->sekolah,
            'alamat' => $request->alamat,
            'role' => 'siswa', // Set peran default untuk pengguna baru
        ]);

        // Langsung login pengguna setelah registrasi berhasil
        Auth::login($user);

        // Redirect ke halaman dashboard pengguna
        return redirect()->route('dashboard'); 
    }

    /**
     * Menangani proses logout pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Menampilkan halaman dashboard setelah login.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Logika untuk menampilkan dashboard berdasarkan peran
        if (Auth::user()->role == 'admin') {
            return view('admin.dashboard');
        } else {
            return view('user.dashboard');
        }
    }
}
