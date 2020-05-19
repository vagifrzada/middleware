<?php

namespace App\Http;

/**
 * Class Request
 * @package App\Http
 */
class Request
{
    public int $code = 200;
    public string $response;

    public function ajax(): bool
    {
        return true;
    }
}