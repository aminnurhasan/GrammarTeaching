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
    public function showLoginForm()
    {
        return view('login');
    }

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

    public function showRegistrationForm()
    {
        return view('register');
    }

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
        return redirect()->route('user.dashboard'); 
    }

    public function showRegistrationAdminForm()
    {
        return view('registerAdmin');
    }

    public function registerAdmin(Request $request)
    {
        // Validasi data yang masuk dari formulir registrasi
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Buat pengguna baru dengan data dari formulir
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // Set peran default untuk pengguna baru
        ]);

        // Langsung login pengguna setelah registrasi berhasil
        Auth::login($user);

        return redirect()->route('admin.dashboard'); 
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function dashboard()
    {
        if (Auth::user()->role == 'admin') {
            return view('admin.dashboard');
        } else {
            return view('user.dashboard');
        }
    }
}
