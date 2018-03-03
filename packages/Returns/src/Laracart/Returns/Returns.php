<?php

namespace Laracart\Returns;

use User;

class Returns
{
    /**
     * $returns object.
     */
    protected $returns;
    /**
     * $return_reason object.
     */
    protected $return_reason;

    /**
     * Constructor.
     */
    public function __construct(\Laracart\Returns\Interfaces\ReturnsRepositoryInterface $returns,
        \Laracart\Returns\Interfaces\ReturnReasonRepositoryInterface $return_reason)
    {
        $this->returns = $returns;
        $this->return_reason = $return_reason;
    }

    /**
     * Returns count of returns.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  $this->returns->count();
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
    public function gadget($view = 'admin.returns.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->returns->pushCriteria(new \Litepie\Laracart\Repositories\Criteria\ReturnsUserCriteria());
        }

        $returns = $this->returns->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('returns::' . $view, compact('returns'))->render();
    }

    public function reasons()
    {
        $temp = [];
        $options = $this->return_reason->scopeQuery(function ($query) {return $query->orderBy('name','ASC');  })->all();
    
        
        foreach ($options as $key => $value) {
            $temp[$value->id] = ucfirst($value->name);
        }

        return $temp;
    }
    
}
