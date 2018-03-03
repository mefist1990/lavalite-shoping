<?php

namespace Laracart\Currency\Providers;

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
        
        // Bind Currency validator
        \Laracart\Currency\Models\Currency::class => \Laracart\Currency\Workflow\CurrencyValidator::class,
    ];

    /**
     * The actions mappings for the package.
     *
     * @var array
     */
    protected $actions = [
        
        // Bind Currency actions
        \Laracart\Currency\Models\Currency::class => \Laracart\Currency\Workflow\CurrencyAction::class,
    ];

    /**
     * The notifiers mappings for the package.
     *
     * @var array
     */
    protected $notifiers = [
       
        // Bind Currency notifiers
        \Laracart\Currency\Models\Currency::class => \Laracart\Currency\Workflow\CurrencyNotifier::class,
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
