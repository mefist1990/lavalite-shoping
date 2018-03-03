<?php

namespace Laracart\Attribute\Providers;

use Illuminate\Support\ServiceProvider;

class AttributeServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__ . '/../../../../resources/views', 'attribute');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../../../resources/lang', 'attribute');

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
        $this->app->bind('attribute', function ($app) {
            return $this->app->make('Laracart\Attribute\Attribute');
        });

// Bind Attribute to repository
        $this->app->bind(
            \Laracart\Attribute\Interfaces\AttributeRepositoryInterface::class,
            \Laracart\Attribute\Repositories\Eloquent\AttributeRepository::class
        );
        // Bind AttributeGroup to repository
        $this->app->bind(
            \Laracart\Attribute\Interfaces\AttributeGroupRepositoryInterface::class,
            \Laracart\Attribute\Repositories\Eloquent\AttributeGroupRepository::class
        );

        $this->app->register(\Laracart\Attribute\Providers\AuthServiceProvider::class);
        $this->app->register(\Laracart\Attribute\Providers\EventServiceProvider::class);
        $this->app->register(\Laracart\Attribute\Providers\RouteServiceProvider::class);
        // $this->app->register(\Laracart\Attribute\Providers\WorkflowServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['attribute'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../../../config/config.php' => config_path('laracart/attribute.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../../../resources/views' => base_path('resources/views/vendor/attribute')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../../../resources/lang' => base_path('resources/lang/vendor/attribute')], 'lang');

        // Publish migrations
        $this->publishes([__DIR__ . '/../../../../database/migrations/' => base_path('database/migrations')], 'migrations');

        // Publish seeds
        $this->publishes([__DIR__ . '/../../../../database/seeds/' => base_path('database/seeds')], 'seeds');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
