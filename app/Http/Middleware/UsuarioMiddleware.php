<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsuarioMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->rol === 'usuario') {
            return $next($request);
        }

        abort(403, 'No tienes permiso para acceder como usuario.');
    }
}
