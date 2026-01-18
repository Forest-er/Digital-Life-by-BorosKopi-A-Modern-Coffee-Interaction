<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_name' => 'Espresso',
                'category_id' => 1,
                'price' => 30000,
                'stock_quantity' => 100,
                'description' => 'Strong and bold espresso shot.',
                'image' => 'espresso.jpg',
            ],
            [
                'product_name' => 'Cappuccino',
                'category_id' => 1,
                'price' => 40000,
                'stock_quantity' => 80,
                'description' => 'Espresso with steamed milk and foam.',
                'image' => 'cappuccino.jpg',
            ],
            [
                'product_name' => 'Blueberry Muffin',
                'category_id' => 2,
                'price' => 25000,
                'stock_quantity' => 50,
                'description' => 'Freshly baked blueberry muffin.',
                'image' => 'blueberry_muffin.jpg',
            ],
        ]);
    }
}
