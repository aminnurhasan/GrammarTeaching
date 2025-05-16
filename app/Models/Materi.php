<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';
    protected $fillable = ['kategori_id', 'judul', 'slug', 'konten', 'urutan'];
    public $timestamps = true;

    public function kategori(): BelongsTo{
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
