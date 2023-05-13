<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $fillable = ['name', 'id'];
    public function subkategori()
    {   
        return $this->belongsToMany(subkategori::class);
    }



}
