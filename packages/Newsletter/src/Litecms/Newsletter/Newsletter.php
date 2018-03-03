<?php

namespace Litecms\Newsletter;

use User;

class Newsletter
{
    /**
     * $newsletter object.
     */
    protected $newsletter;

    /**
     * Constructor.
     */
    public function __construct(\Litecms\Newsletter\Interfaces\NewsletterRepositoryInterface $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Returns count of newsletter.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.newsletter.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->newsletter->pushCriteria(new \Litepie\Litecms\Repositories\Criteria\NewsletterUserCriteria());
        }

        $newsletter = $this->newsletter->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('newsletter::' . $view, compact('newsletter'))->render();
    }
}
