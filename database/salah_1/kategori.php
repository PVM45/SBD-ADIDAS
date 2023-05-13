<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\subkategori;

class kategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kategori',
            ];

    public function kategoris()
    {
        return $this->BelongsToMany(subkategori::class);
    }
    public function produks()
    {
        return $this->belongsTo(produk::class);
    }
    public function subkategoris()
    {
        return $this->belongsToMany(subkategori::class, 'pivot_kategori_subkategori');
    }
}
