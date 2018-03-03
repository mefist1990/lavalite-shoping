<?php

namespace Litecms\Newsletter\Providers;

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
        
        // Bind Newsletter validator
        \Litecms\Newsletter\Models\Newsletter::class => \Litecms\Newsletter\Workflow\NewsletterValidator::class,
    ];

    /**
     * The actions mappings for the package.
     *
     * @var array
     */
    protected $actions = [
        
        // Bind Newsletter actions
        \Litecms\Newsletter\Models\Newsletter::class => \Litecms\Newsletter\Workflow\NewsletterAction::class,
    ];

    /**
     * The notifiers mappings for the package.
     *
     * @var array
     */
    protected $notifiers = [
       
        // Bind Newsletter notifiers
        \Litecms\Newsletter\Models\Newsletter::class => \Litecms\Newsletter\Workflow\NewsletterNotifier::class,
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
