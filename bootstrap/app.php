<?php


use App\Http\Middleware\AdminRoleMiddleware;
use App\Http\Middleware\AuthenticateAndVerify;
use App\Http\Middleware\ClientRoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;











return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth.verify' => AuthenticateAndVerify::class,
            'admin' => AdminRoleMiddleware::class,
            'client' => ClientRoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
