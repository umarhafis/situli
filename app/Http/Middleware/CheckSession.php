<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('user_id')) { // Sesuaikan dengan session Anda
            return redirect()->route('login')->with('error', 'Harap login terlebih dahulu.');
        }
    
        return $next($request);
    }
}
