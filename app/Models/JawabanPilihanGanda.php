<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\BelongsTo;

class JawabanPilihanGanda extends Model
{
    use HasFactory;

    protected $table = 'jawaban_pilihan_ganda';
    protected $fillable = ['hasil_kuis_id', 'soal_pilihan_ganda_id', 'dijawab', 'benar'];
    protected $timestamps = true;

    public function hasilKuis(): BelongsTo{
        return $this->belongsTo(HasilKuis::class, 'hasil_kuis_id');
    }

    public function soalPilihanGanda(): BelongsTo{
        return $this->belongsTo(SoalPilihanGanda::class, 'soal_pilihan_ganda_id');
    }
}
