<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('isLogin')) {
            if (session()->get('isLogin') === false) {
                return redirect()->route('users.login');
            }
            return $next($request);
        } else {
            return redirect()->route('users.login');
        }
    }
}
