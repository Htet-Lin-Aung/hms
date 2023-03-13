<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repositories\{RoomRepository,RoomServiceRepository,
    RoomTypeRepository,CustomerRepository};
use App\Repositories\Interfaces\{RoomInterface,RoomServiceInterface,
    RoomTypeInterface,CustomerInterface};

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
