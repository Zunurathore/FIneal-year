<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class supervisorloginmiddleware
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
        if ($role === '2') {
            return $next($request);
        } 
         else {
            return redirect('supervisor-login');
        }
        
        // return $next($request);
    }
}
