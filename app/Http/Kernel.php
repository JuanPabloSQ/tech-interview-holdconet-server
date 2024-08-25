<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

    protected $middleware = [
        \App\Http\Middleware\CorsMiddleware::class,

    ];

    protected $middlewareGroups = [
        'web' => [
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\ForceJsonResponse::class, 
        ],
    ];

    protected $routeMiddleware = [
    ];
}
