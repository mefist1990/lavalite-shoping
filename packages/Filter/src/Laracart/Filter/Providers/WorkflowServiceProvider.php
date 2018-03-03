<?php

namespace Laracart\Filter\Providers;

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
        // Bind Filter validator
        \Laracart\Filter\Models\Filter::class => \Laracart\Filter\Workflow\FilterValidator::class,

        // Bind FilterGroup validator
        \Laracart\Filter\Models\FilterGroup::class => \Laracart\Filter\Workflow\FilterGroupValidator::class,
    ];

    /**
     * The actions mappings for the package.
     *
     * @var array
     */
    protected $actions = [
        // Bind Filter actions
        \Laracart\Filter\Models\Filter::class => \Laracart\Filter\Workflow\FilterAction::class,

        // Bind FilterGroup actions
        \Laracart\Filter\Models\FilterGroup::class => \Laracart\Filter\Workflow\FilterGroupAction::class,
    ];

    /**
     * The notifiers mappings for the package.
     *
     * @var array
     */
    protected $notifiers = [
       // Bind Filter notifiers
        \Laracart\Filter\Models\Filter::class => \Laracart\Filter\Workflow\FilterNotifier::class,

        // Bind FilterGroup notifiers
        \Laracart\Filter\Models\FilterGroup::class => \Laracart\Filter\Workflow\FilterGroupNotifier::class,
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
