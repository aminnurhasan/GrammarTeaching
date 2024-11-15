<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    use HasFactory;
    protected $table = 'data_diri';
    protected $fillable = ['nama', 'asal_sekolah', 'tanggal_lahir', 'alamat'];

    public function survey()
    {
        return $this->hasMany(Survey::class, 'id_data_diri');
    }
    public function jawabanMenyusunKata()
    {
        return $this->hasMany(JawabanMenyusunKata::class, 'id_data_diri');
    }
    public function jawabanMenyusunKalimat()
    {
        return $this->hasMany(JawabanMenyusunKalimat::class, 'id_data_diri');
    }
    public function nilai()
    {
        return $this->hasOne(Nilai::class, 'id_data_diri');
    }
}
