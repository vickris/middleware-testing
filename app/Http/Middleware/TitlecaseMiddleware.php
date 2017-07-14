<?php

namespace App\Http\Middleware;

use Closure;

class TitlecaseMiddleware
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
        if ($request->title) {
            $request->merge([
                'title' => title_case($request->title)
            ]);
        }

        return $next($request);
    }
}
