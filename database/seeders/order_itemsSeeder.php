<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class order_itemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_items')->insert([
            [
                'order_id' => 1,
                'product_id' => 7,
                'quantity' => 2,
                'price' => 60000,
            ],
            [
                'order_id' => 1,
                'product_id' => 8,
                'quantity' => 1,
                'price' => 40000,
            ],
        ]);
    }
}
