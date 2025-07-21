<?php

namespace App\Providers;

use App\Repositories\UserRepositoryInterface;
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
