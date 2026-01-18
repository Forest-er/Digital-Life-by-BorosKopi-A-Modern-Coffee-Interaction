<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\product;

class order_items extends Model
{
    protected $primaryKey = 'order_item_id';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }
}
