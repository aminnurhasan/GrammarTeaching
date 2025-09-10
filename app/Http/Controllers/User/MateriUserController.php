<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;

class MateriUserController extends Controller
{
    public function show($slug)
    {
        $materi = Materi::where('slug', $slug)->firstOrFail();

        return view('user.materi.show', compact('materi'));
    }
}
