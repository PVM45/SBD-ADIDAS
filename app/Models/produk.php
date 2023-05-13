<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_produk',
        'nama_produk',
        'deskripsi_produk',
        'gambar_produk',
        'varian_warna',
        'id_kategori',
        'id_subkategori',
        'password',
        'ukuran',
        'stok',
        'status_produk',
        'harga_produk'
    ];

    public function subkategoris() {
        return $this->hasMany(subkategori::class);
    }
    public function kategori_produks() {
        return $this->hasMany(kategori_produk::class);
    }
}
