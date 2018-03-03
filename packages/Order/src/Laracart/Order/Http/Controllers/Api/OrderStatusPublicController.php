<?php

namespace Laracart\Order\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Laracart\Order\Interfaces\OrderStatusRepositoryInterface;
use Laracart\Order\Repositories\Presenter\OrderStatusItemTransformer;

/**
 * Pubic API controller class.
 */
class OrderStatusPublicController extends BaseController
{
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
            ->setPresenter('\\Laracart\\Order\\Repositories\\Presenter\\OrderStatusListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $order_statuses['code'] = 2000;
        return response()->json($order_statuses)
                ->setStatusCode(200, 'INDEX_SUCCESS');
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
        $order_status = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($order_status)) {
            $order_status         = $this->itemPresenter($module, new OrderStatusItemTransformer);
            $order_status['code'] = 2001;
            return response()->json($order_status)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
