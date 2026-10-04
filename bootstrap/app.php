<?php

use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\setlocallang;
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
        'PoliceMan' => EnsureTokenIsValid::class]);
        ///middlewareabout login
        $middleware->redirectGuestsTo(function(){
            return route('courses_login.courses_login');
        });
 //$middleware->append(EnsureTokenIsValid::class);

$middleware->web(append:[setlocallang::class]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
