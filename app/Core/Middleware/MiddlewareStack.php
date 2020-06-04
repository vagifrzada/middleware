<?php

namespace App\Core\Middleware;

use Closure;
use App\Http\Request;

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
            dump("Initial (last) middleware !");
            return $request;
        };
    }

    public function push(Middleware $middleware): void
    {
        $next = $this->start;

        $this->start = fn (Request $request) => $middleware($next, $request);
    }

    public function process(Request $request)
    {
        return call_user_func($this->start, $request);
    }
}
