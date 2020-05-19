<?php

namespace App\Http\Middleware;

use App\Http\Request;
use Closure;
use App\Core\Middleware\Middleware;

/**
 * Class FirstMiddleware
 * @package App\Http\Middleware
 */
class FirstMiddleware implements Middleware
{
    public function __invoke(Closure $next, Request $request)
    {
        var_dump("First middleware");

        if ($request->ajax()) {
            // not authorized
            $request->code = 401;
            $request->response = 'json';
        }

        return $next($request);
    }
}