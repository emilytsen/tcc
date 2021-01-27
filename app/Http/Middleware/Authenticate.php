<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next)
    {
        if (session('usuario')==null)
        {
            return redirect("/login");
        }
        return $next($request);
    }
}
