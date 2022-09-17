<?php

namespace App\Http\Middleware;

use App\Models\User;
use Auth;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->role == User::ROLE_ADMIN) {
            return $next($request);
       }

       return redirect()->route('home');
    }
}
