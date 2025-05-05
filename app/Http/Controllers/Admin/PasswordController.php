<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    public function edit(){
        return view('admin.password.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => ['required', 'confirmed', Password::min(8)], //
        ]);

        $user = Auth::user();

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', __('admin.password_changed_success'));
    }
}
