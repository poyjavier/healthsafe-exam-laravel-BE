<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Rapha Red',
                'price' => 100.00,
                'image' => 'images/red.jpg',
                'stock' => 5
            ], [
                'name' => 'Rapha Blue',
                'price' => 150.00,
                'image' => 'images/blue.jpg',
                'stock' => 5
            ], [
                'name' => 'Rapha White',
                'price' => 200.00,
                'image' => 'images/white.jpg',
                'stock' => 5
            ], [
                'name' => 'Rapha Yellow',
                'price' => 250.00,
                'image' => 'images/yellow.jpg',
                'stock' => 5
            ]
        ];

        foreach ($data as $item) {
            Product::create($item);
        }
    }
}
