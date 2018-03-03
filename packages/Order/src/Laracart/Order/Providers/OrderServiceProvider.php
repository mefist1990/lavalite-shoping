<?php

namespace Laracart\Order\Providers;

use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../../../../resources/views', 'order');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../../../resources/lang', 'order');

        // Call pblish redources function
        $this->publishResources();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Bind facade
        $this->app->bind('order', function ($app) {
            return $this->app->make('Laracart\Order\Order');
        });

// Bind Order to repository
        $this->app->bind(
            \Laracart\Order\Interfaces\OrderRepositoryInterface::class,
            \Laracart\Order\Repositories\Eloquent\OrderRepository::class
        );
        // Bind OrderStatus to repository
        $this->app->bind(
            \Laracart\Order\Interfaces\OrderStatusRepositoryInterface::class,
            \Laracart\Order\Repositories\Eloquent\OrderStatusRepository::class
        );
        // Bind OrderHistory to repository
        $this->app->bind(
            \Laracart\Order\Interfaces\OrderHistoryRepositoryInterface::class,
            \Laracart\Order\Repositories\Eloquent\OrderHistoryRepository::class
        );

        $this->app->register(\Laracart\Order\Providers\AuthServiceProvider::class);
        $this->app->register(\Laracart\Order\Providers\EventServiceProvider::class);
        $this->app->register(\Laracart\Order\Providers\RouteServiceProvider::class);
        // $this->app->register(\Laracart\Order\Providers\WorkflowServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['order'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../../../config/config.php' => config_path('laracart/order.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../../../resources/views' => base_path('resources/views/vendor/order')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../../../resources/lang' => base_path('resources/lang/vendor/order')], 'lang');

        // Publish migrations
        $this->publishes([__DIR__ . '/../../../../database/migrations/' => base_path('database/migrations')], 'migrations');

        // Publish seeds
        $this->publishes([__DIR__ . '/../../../../database/seeds/' => base_path('database/seeds')], 'seeds');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
