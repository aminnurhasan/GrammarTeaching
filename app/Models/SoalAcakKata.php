<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\HasMany;

class SoalAcakKata extends Model
{
    use HasFactory;

    protected $table = 'soal_acak_kata';
    protected $fillable = ['kata_acak', 'kalimat_benar', 'penjelasan'];
    protected $timestamps = true;

    public function jawabanAcakKatas(): HasMany{
        return $this->hasMany(JawabanAcakKata::class, 'soal_acak_kata_id');
    }
}
