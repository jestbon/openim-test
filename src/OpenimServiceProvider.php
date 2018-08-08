<?php

namespace Anson\Openim;

use Illuminate\Support\ServiceProvider;

class OpenimServiceProvider extends ServiceProvider
{
    protected $defer = true; // 延时加载服务

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'Openim'); // 视图目录指定
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/openim'),  // 发布视图目录到resources 下
            __DIR__.'/config/openim.php' => config_path('openim.php'), // 发布配置文件到 laravel 的config 下
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务
        $this->app->singleton('openim', function ($app) {
            return new Openim($app['session'], $app['config']);
        });
    }

    public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['openim'];
    }
}
