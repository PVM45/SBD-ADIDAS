<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\kategori;

class subkategori extends Model
{
    use HasFactory;
    protected $table = 'subkategoris';
    protected $fillable = ['nama_subkategori,id,id_kategori'];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function kategoris()
    {
        return $this->belongsToMany(Kategori::class);
    }

    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'kategori_subkategori', 'subkategori_id', 'produk_id')
            ->using(KategorisSubkategoris::class);
    }

    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'kategori_subkategori', 'subkategori_id', 'produk_id')
            ->using(KategorisSubkategoris::class);
    }
}
