<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class studentloginmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $email=$request->session()->get('email');
        $role=$request->session()->get('role');
        if ($role === '3') {
            return $next($request);
        } 
         else {
            return redirect('/student-login');
        }

        // return $next($request);
    }
}
