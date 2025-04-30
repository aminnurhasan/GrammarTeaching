<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\HasMany;
use Illuminate\Database\Eloquent\BelongsTo;
use Illuminate\Database\Eloquent\HasOne;

class HasilKuis extends Model
{
    use HasFactory;

    protected $table = 'hasil_kuis';
    protected $fillable = ['data_siswa_id', 'skor_pilihan_ganda', 'skor_acak_kata'];
    protected $timestamps = true;

    public function dataSiswa(): BelongsTo{
        return $this->belongsTo(DataSiswa::class, 'data_siswa_id');
    }

    public function jawabanPilihanGandas(): HasMany{
        return $this->hasMany(JawabanPilihanGanda::class, 'hasil_kuis_id');
    }

    public function jawabanAcakKatas(): HasMany{
        return $this->hasMany(JawabanAcakKata::class, 'hasil_kuis_id');
    }

    public function jawabanSurveyPertama(): HasOne{
        return $this->hasOne(JawabanSurveyPertama::class, 'hasil_kuis_id');
    }

    public function jawabanSurveyKedua(): HasOne{
        return $this->hasOne(JawabanSurveyKedua::class, 'hasil_kuis_id');
    }
}
