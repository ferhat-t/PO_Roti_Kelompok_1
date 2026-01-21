<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat Admin User
        User::create([
            'name' => 'Admin NeedRoti',
            'email' => 'admin@needroti.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        // Buat Customer User
        User::create([
            'name' => 'Customer',
            'email' => 'customer@needroti.com',
            'password' => Hash::make('customer123'),
            'role' => 'customer'
        ]);

        // Buat Sample Products
        $products = [
            [
                'name' => 'Cromboloni',
                'description' => 'Perpaduan sempurna antara croissant renyah dan bomboloni lembut! Diisi dengan cream premium yang creamy, dibuat fresh setiap hari. Tekstur berlapis yang crispy di luar, lembut di dalam.',
                'price' => 25000,
                'stock' => 50,
                'image' => '1768970261.png'
            ],
            [
                'name' => 'Danish Pastry',
                'description' => 'Pastry klasik Eropa dengan lapisan-lapisan adonan yang renyah dan buttery. Dibuat dengan teknik laminating tradisional, menghasilkan tekstur yang ringan dan lembut.',
                'price' => 20000,
                'stock' => 60,
                'image' => '1768970364.png'
            ],
            [
                'name' => 'Cheese Bread',
                'description' => 'Roti keju dengan isian keju yang melimpah. Cocok untuk sarapan atau camilan sore.',
                'price' => 25000,
                'stock' => 75,
                'image' => '1768970423.png'
            ],
            [
                'name' => 'Vanilla Cake',
                'description' => 'Kue vanilla lembut dengan topping cream cheese yang nikmat. Sempurna untuk berbagai acara.',
                'price' => 120000,
                'stock' => 20,
                'image' => '1768970541.png'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        echo "✅ Seeder berhasil! Login credentials:\n";
        echo "Admin - Email: admin@needroti.com | Password: admin123\n";
        echo "Customer - Email: customer@needroti.com | Password: customer123\n";
    }
}