<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'category_id',
        'price',
        'stock_quantity',
        'description',
        'image',
    ];
}
