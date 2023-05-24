<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'produks';
    use HasFactory;
    protected $fillable = [
        'metode_pembayaran',
    ];
    public function alamat_pesanan()
    {
        return $this->hasOne(Alamat_pesanan::class);
    }
    // public function user()
    // {
    //     return $this->hasOne(Alamat::class);
    // }
}
