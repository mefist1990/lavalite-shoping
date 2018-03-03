<?php

namespace Laracart\Order\Providers;

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
        // Bind Order validator
        \Laracart\Order\Models\Order::class => \Laracart\Order\Workflow\OrderValidator::class,

        // Bind OrderStatus validator
        \Laracart\Order\Models\OrderStatus::class => \Laracart\Order\Workflow\OrderStatusValidator::class,

        // Bind OrderHistory validator
        \Laracart\Order\Models\OrderHistory::class => \Laracart\Order\Workflow\OrderHistoryValidator::class,
    ];

    /**
     * The actions mappings for the package.
     *
     * @var array
     */
    protected $actions = [
        // Bind Order actions
        \Laracart\Order\Models\Order::class => \Laracart\Order\Workflow\OrderAction::class,

        // Bind OrderStatus actions
        \Laracart\Order\Models\OrderStatus::class => \Laracart\Order\Workflow\OrderStatusAction::class,

        // Bind OrderHistory actions
        \Laracart\Order\Models\OrderHistory::class => \Laracart\Order\Workflow\OrderHistoryAction::class,
    ];

    /**
     * The notifiers mappings for the package.
     *
     * @var array
     */
    protected $notifiers = [
       // Bind Order notifiers
        \Laracart\Order\Models\Order::class => \Laracart\Order\Workflow\OrderNotifier::class,

        // Bind OrderStatus notifiers
        \Laracart\Order\Models\OrderStatus::class => \Laracart\Order\Workflow\OrderStatusNotifier::class,

        // Bind OrderHistory notifiers
        \Laracart\Order\Models\OrderHistory::class => \Laracart\Order\Workflow\OrderHistoryNotifier::class,
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
