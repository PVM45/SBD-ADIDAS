<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\kategori;

class kategoris_subkategoris extends Model
{
    use HasFactory;

    public function kategori()
    {
        return $this->BelongsTo(kategori::class);
    }
    public function subkategori()
    {
        return $this->BelongsTo(subkategori::class);
    }

    public function produk()
    {
        return $this->BelongsTo(produk::class);
    }
}
