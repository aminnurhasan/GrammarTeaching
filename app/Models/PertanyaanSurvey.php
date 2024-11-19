<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanSurvey extends Model
{
    use HasFactory;
    protected $table = 'pertanyaan_survey';
    protected $fillable = ['pertanyaan', 'tipe_survey'];

    public function survey()
    {
        return $this->hasMany(Survey::class, 'id_pertanyaan_survey');
    }
}
