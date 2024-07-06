<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Middleware\EnsureEmailIsVerified;

class GuestOrVerified extends EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $redirectToRoute= null): Response
    {
        if (!$request->user()) {
            return $next($request);
        }

        return parent::handle($request, $next, $redirectToRoute);
    }
}
