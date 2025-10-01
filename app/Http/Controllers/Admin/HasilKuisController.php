<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HasilKuis;

class HasilKuisController extends Controller
{
    public function index(){
        $semuaHasilKuis = HasilKuis::with('user')
                            ->latest()
                            ->get();
        return view('admin.hasilKuis.index', compact('semuaHasilKuis'));
    }

    public function show(HasilKuis $hasilKuis){
        $hasilKuis->load([
            'user',
            'jawabanPilihanGandas.soalPilihanGanda',
            'jawabanAcakKatas.soalAcakKata'
        ]);

        return view('admin.hasilKuis.show', compact('hasilKuis'));
    }
}
