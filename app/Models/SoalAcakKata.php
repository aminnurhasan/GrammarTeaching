<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SoalAcakKata extends Model
{
    use HasFactory;

    protected $table = 'soal_acak_kata';
    protected $fillable = ['kalimat_benar', 'penjelasan'];
    public $timestamps = true;

    public function jawabanAcakKatas(): HasMany{
        return $this->hasMany(JawabanAcakKata::class, 'soal_acak_kata_id');
    }
}
