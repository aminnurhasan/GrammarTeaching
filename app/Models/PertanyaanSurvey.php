<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PertanyaanSurvey extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan_survey';
    protected $fillable = ['pertanyaan', 'jenis_survey', 'urutan'];
    public $timestamps = true;

    public function jawabanPertama(): HasMany{
        return $this->hasMany(JawabanSurveyPertama::class, 'pertanyaan_survey_id');
    }

    public function jawabanKedua(): HasMany{
        return $this->hasMany(JawabanSurveyKedua::class, 'pertanyaan_survey_id');
    }
}
