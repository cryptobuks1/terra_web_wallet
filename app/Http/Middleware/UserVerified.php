<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserVerified
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->isUser()) {
                if (!Auth::user()->google2fa_enable || !Auth::user()->profile_path || !Auth::user()->kycVerification) {
                    return redirect(route('welcome'));
                } else {
                    return $next($request);
                }
            } else {
                if (!Auth::user()->google2fa_enable || !Auth::user()->profile_path || !Auth::user()->kycVerification) {
                    return redirect(route('welcome'));
                } else {
                    return $next($request);
                }
            }

        }

        abort(404);
    }
}
