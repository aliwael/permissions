<?php

namespace Aliwael\Permissions\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();
        if (!$user || !$user->roles()->where('name', $role)->exists()) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
