<?php

namespace Gurpreetsinghin\VaultsSecurity;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Arr;
use Gurpreetsinghin\VaultsSecurity\Traits\Core;
use Gurpreetsinghin\VaultsSecurity\Traits\VaultsSecurity;

class ProjectSecurityServiceProvider extends ServiceProvider
{


    use Core, VaultsSecurity;

    /**
     * Register services.
     *
     * @return void
     */
    public function register(){
        
        $this->app->make('Gurpreetsinghin\VaultsSecurity\Controllers\Admin\AuthController');
        $this->mergeConfigFrom(
            __DIR__.'/config/auth.php', 'auth'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(){
        
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'project-security');
        // $this->publishes([
        //     __DIR__.'/views' => base_path('resources/views/gurpreetsingh/project-security'),
        // ]);
        $this->publishes([
            __DIR__.'/assets' => public_path('vendor/gurpreetsingh/project-security'),
        ], 'public');

        $this->publishes([
            __DIR__.'/config/auth.php' => config_path('auth.php')
        ], 'config');
        
        if(isset($_SERVER['HTTP_HOST'])){
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            if (strpos($actual_link, url('/project-security')) === false) {
                // dd('dsssd');
                $this->securityCheck();
            }
        }
    }

    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);

        $this->app['config']->set($key, $this->mergeConfig(require $path, $config));
    }

    protected function mergeConfig(array $original, array $merging)
    {
        $array = array_merge($original, $merging);

        foreach ($original as $key => $value) {
            if (! is_array($value)) {
                continue;
            }

            if (! Arr::exists($merging, $key)) {
                continue;
            }

            if (is_numeric($key)) {
                continue;
            }

            $array[$key] = $this->mergeConfig($value, $merging[$key]);
        }

        return $array;
    }
}
