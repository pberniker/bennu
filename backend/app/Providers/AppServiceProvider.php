<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EloquentPersistRepository;
use App\Repositories\EloquentUserRepository;
use Domain\Repositories\PersistRepository;
use Domain\Repositories\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [        
        PersistRepository::class => EloquentPersistRepository::class,        
        UserRepository::class => EloquentUserRepository::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
