<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\User;
use App\Policies\BlogPolicy;
use Illuminate\Support\Facades\Gate;
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
        Blog::class => BlogPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-blog', function () {
            return Auth::user()->role_id != 2   ;
        });

        Gate::define('edit-blog', function (User $user) {
            $blog = Blog::all()->where('user_id', $user->id);
            if (Auth::user()->role_id == 1) {
                return true;
            }else if ($user->role_id === 3) {
                return true;
            }else if ($user->role->role_id === 4) {
                return true;
            }
            return false;
        });
        

        Gate::define('delete-blog', function () {
            $blog = Blog::all();
            if (Auth::user()->role_id == 1) {
                return true;
            }else if (Auth::user()->role_id == 3) {
                return true;
            }else if (Auth::user()->role_id == 4) {
                return true;
            }
            return false;
        });
        
        Gate::define('validate-blog', function () {
            return Auth::user()->role_id == 4;
        });
    }
}
