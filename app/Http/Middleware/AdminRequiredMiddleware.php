<?php

namespace App\Http\Middleware;

use Closure;

class AdminRequiredMiddleware
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
        // Check if a user is logged in.
        if (!$user = $request->user())
            return $next($request);

        if ($user->isAdmin)
            return $next($request);

        return abort(403);
    }
}
