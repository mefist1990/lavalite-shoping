<?php

namespace Laracart\Order\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Laracart\Order\Models\Order;
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
    protected $namespace = 'Laracart\Order\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param   \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot()
    {
        parent::boot();

        if (Request::is('*/order/order/*')) {
            Route::bind('order', function ($order) {
                $orderrepo = $this->app->make('\Laracart\Order\Interfaces\OrderRepositoryInterface');
                return $orderrepo->findorNew($order);
            });
        }
        if (Request::is('*/order/order_status/*')) {
            Route::bind('order_status', function ($order_status) {
                $order_statusrepo = $this->app->make('\Laracart\Order\Interfaces\OrderStatusRepositoryInterface');
                return $order_statusrepo->findorNew($order_status);
            });
        }
        if (Request::is('*/order/order_history/*')) {
            Route::bind('order_history', function ($order_history) {
                $order_historyrepo = $this->app->make('\Laracart\Order\Interfaces\OrderHistoryRepositoryInterface');
                return $order_historyrepo->findorNew($order_history);
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

        $this->mapApiRoutes();

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
