<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\ResponseController;
use Closure;
use Illuminate\Http\Request;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        $user = $request->user();
        // return ResponseController::getResponse($user, 401, 'Unauthorized');

        // return $user;
        if ($user->hasPermissionTo($permission)) {
            return $next($request);
        }

        return ResponseController::getResponse($user, 401, 'Unauthorized');
    }
}
