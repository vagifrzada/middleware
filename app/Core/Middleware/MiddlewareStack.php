<?php

namespace App\Core\Middleware;

use App\Http\Request;
use Closure;

/**
 * Class MiddlewareStack
 * @package App\Core\Middleware
 */
class MiddlewareStack
{
    private Closure $start;

    public function __construct()
    {
        $this->start = function (Request $request) {
            var_dump("Initial (last) middleware !");
            return $request;
        };
    }

    public function push(Middleware $middleware)
    {
        $next = $this->start;

        $this->start = fn (Request $request) => $middleware($next, $request);
    }

    public function process(Request $request)
    {
        return call_user_func($this->start, $request);
    }
}
