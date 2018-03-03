<?php

namespace Laracart\Attribute\Providers;

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
        // Bind Attribute policy
        \Laracart\Attribute\Models\Attribute::class => \Laracart\Attribute\Policies\AttributePolicy::class,
// Bind AttributeGroup policy
        \Laracart\Attribute\Models\AttributeGroup::class => \Laracart\Attribute\Policies\AttributeGroupPolicy::class,
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
