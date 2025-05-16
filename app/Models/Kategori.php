<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = ['nama', 'slug'];
    public $timestamps = true;

    public function materis(): HasMany{
        return $this->hasMany(Materi::class, 'kategori_id');
    }
}
