<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{

    public function handle(Request $request, Closure $next)
    {
        if (auth('web')->check()) {
            return redirect(RouteServiceProvider::HOME);
        }
        if (auth('students')->check()) {
            return redirect(RouteServiceProvider::STUDENT);
        }
        if (auth('my_parents')->check()) {
            return redirect(RouteServiceProvider::PARENT);
        }
        if (auth('teachers')->check()) {
            return redirect(RouteServiceProvider::TEACHER);
        }

        return $next($request);
    }
}