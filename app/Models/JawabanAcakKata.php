<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\BelongsTo;

class JawabanAcakKata extends Model
{
    use HasFactory;

    protected $table = 'jawaban_acak_kata';
    protected $fillable = ['hasil_kuis_id', 'soal_acak_kata_id', 'dijawab', 'benar'];
    protected $timestamps = true;

    public function hasilKuis(): BelongsTo{
        return $this->belongsTo(HasilKuis::class, 'hasil_kuis_id');
    }

    public function soalAcakKata(): BelongsTo{
        return $this->belongsTo(SoalAcakKata::class, 'soal_acak_kata_id');
    }
}
