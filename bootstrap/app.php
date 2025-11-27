<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo(fn(Request $request)=>'/login');
        $middleware->redirectUsersTo(function(Request $request){
            if($request->user()->role_id == 1){
                return '/admin/dashboard';
            }else if($request->user()->role_id==2){
                return '/teacher/dashboard';
            } 
            return '/dasbhaord';
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
