<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subkategori extends Model
{
    use HasFactory;
    // protected $table='subkategori_produk';
    protected $fillable = [
        'nama_subkategori',
        'id_kategori'
        // 'status',
    ];

    public function subkategoris() {
        return $this->belongsToMany(kategoris::class);

    }
    public function produks(){
        return $this->belongsTo(produks::class);
    }
}
