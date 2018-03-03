<?php

namespace Laracart\Returns\Providers;

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
        // Bind Returns policy
        \Laracart\Returns\Models\Returns::class => \Laracart\Returns\Policies\ReturnsPolicy::class,
// Bind ReturnReason policy
        \Laracart\Returns\Models\ReturnReason::class => \Laracart\Returns\Policies\ReturnReasonPolicy::class,
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
