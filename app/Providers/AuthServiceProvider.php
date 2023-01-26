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
        //
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->role_id === 1;
        });
        Gate::define('blog.create', function ($user) {
            return $user->role_id === 1 || $user->role_id === 2 || $user->role_id === 3;
        });
        
        Gate::define('blog.edit', function ($user, $blog) {
            if ($user->role_id === 1) {
                return true;
            } elseif ($user->role_id === 2 && $blog->user_id === $user->id) {
                return true;
            } elseif ($user->role_id === 3 && ($blog->user_id === $user->id || $blog->user->role_id === 2)) {
                return true;
            } else {
                return false;
            }
        });
        
        Gate::define('blog.delete', function ($user, $blog) {
            if ($user->role_id === 1) {
                return true;
            } elseif ($user->role_id === 2 && $blog->user_id === $user->id) {
                return true;
            } elseif ($user->role_id === 3 && ($blog->user_id === $user->id || $blog->user->role_id === 2)) {
                return true;
            } else {
                return false;
            }
        });

        Gate::define('blog.validate', function($user, $blog){
            if ($user->role_id === 1) {
                return true;
            } elseif ($user->role_id === 3 && ($blog->user_id === $user->id || $blog->user->role_id === 2)) {
                return true;
            } else {
                return false;
            }
        });

        Gate::define('product', function(){
            if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2) {
                return true;
            }
        });

        Gate::define('edit-user', function ($user,$users) {
            return ($user->role_id === 1 && $users->role_id != 1) || ($user->role_id === 1 && $users->role_id == 1) && $user->id == $users->id ;
        });
        
        Gate::define('delete-user', function ($user,$users) {
            return ($user->role_id === 1 && $users->role_id != 1);
        });
    }
}
