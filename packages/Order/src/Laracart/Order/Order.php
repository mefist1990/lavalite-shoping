<?php

namespace Laracart\Order;

use User;

class Order
{
    /**
     * $order object.
     */
    protected $order;
    /**
     * $order_status object.
     */
    protected $order_status;
    /**
     * $order_history object.
     */
    protected $order_history;

    /**
     * Constructor.
     */
    public function __construct(\Laracart\Order\Interfaces\OrderRepositoryInterface $order,
        \Laracart\Order\Interfaces\OrderStatusRepositoryInterface $order_status,
        \Laracart\Order\Interfaces\OrderHistoryRepositoryInterface $order_history)
    {
        $this->order = $order;
        $this->order_status = $order_status;
        $this->order_history = $order_history;
    }

    /**
     * Returns count of order.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  $this->order->count();
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
    public function gadget($view = 'admin.order.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->order->pushCriteria(new \Litepie\Laracart\Repositories\Criteria\OrderUserCriteria());
        }

        $order = $this->order->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('order::' . $view, compact('order'))->render();
    }

    /**
     * Returns order status
     *
     * @param array $filter
     *
     * @return int
     */
    public function statuses()
    {
        $temp = [];
        $statuses = $this->order_status->scopeQuery(function ($query) {return $query->orderBy('name','ASC');  })->all();
        foreach ($statuses as $key => $value) {
            $temp[$value->id] = ucfirst($value->name);
        }

        return $temp;
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
    public function orderList($view = 'admin.order.gadget', $count = 10)
    {

        $order = $this->order->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('order::' . $view, compact('order'))->render();
    }
    
}
