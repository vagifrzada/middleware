<?php

namespace App\Core\Middleware;

use Closure;
use App\Http\Request;

/**
 * Interface Middleware
 * @package App\Core\Middleware
 */
interface Middleware
{
    public function __invoke(Closure $next, Request $request);
}