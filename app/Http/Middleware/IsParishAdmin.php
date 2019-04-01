<?php

namespace App\Http\Middleware;

use Closure;

class IsParishAdmin
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
        if ($request->user() && ! $request->user()->isParishAdministrator()) {
            abort(403);
        }

        return $next($request);
    }
}
