<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productlog extends Model
{
    protected $table = 'product_logs';
    protected $fillable = ['product_id', 'type', 'quantity'];
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(produk::class, 'product_id');
    }
  
}
