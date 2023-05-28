<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $table = 'produks';
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

    public function subkategoris()
    {
        return $this->belongsToMany(Subkategori::class, 'kategoris_subkategoris', 'produk_id', 'subkategori_id');
    }
    public function subkategoris2()
    {
        return $this->hasMany(Subkategori::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function kategoris()
    {
        return $this->hasMany(kategori_produk::class);
    }
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
    public function logs()
    {
        return $this->hasMany(ProductLog::class);
    }
    public function produk_pesanan()
    {
        return $this->hasMany(produk_pesanan::class);
    }
}
