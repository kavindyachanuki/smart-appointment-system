<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccessToken
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->has('token') || $request->token !== 'secret123') {
            return response('Access Denied. Token missing or invalid.', 403);
        }

        return $next($request);
    }
}
