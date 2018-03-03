<?php

namespace Litecms\Newsletter\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Litecms\Newsletter\Models\Newsletter;

class NewsletterAction
{
    /**
     * Perform the complete action.
     *
     * @param Newsletter $newsletter
     *
     * @return Newsletter
     */
    public function complete(Newsletter $newsletter)
    {
        try {
            $newsletter->status = 'complete';
            return $newsletter->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param Newsletter $newsletter
     *
     * @return Newsletter
     */public function verify(Newsletter $newsletter)
    {
        try {
            $newsletter->status = 'verify';
            return $newsletter->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param Newsletter $newsletter
     *
     * @return Newsletter
     */public function approve(Newsletter $newsletter)
    {
        try {
            $newsletter->status = 'approve';
            return $newsletter->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param Newsletter $newsletter
     *
     * @return Newsletter
     */public function publish(Newsletter $newsletter)
    {
        try {
            $newsletter->status = 'publish';
            return $newsletter->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param Newsletter $newsletter
     *
     * @return Newsletter
     */
    public function archive(Newsletter $newsletter)
    {
        try {
            $newsletter->status = 'archive';
            return $newsletter->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param Newsletter $newsletter
     *
     * @return Newsletter
     */
    public function unpublish(Newsletter $newsletter)
    {
        try {
            $newsletter->status = 'unpublish';
            return $newsletter->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
