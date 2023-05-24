<?php

namespace App\Models;
use App\models\user;
use App\models\produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang_belanja extends Model
{
    use HasFactory;

    protected $fillable = ['kuantitas'];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function produk()
{
    return $this->belongsTo(Produk::class);
}
}


