<?php

namespace Laracart\Order\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Laracart\Order\Interfaces\OrderStatusRepositoryInterface;

class OrderStatusPublicController extends BaseController
{
    // use OrderStatusWorkflow;

    /**
     * Constructor.
     *
     * @param type \Laracart\OrderStatus\Interfaces\OrderStatusRepositoryInterface $order_status
     *
     * @return type
     */
    public function __construct(OrderStatusRepositoryInterface $order_status)
    {
        $this->repository = $order_status;
        parent::__construct();
    }

    /**
     * Show order_status's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $order_statuses = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('order::public.order_status.index', compact('order_statuses'))->render();
    }

    /**
     * Show order_status.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $order_status = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('order::public.order_status.show', compact('order_status'))->render();
    }

}
