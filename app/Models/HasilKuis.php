<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HasilKuis extends Model
{
    use HasFactory;

    protected $table = 'hasil_kuis';
    protected $fillable = ['data_siswa_id', 'skor_pilihan_ganda', 'skor_acak_kata'];
    public $timestamps = true;

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
