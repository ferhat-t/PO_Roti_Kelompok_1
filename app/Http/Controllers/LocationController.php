<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $location = [
            'name' => 'Universitas Muhammadiyah Semarang',
            'address' => 'Jl. Kedungmundu Raya No.18, Semarang',
            'city' => 'Semarang',
            'lat' => -7.025253,
            'lng' => 110.457722,
            'description' => 'Universitas Muhammadiyah Semarang (UNIMUS) adalah perguruan tinggi swasta unggulan di Kota Semarang.'
        ];

        return view('location.index', compact('location'));
    }
}
