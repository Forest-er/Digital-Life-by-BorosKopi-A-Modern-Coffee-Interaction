<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\categories;

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

    public function category()
    {
        return $this->belongsTo(categories::class, 'category_id');
    }
}
