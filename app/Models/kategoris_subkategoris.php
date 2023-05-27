<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\kategori;

class kategoris_subkategoris extends Model
{
    use HasFactory;
    protected $table = 'kategoris_subkategoris';
    protected $fillable = ['produk,kategori,subkategori'];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    
    public function subkategori()
    {
        return $this->belongsTo(Subkategori::class);
    }
    

    // public function produk()
    // {
    //     return $this->hasMany(Produk::class);
    // }
}
