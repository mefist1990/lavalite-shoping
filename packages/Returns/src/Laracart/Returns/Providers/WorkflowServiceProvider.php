<?php

namespace Laracart\Returns\Providers;

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
        // Bind Returns validator
        \Laracart\Returns\Models\Returns::class => \Laracart\Returns\Workflow\ReturnsValidator::class,

        // Bind ReturnReason validator
        \Laracart\Returns\Models\ReturnReason::class => \Laracart\Returns\Workflow\ReturnReasonValidator::class,
    ];

    /**
     * The actions mappings for the package.
     *
     * @var array
     */
    protected $actions = [
        // Bind Returns actions
        \Laracart\Returns\Models\Returns::class => \Laracart\Returns\Workflow\ReturnsAction::class,

        // Bind ReturnReason actions
        \Laracart\Returns\Models\ReturnReason::class => \Laracart\Returns\Workflow\ReturnReasonAction::class,
    ];

    /**
     * The notifiers mappings for the package.
     *
     * @var array
     */
    protected $notifiers = [
       // Bind Returns notifiers
        \Laracart\Returns\Models\Returns::class => \Laracart\Returns\Workflow\ReturnsNotifier::class,

        // Bind ReturnReason notifiers
        \Laracart\Returns\Models\ReturnReason::class => \Laracart\Returns\Workflow\ReturnReasonNotifier::class,
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
