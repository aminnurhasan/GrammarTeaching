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
    public function showLoginForm(){
        return view('user.login');
    }

    public function login (Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'nullable|boolear'
        ]);

        if (Auth::attempt($credentials)){
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Kredensial yang anda masukkan salah.'
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }
}
