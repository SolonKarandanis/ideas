<?php

namespace App\Providers;

use App\Repositories\IdeaRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\IdeaService;
use App\Services\IdeaServiceInterface;
use App\Services\UserService;
use App\Services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, function ($app){
            return new UserService($app->make(UserRepositoryInterface::class));
        });
        $this->app->bind(IdeaServiceInterface::class, function ($app){
            return new IdeaService($app->make(IdeaRepositoryInterface::class));
        });
    }

    public function boot(): void
    {

//        $this->app->bind(AccountServiceInterface::class, function ($app){
//            return new AccountService(
//                $app->make(UserServiceInterface::class),
//                $app->make(TransactionServiceInterface::class),
//                $app->make(TransferServiceInterface::class),
//                $app->make(AccountRepositoryInterface::class)
//            );
//        });
    }
}
