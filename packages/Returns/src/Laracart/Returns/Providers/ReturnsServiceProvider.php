<?php

namespace Laracart\Returns\Providers;

use Illuminate\Support\ServiceProvider;

class ReturnsServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__ . '/../../../../resources/views', 'returns');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../../../resources/lang', 'returns');

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
        $this->app->bind('returns', function ($app) {
            return $this->app->make('Laracart\Returns\Returns');
        });

// Bind Returns to repository
        $this->app->bind(
            \Laracart\Returns\Interfaces\ReturnsRepositoryInterface::class,
            \Laracart\Returns\Repositories\Eloquent\ReturnsRepository::class
        );
        // Bind ReturnReason to repository
        $this->app->bind(
            \Laracart\Returns\Interfaces\ReturnReasonRepositoryInterface::class,
            \Laracart\Returns\Repositories\Eloquent\ReturnReasonRepository::class
        );

        $this->app->register(\Laracart\Returns\Providers\AuthServiceProvider::class);
        $this->app->register(\Laracart\Returns\Providers\EventServiceProvider::class);
        $this->app->register(\Laracart\Returns\Providers\RouteServiceProvider::class);
        // $this->app->register(\Laracart\Returns\Providers\WorkflowServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['returns'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../../../config/config.php' => config_path('laracart/returns.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../../../resources/views' => base_path('resources/views/vendor/returns')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../../../resources/lang' => base_path('resources/lang/vendor/returns')], 'lang');

        // Publish migrations
        $this->publishes([__DIR__ . '/../../../../database/migrations/' => base_path('database/migrations')], 'migrations');

        // Publish seeds
        $this->publishes([__DIR__ . '/../../../../database/seeds/' => base_path('database/seeds')], 'seeds');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
