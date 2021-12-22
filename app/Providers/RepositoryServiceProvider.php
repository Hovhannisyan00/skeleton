<?php

namespace App\Providers;

use App\Contracts\Article\IArticleRepository;
use App\Contracts\File\IFileRepository;
use App\Contracts\Role\IRoleRepository;
use App\Contracts\User\IUserRepository;
use App\Repositories\Article\ArticleRepository;
use App\Repositories\File\FileRepository;
use App\Repositories\Role\RoleRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // UserRepository registration
        $this->app->singleton(IUserRepository::class, UserRepository::class);

        // RoleRepository registration
        $this->app->singleton(IRoleRepository::class, RoleRepository::class);

        // FileRepository registration
        $this->app->singleton(IFileRepository::class, FileRepository::class);

        // ArticleRepository registration
        $this->app->singleton(IArticleRepository::class, ArticleRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
