<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Auth\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthGates
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
        $user = Auth::user();
        $passed = false;
        if (!app()->runningInConsole() && $user) {
            $roleInfo = Auth::user()->roles->first();

        }
        if (!empty($passed)) {
            if (!$passed) {
                return redirect('/home');
            }
        }

        return $next($request);
    }
}
