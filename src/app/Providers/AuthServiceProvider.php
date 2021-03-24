<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // shop認証
        Gate::define('isShop',function($user){
            // dd($user->role == 1);
            return $user->role == 2;
        });
        
        // 不要なURIを使わない（パスワードグラントのみ利用）
        Passport::routes(function ($router) {
                $router->forAccessTokens();
            }, ['prefix' => 'api/oauth']);
    }
}
