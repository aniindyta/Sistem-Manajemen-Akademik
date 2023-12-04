<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\view;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();
        // Gate::policy(User::class, view::class);

        Gate::define('isAdmin', function(User $user){
            return $user->role === 'Admin';
        });

        Gate::define('isDosen', function(User $user){
            return $user->role === 'Dosen';
        });

        Gate::define('isMahasiswa', function(User $user){
            return $user->role === 'Mahasiswa';
        });
    }
}
