<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Response;
class BasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $email =  Request::header('PHP_AUTH_USER');
        $password =  Request::header('PHP_AUTH_PW');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if (! \Auth::User()) {
                return Response::json(['message'=>'Bad Request'], 401);
            }
            return $next($request);
        }
        return Response::json(['message'=>'unauthorized'], 401);

    }
}
