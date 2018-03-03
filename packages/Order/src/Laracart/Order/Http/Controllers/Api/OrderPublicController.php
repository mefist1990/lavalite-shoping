<?php

namespace Laracart\Order\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Laracart\Order\Interfaces\OrderRepositoryInterface;
use Laracart\Order\Repositories\Presenter\OrderItemTransformer;
use Laracart\Order\Http\Requests\OrderRequest;

/**
 * Pubic API controller class.
 */
class OrderPublicController extends BaseController
{
    /**
     * Constructor.
     *
     * @param type \Laracart\Order\Interfaces\OrderRepositoryInterface $order
     *
     * @return type
     */
    public function __construct(OrderRepositoryInterface $order)
    {
        $this->repository = $order;
        parent::__construct();
    }

    /**
     * Show order's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $orders = $this->repository
            ->setPresenter('\\Laracart\\Order\\Repositories\\Presenter\\OrderListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $orders['code'] = 2000;
        return response()->json($orders)
                ->setStatusCode(200, 'INDEX_SUCCESS');
    }

    /**
     * Show order.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $order = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($order)) {
            $order         = $this->itemPresenter($module, new OrderItemTransformer);
            $order['code'] = 2001;
            return response()->json($order)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }



     public function store(OrderRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $order          = $this->repository->create($attributes);
            $order          = $order->presenter();
            $order['code']  = 2004;

            return response()->json($order)
                             ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }
    }
}
