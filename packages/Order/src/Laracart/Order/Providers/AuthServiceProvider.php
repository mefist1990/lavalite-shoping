<?php

namespace Laracart\Order\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the package.
     *
     * @var array
     */
    protected $policies = [
        // Bind Order policy
        \Laracart\Order\Models\Order::class => \Laracart\Order\Policies\OrderPolicy::class,
// Bind OrderStatus policy
        \Laracart\Order\Models\OrderStatus::class => \Laracart\Order\Policies\OrderStatusPolicy::class,
// Bind OrderHistory policy
        \Laracart\Order\Models\OrderHistory::class => \Laracart\Order\Policies\OrderHistoryPolicy::class,
    ];

    /**
     * Register any package authentication / authorization services.
     *
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);
    }
}
