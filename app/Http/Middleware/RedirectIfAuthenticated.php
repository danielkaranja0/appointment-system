<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Check the user's role and redirect accordingly
                $user = Auth::user();
                // if ($user->role === 'ceo') {
                //     return redirect()->route('ceo.dashboard');
                // } elseif ($user->role === 'manager') {
                //     return redirect()->route('manager.dashboard');
                // } elseif ($user->role === 'secretary') {
                //     return redirect()->route('secretary.dashboard');
                // } else {
                //     // Handle default redirection if the user's role is not recognized
                //     return redirect(RouteServiceProvider::HOME);
                // }
            }
        }

        return $next($request);
    }
}
