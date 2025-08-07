<?php

namespace Permissions\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    public function handle($request, Closure $next, $permission)
    {
        $user = Auth::user();
        if (!$user || !$user->permissions()->where('name', $permission)->exists()) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
