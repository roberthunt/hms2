<?php

namespace App\Providers;

use HMS\Auth\UserManagerUserProvider;
use HMS\Contracts\Auth\UserManager;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate, UserManager $userManager)
    {
        $this->registerPolicies($gate);

        Auth::provider('kerberos', function($app, array $config) use ($userManager) {

            return new UserManagerUserProvider($app['hash'], $config['model'], $userManager);
        });
    }
}
