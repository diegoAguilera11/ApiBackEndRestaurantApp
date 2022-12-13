<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DetailOrder extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'unit_price',
            'quantity',
            'order_id',
            'product_id'
        ];

    public function productoDatos(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
