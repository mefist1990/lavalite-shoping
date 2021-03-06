<?php

namespace Laracart\Filter\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Laracart\Filter\Models\Filter;
use Request;
use Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Laracart\Filter\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param   \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot()
    {
        parent::boot();

        if (Request::is('*/filter/filter/*')) {
            Route::bind('filter', function ($filter) {
                $filterrepo = $this->app->make('\Laracart\Filter\Interfaces\FilterRepositoryInterface');
                return $filterrepo->findorNew($filter);
            });
        }
if (Request::is('*/filter/filter_group/*')) {
            Route::bind('filter_group', function ($filter_group) {
                $filter_grouprepo = $this->app->make('\Laracart\Filter\Interfaces\FilterGroupRepositoryInterface');
                return $filter_grouprepo->findorNew($filter_group);
            });
        }

    }

    /**
     * Define the routes for the package.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        // $this->mapApiRoutes();

        //
    }

    /**
     * Define the "web" routes for the package.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
            'prefix' => trans_setlocale(),
        ], function ($router) {
            require (__DIR__ . '/../../../../routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the package.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace . '\Api',
            'prefix' => trans_setlocale() . '/api',
        ], function ($router) {
            require (__DIR__ . '/../../../../routes/api.php');
        });
    }
}
