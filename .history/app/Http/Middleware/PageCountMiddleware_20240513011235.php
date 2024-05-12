<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PageCountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $count = $request->session()->get('page_count', 0);
        $count++;
        $request->session()->put('page_count', $count);
        \View::share('page_count', $count);

        return $next($request);
    }
}
