<?php

namespace Laracart\Attribute\Providers;

use Litepie\Contracts\Workflow\Workflow as WorkflowContract;
use Litepie\Foundation\Support\Providers\WorkflowServiceProvider as ServiceProvider;

class WorkflowServiceProvider extends ServiceProvider
{
    /**
     * The validators mappings for the package.
     *
     * @var array
     */
    protected $validators = [
        // Bind Attribute validator
        \Laracart\Attribute\Models\Attribute::class => \Laracart\Attribute\Workflow\AttributeValidator::class,

        // Bind AttributeGroup validator
        \Laracart\Attribute\Models\AttributeGroup::class => \Laracart\Attribute\Workflow\AttributeGroupValidator::class,
    ];

    /**
     * The actions mappings for the package.
     *
     * @var array
     */
    protected $actions = [
        // Bind Attribute actions
        \Laracart\Attribute\Models\Attribute::class => \Laracart\Attribute\Workflow\AttributeAction::class,

        // Bind AttributeGroup actions
        \Laracart\Attribute\Models\AttributeGroup::class => \Laracart\Attribute\Workflow\AttributeGroupAction::class,
    ];

    /**
     * The notifiers mappings for the package.
     *
     * @var array
     */
    protected $notifiers = [
       // Bind Attribute notifiers
        \Laracart\Attribute\Models\Attribute::class => \Laracart\Attribute\Workflow\AttributeNotifier::class,

        // Bind AttributeGroup notifiers
        \Laracart\Attribute\Models\AttributeGroup::class => \Laracart\Attribute\Workflow\AttributeGroupNotifier::class,
    ];

    /**
     * Register any package workflow validation services.
     *
     * @param \Litepie\Contracts\Workflow\Workflow $workflow
     *
     * @return void
     */
    public function boot(WorkflowContract $workflow)
    {
        parent::registerValidators($workflow);
        parent::registerActions($workflow);
        parent::registerNotifiers($workflow);
    }
}
