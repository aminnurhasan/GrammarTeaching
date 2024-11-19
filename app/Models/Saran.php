<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    use HasFactory;
    protected $table = 'saran';
    protected $fillable = ['id_data_diri', 'saran'];

    public function dataDiri()
    {
        return $this->belongsTo(DataDiri::class, 'id_data_diri');
    }
}
