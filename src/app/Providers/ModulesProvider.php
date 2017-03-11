<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ModulesProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $app = app();
        $modules = (require config_path("modules.php"));
        foreach ($modules['modules'] as $key => $value) {
            $nameSpace = 'App\Modules\\'.$value.'\Controllers';
            if (file_exists(base_path('app/Modules/'. $value . '/routes/web.php'))) {
                  $this->mapWebRoutes($nameSpace, base_path('app/Modules/'. $value . '/routes/web.php'));
            }

            if (file_exists(base_path('app/Modules/'. $value . '/routes/api.php'))) {
                  $this->mapWebRoutes($nameSpace, base_path('app/Modules/'. $value . '/routes/web.php'),'api');
            }
        }
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes($namespace = null, $group = null, $middleware = 'web')
    {
        Route::middleware($middleware)
             ->namespace($namespace)
             ->group($group);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
