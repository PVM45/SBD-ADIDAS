<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'alamat_id',
        'pembayaran_id',
        'total_pembayaran',
        'kode_pembayaran',
        'status_pesanan',
        'tanggal_transaksi',
    ];
    use HasFactory;
    public function productLog()
    {
        return $this->hasOne(ProductLog::class);
    }
    public function alamat()
    {
        return $this->belongsTo(alamat::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
}
