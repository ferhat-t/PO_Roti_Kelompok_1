<?php

namespace App\Http\Middleware; // Sesuaikan namespace jika perlu
// Tambahkan baris ini di bagian atas
use Illuminate\Support\Facades\Auth; 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Menggunakan Auth facade lebih disukai oleh IDE (VS Code)
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        return redirect('/')->with('error', 'Anda tidak memiliki akses admin.');
    }
}