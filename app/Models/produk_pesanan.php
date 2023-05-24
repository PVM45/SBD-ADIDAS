<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk_pesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'pesanan_id',
        'produk_id',
        'kuantitas',
        'harga',
    ];
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
