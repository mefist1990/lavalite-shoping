<?php

namespace Laracart\Order\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Laracart\Order\Interfaces\OrderHistoryRepositoryInterface;
use Laracart\Order\Repositories\Presenter\OrderHistoryItemTransformer;

/**
 * Pubic API controller class.
 */
class OrderHistoryPublicController extends BaseController
{
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
            ->setPresenter('\\Laracart\\Order\\Repositories\\Presenter\\OrderHistoryListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $order_histories['code'] = 2000;
        return response()->json($order_histories)
                ->setStatusCode(200, 'INDEX_SUCCESS');
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
        $order_history = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($order_history)) {
            $order_history         = $this->itemPresenter($module, new OrderHistoryItemTransformer);
            $order_history['code'] = 2001;
            return response()->json($order_history)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
