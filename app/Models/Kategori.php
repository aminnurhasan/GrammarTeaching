<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\HasMany;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = ['nama', 'slug'];
    protected $timestamps = true;

    public function materis(): HasMany{
        return $this->hasMany(Materi::class, 'kategori_id');
    }
}
