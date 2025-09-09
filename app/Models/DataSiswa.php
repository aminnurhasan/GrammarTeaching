<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataSiswa extends Model
{
    use HasFactory;

    protected $table = 'data_siswa';
    protected $fillable = ['nama', 'tanggal_lahir', 'alamat', 'sekolah'];
    public $timestamps = true;

    public function hasilKuis(): HasOne{
        return $this->hasOne(HasilKuis::class, 'data_siswa_id');
    }
}
