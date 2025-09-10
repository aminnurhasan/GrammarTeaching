<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HasilKuis;

class DashboardUserController extends Controller
{
    public function index(){
        $user = Auth::user();
        $quizzes_completed = HasilKuis::where('user_id', $user->id)->count();

        return view('user.dashboard', compact('quizzes_completed'));
    }
}
