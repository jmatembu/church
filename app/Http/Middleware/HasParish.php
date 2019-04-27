<?php

namespace App\Http\Middleware;

use Closure;

class HasParish
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
        if ($request->parish) {
            return $next($request);
        }

        if ($request->user() && empty($request->user()->current_parish)) {
            return redirect()
                    ->route('users.account')
                    ->with('status', 'You need to set your default parish first');
        }
        return $next($request);
    }
}
