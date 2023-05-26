<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';

    protected $fillable = ['metode_pembayaran','nomor'];
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
