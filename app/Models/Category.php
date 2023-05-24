<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
//     protected $table = 'categories';
// protected $fillable = ['name', 'id'];
    protected $fillable = [
        'user_id',
        'pembayaran_id',
        'kode_pembayaran',
        'total_pembayaran',
        'status_pesanan',
        'tanggal_transaksi',
    ];

    public function productLog()
    {
        return $this->hasOne(ProductLog::class);
    }
    public function produk_pesanan()
    {
        return $this->hasMany(produk_pesanan::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function alamat_pesanan()
    {
        return $this->hasOne(Alamat_pesanan::class);
    }
}
