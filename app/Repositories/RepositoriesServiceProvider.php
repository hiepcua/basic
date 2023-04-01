<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Role\RoleRepositoryInterface::class,
            \App\Repositories\Role\RoleRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Permission\PermissionRepositoryInterface::class,
            \App\Repositories\Permission\PermissionRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Product\ProductRepositoryInterface::class,
            \App\Repositories\Product\ProductRepository::class
        );

        $this->app->singleton(
            \App\Repositories\ProductGroup\ProductGroupRepositoryInterface::class,
            \App\Repositories\ProductGroup\ProductGroupRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Province\ProvinceRepositoryInterface::class,
            \App\Repositories\Province\ProvinceRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Ward\WardRepositoryInterface::class,
            \App\Repositories\Ward\WardRepository::class
        );

        $this->app->singleton(
            \App\Repositories\File\FileRepositoryInterface::class,
            \App\Repositories\File\FileRepository::class
        );
    }
}
