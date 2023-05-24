<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alamat_pesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pesanan_id',
        'pembayaran_id',
        'alamat_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
    public function alamat()
    {
        return $this->belongsTo(Pembayaran::class);
    }
}
