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
        if ($request->is('user-form')) {
            $count = $request->session()->get('specific_page_count', 0);
            $count++;
            $request->session()->put('specific_page_count', $count);
        }

        return $next($request);
    }
}
