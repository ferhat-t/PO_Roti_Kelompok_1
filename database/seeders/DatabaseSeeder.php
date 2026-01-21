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
                'name' => 'Chocolate Chip Cookie',
                'description' => 'Cookie lezat dengan chocolate chip premium yang meleleh di mulut. Dibuat dengan mentega berkualitas tinggi dan cokelat pilihan.',
                'price' => 35000,
                'stock' => 50,
                'image' => 'chocolate-chip-cookie.jpg'
            ],
            [
                'name' => 'Roti Papa Cookies Original',
                'description' => 'Roti Papa Cookies dengan resep original yang sudah terkenal. Rasa manis yang pas dan tekstur yang lembut.',
                'price' => 30000,
                'stock' => 100,
                'image' => 'papa-cookies-original.jpg'
            ],
            [
                'name' => 'Cheese Bread',
                'description' => 'Roti keju dengan isian keju yang melimpah. Cocok untuk sarapan atau camilan sore.',
                'price' => 25000,
                'stock' => 75,
                'image' => 'cheese-bread.jpg'
            ],
            [
                'name' => 'Vanilla Cake',
                'description' => 'Kue vanilla lembut dengan topping cream cheese yang nikmat. Sempurna untuk berbagai acara.',
                'price' => 120000,
                'stock' => 20,
                'image' => 'vanilla-cake.jpg'
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