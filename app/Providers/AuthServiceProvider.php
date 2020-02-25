<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\UsuariosPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         //'App\User' => 'App\Policies\ModelPolicy',
		User::class => UsuariosPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('administradores', 'App\Policies\UsuariosPolicy@administradores');
		
		Gate::define('medicos', 'App\Policies\UsuariosPolicy@medicos');

    }
}
