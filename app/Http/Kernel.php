<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Daftar middleware global
    ];

    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'check.authenticated' => \App\Http\Middleware\CheckAuthenticated::class,
        'check.session' => \App\Http\Middleware\CheckSession::class,
        'isSuperAdmin' => \App\Http\Middleware\IsSuperAdmin::class,
    ];
}
