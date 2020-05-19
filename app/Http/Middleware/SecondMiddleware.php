<?php

namespace App\Http\Middleware;

use App\Http\Request;
use Closure;
use App\Core\Middleware\Middleware;

/**
 * Class SecondMiddleware
 * @package App\Http\Middleware
 */
class SecondMiddleware implements Middleware
{
    public function __invoke(Closure $next, Request $request)
    {
        var_dump("Second middleware");

        return $next($request);
    }
}