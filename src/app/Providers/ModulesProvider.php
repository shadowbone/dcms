<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use View;

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
                  $this->mapWebRoutes(
                    $nameSpace, 
                    base_path('app/Modules/'. $value . '/routes/web.php'),
                    'web',
                    strtolower($value)
                    );
            }

            if (file_exists(base_path('app/Modules/'. $value . '/routes/api.php'))) {
                  $this->mapWebRoutes(
                    $nameSpace, 
                    base_path('app/Modules/'. $value . '/routes/web.php'),
                    'api',
                    strtolower($value)
                    );
            }
            View::addLocation(base_path('app/Modules/'. $value . '/views'));
        }
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes($namespace = null, $group = null, $middleware = 'web', $prefix = '')
    {
        Route::middleware($middleware)
             ->namespace($namespace)
             ->prefix($prefix)
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
