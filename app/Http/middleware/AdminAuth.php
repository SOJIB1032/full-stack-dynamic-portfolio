<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        // যদি অ্যাডমিন লগইন না করে থাকে
        if (!Session::get('is_admin')) {
            return redirect('/admin/login')->with('error', 'Please login first.');
        }

        return $next($request);
    }
}
