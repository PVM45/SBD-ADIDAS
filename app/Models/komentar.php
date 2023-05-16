<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    use HasFactory;

    protected $fillable = ['komentar', 'user_id', 'produk_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
 
    public function produk()
    {
        return $this->belongsTo(produk::class); // Ganti 'Article' dengan model entitas yang sesuai
    }
 
}
