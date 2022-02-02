<?php

namespace App\Providers;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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
        $this->registerPolicies();

        Gate::define('model-delete',function($user,Model $model){
            return $user->id==$model->user_id ? Response::allow()
            : Response::deny($model->error_auth ?? 'You must be an administrator.');
        });

        // Gate::define('article-delete',function($user,$article){
        //     return $user->id==$article->user_id;
        // });


    }
}
