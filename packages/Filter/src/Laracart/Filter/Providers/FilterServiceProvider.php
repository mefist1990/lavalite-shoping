<?php

namespace Laracart\Filter\Providers;

use Illuminate\Support\ServiceProvider;

class FilterServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__ . '/../../../../resources/views', 'filter');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../../../resources/lang', 'filter');

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
        $this->app->bind('filter', function ($app) {
            return $this->app->make('Laracart\Filter\Filter');
        });

// Bind Filter to repository
        $this->app->bind(
            \Laracart\Filter\Interfaces\FilterRepositoryInterface::class,
            \Laracart\Filter\Repositories\Eloquent\FilterRepository::class
        );
        // Bind FilterGroup to repository
        $this->app->bind(
            \Laracart\Filter\Interfaces\FilterGroupRepositoryInterface::class,
            \Laracart\Filter\Repositories\Eloquent\FilterGroupRepository::class
        );

        $this->app->register(\Laracart\Filter\Providers\AuthServiceProvider::class);
        $this->app->register(\Laracart\Filter\Providers\EventServiceProvider::class);
        $this->app->register(\Laracart\Filter\Providers\RouteServiceProvider::class);
        // $this->app->register(\Laracart\Filter\Providers\WorkflowServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['filter'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../../../config/config.php' => config_path('laracart/filter.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../../../resources/views' => base_path('resources/views/vendor/filter')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../../../resources/lang' => base_path('resources/lang/vendor/filter')], 'lang');

        // Publish migrations
        $this->publishes([__DIR__ . '/../../../../database/migrations/' => base_path('database/migrations')], 'migrations');

        // Publish seeds
        $this->publishes([__DIR__ . '/../../../../database/seeds/' => base_path('database/seeds')], 'seeds');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
