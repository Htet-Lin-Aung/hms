<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repositories\{RoomRepository,RoomServiceRepository,
    RoomTypeRepository,CustomerRepository,PermissionRepository,RoleRepository,UserRepository};
use App\Repositories\Interfaces\{RoomInterface,RoomServiceInterface,
    RoomTypeInterface,CustomerInterface,PermissionInterface,RoleInterface,UserInterface};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RoomInterface::class,RoomRepository::class);
        $this->app->bind(RoomServiceInterface::class,RoomServiceRepository::class);
        $this->app->bind(RoomTypeInterface::class,RoomTypeRepository::class);
        $this->app->bind(CustomerInterface::class,CustomerRepository::class);
        $this->app->bind(PermissionInterface::class,PermissionRepository::class);
        $this->app->bind(RoleInterface::class,RoleRepository::class);
        $this->app->bind(UserInterface::class,UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
