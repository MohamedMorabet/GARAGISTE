<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('home.admin');
                case 'mechanical':
                    return redirect()->route('home.mechanical');
                case 'client':
                    return redirect()->route('home.client');
                default:
                    return redirect('/'); // Default redirect if no role matches
            }
        }

        return $next($request);
    }
}
