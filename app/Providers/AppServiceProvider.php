<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Supports\Demo;
use App\Http\Controllers\IndexController;
use App\Repositories\Demo;
use App\Repositories\Interfaces\DemoInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind("demo-facade", function () {
        //     return new Demo();
        // });
        $this->app->bind(DemoInterface::class, Demo::class);
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
