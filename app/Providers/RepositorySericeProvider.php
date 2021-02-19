<?php

namespace App\Providers;

use App\Modules\Order\Repositories\OrderRepositoryInterface;
use App\Modules\Order\Repositories\OrderServices;
use Illuminate\Support\ServiceProvider;

class RepositorySericeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderRepositoryInterface::class,OrderServices::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
