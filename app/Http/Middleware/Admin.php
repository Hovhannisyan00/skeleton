<?php

namespace App\Http\Middleware;

use App\Models\RoleAndPermission\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class Admin
 * @package App\Http\Middleware
 */
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->hasRole(Role::ROLE_SUPER_ADMIN)){
            return $next($request);
        }

       return abort(404);
    }
}
