<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailOrder;

class Order extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'code',
        'date',
        'total',
        'status',
        'tables_id'
    ];

    public function productoVenta()
    {
        return $this->hasMany(DetailOrder::class, 'order_id');
    }
}
