<?php

namespace Modules;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Modules\Blog\Services\Demo;

class ModuleServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Khai báo các thư mục config
        $configFile = [
            'blog' => __DIR__ . '/Blog/configs/blog.php'
        ];
        foreach ($configFile as $alias => $path) {
            $this->mergeConfigFrom($path, $alias);
        }

        // Khai báo middleware
        $middleare = [
            'blog' => 'Modules\Blog\src\Http\Middlewares\BlogMiddleware',
        ];
        foreach ($middleare as $key => $value) {
            $this->app['router']->pushMiddlewareToGroup($key, $value);
        }

        // Command
        $this->commands([
            'Modules\Blog\src\Commands\BlogCommand'
        ]);

        // khai báo facade
        $this->app->bind('demo', function () {
            return new Demo(1, 1);
        });
    }

    public function boot()
    {
        Broadcast::routes();
        $directories = array_map('basename', File::directories(__DIR__));
        foreach ($directories as $moduleName) {
            $this->registerModule($moduleName);
            require __DIR__ . "/$moduleName/routes/channels.php";
        }
    }

    private function registerModule($moduleName)
    {
        $modulePath = __DIR__ . "/$moduleName/";

        // Khai báo route
        if (File::exists($modulePath . "routes/routes.php")) {
            $this->loadRoutesFrom($modulePath . "routes/routes.php");
        }

        // Khai báo migration
        // Toàn bộ file migration của modules sẽ tự động được load
        if (File::exists($modulePath . "migrations")) {
            $this->loadMigrationsFrom($modulePath . "migrations");
        }

        // Khai báo languages
        if (File::exists($modulePath . "resources/langs")) {
            // Đa ngôn ngữ theo file php
            // Dùng đa ngôn ngữ tại file php resources/lang/en/general.php : @lang('Demo::general.hello')
            $this->loadTranslationsFrom($modulePath . "resources/langs", $moduleName);
            // Đa ngôn ngữ theo file json
            $this->loadJSONTranslationsFrom($modulePath . 'resources/langs');
        }

        // Khai báo views
        // Gọi view thì ta sử dụng: view('Demo::index'), @extends('Demo::index'), @include('Demo::index')
        if (File::exists($modulePath . "resources/views")) {
            $this->loadViewsFrom($modulePath . "resources/views", $moduleName);
        }

        // Khai báo helpers
        if (File::exists($modulePath . "helpers")) {
            // Tất cả files có tại thư mục helpers
            $helper_dir = File::allFiles($modulePath . "helpers");
            // khai báo helpers
            foreach ($helper_dir as $key => $value) {
                $file = $value->getPathName();
                require $file;
            }
        }
    }
}
