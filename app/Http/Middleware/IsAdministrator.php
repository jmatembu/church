<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;

class IsAdministrator
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
        $administrators = config('settings.user_groups.administrators');
        $userEmail = $request->user()->email;
        $adminEmail = Arr::first($administrators, function ($value) use ($userEmail) {
            return $userEmail === $value;
        });

        if ($adminEmail !== $userEmail) {
            abort(403);
        }

        return $next($request);
    }
}
