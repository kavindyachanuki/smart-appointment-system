<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected array $middleware = [
       
        \Illuminate\Http\Middleware\HandleCors::class,
       
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    protected array $middlewareGroups = [
        'web' => [
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            \Illuminate\Routing\Middleware\ThrottleRequests::class . ':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];  

    protected array $middlewareAliases = [
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        //'token' => \App\Http\Middleware\CheckAccessToken::class,
    ];
}
