<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Doctor
{
//  TODO: Ensure middleware is functional Video number 27 and 37
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Illuminate\Support\Facades\Auth::user()->role_id == 1)
        {
          return $next($request);
        }
        else
        {
          return redirect()->back();
        }
    }
}
