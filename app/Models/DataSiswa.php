<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\HasOne;

class DataSiswa extends Model
{
    use HasFactory;

    protected $table = 'data_siswa';
    protected $fillable = ['nama', 'tanggal_lahir', 'alamat', 'sekolah'];
    protected $timestamps = true;

    public function hasilKuis(): HasOne{
        return $this->hasOne(HasilKuis::class, 'data_siswa_id');
    }
}
