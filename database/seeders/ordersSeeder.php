<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ordersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'customer_name' => 'Harriet Santiago',
                'number_phone'  => '081234567890',
                'address'       => 'Jl. Kopi No. 12, Jakarta',
                'product_name'  => 'Espresso',
                'quantity'      => 2,
                'total_price'   => 60000,
            ],
            [
                'customer_name' => 'Sara Graham',
                'number_phone'  => '082198765432',
                'address'       => 'Apartemen Boros, Bandung',
                'product_name'  => 'Cappucino',
                'quantity'      => 1,
                'total_price'   => 35000,
            ],
            [
                'customer_name' => 'Victor Arnold',
                'number_phone'  => '085711223344',
                'address'       => 'Komplek Kafe, Surabaya',
                'product_name'  => 'Americano',
                'quantity'      => 3,
                'total_price'   => 75000,
            ],
            [
                'customer_name' => 'Elmer McGee',
                'number_phone'  => '089900112233',
                'address'       => 'Jl. Senja No. 5, Yogyakarta',
                'product_name'  => 'Latte Art',
                'quantity'      => 1,
                'total_price'   => 28000,
            ],
        ]);
    }
}
