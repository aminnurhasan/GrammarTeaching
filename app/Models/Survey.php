<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $table = 'survey';
    protected $fillable = ['id_data_diri', 'pertanyaan', 'tipe_survey', 'nilai'];

    public function dataDiri()
    {
        return $this->belongsTo(DataDiri::class, 'id_data_diri');
    }
}
