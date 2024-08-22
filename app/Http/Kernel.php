<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     */
    protected $middleware = [
        \App\Http\Middleware\CorsMiddleware::class,
        // Otros middleware globales...
    ];

    /**
     * The application's route middleware groups.
     */
    protected $middlewareGroups = [
        'web' => [
            // Middleware del grupo web...
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\CorsMiddleware::class, // Asegúrate de que CORS esté en el grupo 'api'
        ],
    ];

    /**
     * The application's route middleware.
     */
    protected $routeMiddleware = [
        // Middleware específico para rutas...
    ];
}
