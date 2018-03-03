<?php

namespace Litecms\Newsletter\Workflow;

use Litecms\Newsletter\Models\Newsletter;
use Validator;

class NewsletterValidator
{

    /**
     * Determine if the given newsletter is valid for complete status.
     *
     * @param Newsletter $newsletter
     *
     * @return bool / Validator
     */
    public function complete(Newsletter $newsletter)
    {
        return Validator::make($newsletter->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given newsletter is valid for verify status.
     *
     * @param Newsletter $newsletter
     *
     * @return bool / Validator
     */
    public function verify(Newsletter $newsletter)
    {
        return Validator::make($newsletter->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given newsletter is valid for approve status.
     *
     * @param Newsletter $newsletter
     *
     * @return bool / Validator
     */
    public function approve(Newsletter $newsletter)
    {
        return Validator::make($newsletter->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given newsletter is valid for publish status.
     *
     * @param Newsletter $newsletter
     *
     * @return bool / Validator
     */
    public function publish(Newsletter $newsletter)
    {
        return Validator::make($newsletter->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given newsletter is valid for archive status.
     *
     * @param Newsletter $newsletter
     *
     * @return bool / Validator
     */
    public function archive(Newsletter $newsletter)
    {
        return Validator::make($newsletter->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given newsletter is valid for unpublish status.
     *
     * @param Newsletter $newsletter
     *
     * @return bool / Validator
     */
    public function unpublish(Newsletter $newsletter)
    {
        return Validator::make($newsletter->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
