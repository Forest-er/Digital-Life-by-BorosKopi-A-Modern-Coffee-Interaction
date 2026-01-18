<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'customer_name',
        'number_phone',
        'address',
        'product_name',
        'quantity',
        'total_price',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}
