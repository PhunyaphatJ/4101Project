<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectUsersTo(function(Request $request) {
            if (Auth::check()) {
                $role = Auth::user()->role;
                if ($role === 'admin') {
                    return '/admin/manage_application/approval';
                } elseif ($role === 'professor') {
                    return '/professor';
                } elseif ($role === 'student') {
                    return '/student/manual';
                } else {
                    abort(403, 'Unauthorized action.');
                }
            }
            return '/'; 
        });
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \App\Http\Middleware\Role::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
