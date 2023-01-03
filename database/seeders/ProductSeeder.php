<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Product::create([
            'image' => 'tuxsuit1.jpeg',
            'productName' => 'Black Tuxedo Suit',
            'detail' => 'A Full Black Tuxedo Suit by Samuel L Jackson',
            'price' => 1500000,
            'stock' => 1
        ]);
        Product::create([
            'image' => 'leatherinsertalineglittercoat.jpg',
            'productName' => 'Leather Insert-a-line Glitter Coat',
            'detail' => 'Louis Vuitton',
            'price' => 2300000,
            'stock' => 1
        ]);
        Product::create([
            'image' => 'shorthoodedparka.jpg',
            'productName' => 'Short Hooded Parka',
            'detail' => 'Louis Vuitton',
            'price' => 1800000,
            'stock' => 1
        ]);
    }
}
