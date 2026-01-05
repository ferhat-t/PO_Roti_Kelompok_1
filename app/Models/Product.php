<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tambahkan ini jika nama tabel Anda bukan 'products'
    // protected $table = 'products';

    // Daftarkan kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'name',
        'price',
        'stock',
        'image',
        'description'
    ];
}