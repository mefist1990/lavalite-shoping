<?php

namespace Laracart\Order\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Laracart\Order\Interfaces\OrderHistoryRepositoryInterface;

class OrderHistoryPublicController extends BaseController
{
    // use OrderHistoryWorkflow;

    /**
     * Constructor.
     *
     * @param type \Laracart\OrderHistory\Interfaces\OrderHistoryRepositoryInterface $order_history
     *
     * @return type
     */
    public function __construct(OrderHistoryRepositoryInterface $order_history)
    {
        $this->repository = $order_history;
        parent::__construct();
    }

    /**
     * Show order_history's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $order_histories = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('order::public.order_history.index', compact('order_histories'))->render();
    }

    /**
     * Show order_history.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $order_history = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('order::public.order_history.show', compact('order_history'))->render();
    }

}
