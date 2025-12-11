<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        // --- DATA LOKASI YANG DIBUTUHKAN OLEH VIEW ---
        // Array ini harus memiliki kunci 'name', 'address', dan 'maps'
        $locations = [
            [
                'name' => 'Cabang Majapahit',
                'address' => 'Jl. Majapahit No. 123, Semarang',
                'maps' => 'https://maps.app.goo.gl/example1' // Ganti dengan URL Maps yang valid
            ],
            [
                'name' => 'Cabang Pemuda',
                'address' => 'Jl. Pemuda No. 45, Semarang',
                'maps' => 'https://maps.app.goo.gl/example2' // Ganti dengan URL Maps yang valid
            ],
            [
                'name' => 'Cabang Gajah Mada',
                'address' => 'Jl. Gajah Mada No. 67, Semarang',
                'maps' => 'https://maps.app.goo.gl/example3' // Ganti dengan URL Maps yang valid
            ],
            [
                'name' => 'Cabang Candi',
                'address' => 'Jl. Candi No. 89, Semarang',
                'maps' => 'https://maps.app.goo.gl/example4' // Ganti dengan URL Maps yang valid
            ],
        ];

        // --- MENGIRIM DATA KE VIEW ---
        // Variabel $locations dikirim ke view 'location.index'
        return view('location.index', [
            'locations' => $locations
        ]);
    }
}