<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends \Illuminate\Auth\Middleware\Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            $guard = $this->auth->guard();
            switch ($guard->name) {
                case 'web':
                    return route('medico.login');
                case 'admin':
                    return route('admin.login');
                default:
                    return route('login');
            }
        }
    }
}
