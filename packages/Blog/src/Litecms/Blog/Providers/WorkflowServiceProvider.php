<?php

namespace Litecms\Blog\Providers;

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
        // Bind Blog validator
        \Litecms\Blog\Models\Blog::class => \Litecms\Blog\Workflow\BlogValidator::class,

        // Bind Category validator
        \Litecms\Blog\Models\Category::class => \Litecms\Blog\Workflow\CategoryValidator::class,
    ];

    /**
     * The actions mappings for the package.
     *
     * @var array
     */
    protected $actions = [
        // Bind Blog actions
        \Litecms\Blog\Models\Blog::class => \Litecms\Blog\Workflow\BlogAction::class,

        // Bind Category actions
        \Litecms\Blog\Models\Category::class => \Litecms\Blog\Workflow\CategoryAction::class,
    ];

    /**
     * The notifiers mappings for the package.
     *
     * @var array
     */
    protected $notifiers = [
       // Bind Blog notifiers
        \Litecms\Blog\Models\Blog::class => \Litecms\Blog\Workflow\BlogNotifier::class,

        // Bind Category notifiers
        \Litecms\Blog\Models\Category::class => \Litecms\Blog\Workflow\CategoryNotifier::class,
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
