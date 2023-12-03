<?php

namespace App\Http\Middleware;

use App\Helpers\HConst;
use Closure;
use Illuminate\Http\Request;

class IsEmployee
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
        if (auth()->check() && $request->session()->get(HConst::SESSION_ROLE) === HConst::SESSION_ROLE_MEMBER) {
            return $next($request);
        }

        // If the user is not an employee, redirect or respond as needed
        return redirect('/login'); // Redirect to a default page or return a response
    }

}
