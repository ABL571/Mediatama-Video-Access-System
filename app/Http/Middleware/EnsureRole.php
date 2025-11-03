<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!$request->user()) {
            abort(403, 'Unauthorized.');
        }
        if (!in_array($request->user()->role, $roles)) {
            abort(403, 'Unauthorized.');
        }
        return $next($request);
    }
}
