<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\AuthJwtMiddleware;
use App\Http\Middleware\GuestJwtMiddleware;
use App\Http\Middleware\IsAdminJwtMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'isJwt' => AuthJwtMiddleware::class,
            'isGuest' => GuestJwtMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
