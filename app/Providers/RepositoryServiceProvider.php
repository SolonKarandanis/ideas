<?php

namespace App\Providers;

use App\Repositories\CommentRepository;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\IdeaRepository;
use App\Repositories\IdeaRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(IdeaRepositoryInterface::class,IdeaRepository::class);
        $this->app->bind(CommentRepositoryInterface::class,CommentRepository::class);
//        $this->app->bind(PostRepositoryInterface::class,PostRepository::class);
//        $this->app->bind(AccountRepositoryInterface::class,AccountRepository::class);
    }

    public function boot(): void
    {
    }
}
