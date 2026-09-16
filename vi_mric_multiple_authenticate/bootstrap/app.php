<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AdminRedirect;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\UserRedirect;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // $middleware->redirectTo(
        //     guests: '/admin',
        //     users: '/admin/dashboard'
        // );

        // $middleware->append(AdminMiddleware::class);
        // $middleware->append((UserMiddleware::class));

        $middleware->alias([
            'auth.admin' => AdminMiddleware::class,
            'guest.admin' => AdminRedirect::class,
            'auth.user' => UserMiddleware::class,
            'guest.user' => UserRedirect::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
