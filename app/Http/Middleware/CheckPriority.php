<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPriority
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->priority == 0) {
            return redirect()->route('products'); // Cambia 'error' por la ruta a la que quieres redirigir
        }

        if (auth()->check() && auth()->user()->priority == 0) {
            return redirect()->route('categories'); // Cambia 'error' por la ruta a la que quieres redirigir
        }
    
        return $next($request);
    }
    
}
