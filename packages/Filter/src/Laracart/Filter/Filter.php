<?php

namespace Laracart\Filter;

use User;

class Filter
{
    /**
     * $filter object.
     */
    protected $filter;
    /**
     * $filter_group object.
     */
    protected $filter_group;

    /**
     * Constructor.
     */
    public function __construct(\Laracart\Filter\Interfaces\FilterRepositoryInterface $filter,
        \Laracart\Filter\Interfaces\FilterGroupRepositoryInterface $filter_group)
    {
        $this->filter = $filter;
        $this->filter_group = $filter_group;
    }

    /**
     * Returns count of filter.
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
    public function gadget($view = 'admin.filter.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->filter->pushCriteria(new \Litepie\Laracart\Repositories\Criteria\FilterUserCriteria());
        }

        $filter = $this->filter->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('filter::' . $view, compact('filter'))->render();
    }
    // /**
    //  * Make gadget View
    //  *
    //  * @param string $view
    //  *
    //  * @param int $count
    //  *
    //  * @return View
    //  */
    // public function gadget($view = 'admin.filter_group.gadget', $count = 10)
    // {

    //     if (User::hasRole('user')) {
    //         $this->filter_group->pushCriteria(new \Litepie\Laracart\Repositories\Criteria\FilterGroupUserCriteria());
        
    //     $filter_group = $this->filter_group->scopeQuery(function ($query) use ($count) {
    //         return $query->orderBy('id', 'DESC')->take($count);
    //     })->all();

    //     return view('filter::' . $view, compact('filter_group'))->render();
    // }
    
    public function groups()
    {
        $temp = [];
        $groups = $this->filter_group->scopeQuery(function ($query) {
            return $query->orderBy('name','ASC');  })->all();
    
        

        foreach ($groups as $key => $value) {
            $temp[$value->id] = ucfirst($value->name);
        }

        return $temp;

    }
}
