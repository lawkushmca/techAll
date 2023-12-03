<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\HConst;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
//    public function handle(Request $request, Closure $next)
//    {
//        return $next($request);
//    }

    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (auth()->check() && $request->session()->get(HConst::SESSION_ROLE) === HConst::SESSION_ROLE_ADMIN) {
            return $next($request);
        }

        // If the user is not an admin, redirect or respond as needed
        return redirect('/login'); // Redirect to a default page or return a response
    }
}
