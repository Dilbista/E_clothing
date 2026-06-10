<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\UserType;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Please login first.');
        }

        if (!in_array(Auth::user()->role_id, [
            UserType::ADMIN->value,
            UserType::SELLER->value,
        ])) {
            return redirect()->route('Home')
                ->with('error', 'Access denied.');
        }

        return $next($request);
    }
}