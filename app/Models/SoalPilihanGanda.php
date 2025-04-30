<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\HasMany;

class SoalPilihanGanda extends Model
{
    use HasFactory;

    protected $table = 'soal_pilihan_ganda';
    protected $fillable = ['pertanyaan', 'opsi_a', 'opsi_b', 'opsi_c', 'opsi_d', 'jawaban_benar', 'penjelasan'];
    protected $timestamps = true;

    public function jawabanPilihanGandas(): HasMany{
        return $this->hasMany(JawabanPilihanGanda::class, 'soal_pilihan_ganda_id');
    }
}
