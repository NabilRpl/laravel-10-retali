<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class authApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah ada token di header Authorization
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['error' => 'Unauthorized null'], Response::HTTP_UNAUTHORIZED);
        }

        try {
            // Verifikasi token, misalnya menggunakan JWT
            // (Jika menggunakan Passport, dapat menggunakan Auth::user())
            $user = Auth::guard('api')->user();  // Gunakan guard 'api' jika pakai Passport atau JWT

            if (!$user) {
                return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
            }
            
            // Teruskan ke request berikutnya
            return $next($request);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
