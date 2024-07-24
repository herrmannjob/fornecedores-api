<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * O caminho de exceções onde CSRF não será verificado.
     *
     * @var array
     */
    protected $except = [
        // Adicione as exceções aqui, se necessário.
    ];
}
