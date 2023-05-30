<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alamat extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'alamat',
        'kode_pos',
        'nomor_telepon',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function alamat_pesanan()
    {
        return $this->hasMany(Alamat::class);
    }
    public function pesanan()
    {
        return $this->hasOne(Pesanan::class);
    }
}

