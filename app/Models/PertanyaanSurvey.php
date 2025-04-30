<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\HasMany;

class PertanyaanSurvey extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan_survey';
    protected $fillable = ['teks', 'jenis_survey', 'urutan'];
    protected $timestamps = true;

    public function jawabanPertama(): HasMany{
        return $this->hasMany(JawabanSurveyPertama::class, 'pertanyaan_id');
    }

    public function jawabanKedua(): HasMany{
        return $this->hasMany(JawabanSurveyKedua::class, 'pertanyaan_id');
    }
}
