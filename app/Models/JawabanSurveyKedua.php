<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JawabanSurveyKedua extends Model
{
    use HasFactory;

    protected $table = 'jawaban_survey_kedua';
    protected $fillable = ['hasil_kuis_id', 'pertanyaan_survey_id', 'jawaban'];
    public $timestamps = true;

    public function hasilKuis(): BelongsTo{
        return $this->belongsTo(HasilKuis::class, 'hasil_kuis_id');
    }

    public function pertanyaanSurvey(): BelongsTo{
        return $this->belongsTo(PertanyaanSurvey::class, 'pertanyaan_survey_id');
    }
}
