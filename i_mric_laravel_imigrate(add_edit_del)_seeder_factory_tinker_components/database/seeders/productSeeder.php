<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = [
            [
                'name' => 'Iphone 13 pro',
                'price' => 600,
                'qty' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Iphone 14 pro',
                'price' => 400,
                'qty' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Samsung Galaxy note11',
                'price' => 300,
                'qty' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Vivo A52',
                'price' => 200,
                'qty' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'OPPO A52',
                'price' => 289,
                'qty' => 32,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        //build query
        DB::table('products')->insert($product);

        // $product = new DB();
        // $product->table('products');
        // $product->insert($product);
        
    }
}