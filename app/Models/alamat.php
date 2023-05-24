<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alamat extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'alamat',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function alamat_pesanan()
    {
        return $this->hasMany(Alamat::class);
    }
}

