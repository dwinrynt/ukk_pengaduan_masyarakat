<?php

namespace App\Http\Middleware;

use Closure, Auth;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,  ...$roles)
    {
        foreach($roles as $role){
            if ($role == Auth::user()->role) {
                return $next($request);
            }
        }
        abort(403);
    }
}
