<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

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
        $session = new Session();
        $token = $session->get('access_token');
        $user_guid = $session->get('guid');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(
            env("URL_API", "http://example.com") . '/api/v1/user/check/permissions',
            [
                'user_guid' => $user_guid,
                'permission' => $permission
            ]
        );
        if (isset($response['data'])) {
            return $next($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}
