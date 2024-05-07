<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Http;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::if('isPermissions', function ($permission) {
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
            return ($response['data']);
        });
        Blade::if('isRole', function ($roles = []) {
            if (empty($roles)) {
                return false;
            }
            $session = new Session();
            $role_name = $session->get('role_name');
            return in_array($role_name, $roles);
        });
        Blade::if('isDivision', function ($divisions = []) {
            if (empty($divisions)) {
                return false;
            }
            $session = new Session();
            $division_name = $session->get('division_name');
            return in_array($division_name, $divisions);
        });
    }
} 
