<?php

namespace App\Core;

use App\Core\Middleware\Middleware;
use App\Core\Middleware\MiddlewareStack;
use App\Http\Request;

/**
 * Class App
 * @package App\Core
 */
class App
{
    private MiddlewareStack $middlewareStack;

    public function __construct(MiddlewareStack $middlewareStack)
    {
        $this->middlewareStack = $middlewareStack;
    }

    public function add(Middleware $middleware)
    {
        $this->middlewareStack->push($middleware);
    }
    
    public function run()
    {
        $request = $this->middlewareStack->process(new Request());

        dd('App is running ...', ['status' => $request->code]);
    }
}