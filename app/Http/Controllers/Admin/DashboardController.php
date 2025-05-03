<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Anda bisa mengambil data statistik dari database di sini
        // $totalUsers = \App\Models\User::count();
        // $totalMaterials = \App\Models\Materi::count(); // Contoh model Material
        // $totalQuizzes = \App\Models\Quiz::count(); // Contoh model Quiz

        return view('admin.dashboard');
    }
}
