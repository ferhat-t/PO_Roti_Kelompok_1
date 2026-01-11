<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Roti Croissant',
                'description' => 'Roti croissant lembut dan renyah.',
                'price' => 14900.00,
                'image' => 'image/croisan.jpg',
                'stock' => 50,
                'category' => 'Breads',
                'is_active' => true,
            ],
            [
                'name' => 'Cromboloni',
                'description' => 'Cromboloni manis isi krim.',
                'price' => 17000.00,
                'image' => 'image/cromboloni.png',
                'stock' => 40,
                'category' => 'Snacks',
                'is_active' => true,
            ],
            [
                'name' => 'Roti Gandum',
                'description' => 'Roti gandum sehat dan bergizi.',
                'price' => 10900.00,
                'image' => 'image/roti.jpg',
                'stock' => 60,
                'category' => 'Breads',
                'is_active' => true,
            ],
            [
                'name' => 'Bluberry Pastry',
                'description' => 'Pastry lembut dengan isian blueberry.',
                'price' => 25000.00,
                'image' => 'image/blueberypastry.jpg',
                'stock' => 25,
                'category' => 'Pastry',
                'is_active' => true,
            ],
        ];

        foreach ($products as $p) {
            Product::updateOrCreate(['name' => $p['name']], $p);
        }
    }
}
