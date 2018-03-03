<?php

namespace Laracart\Returns\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Laracart\Returns\Interfaces\ReturnReasonRepositoryInterface;
use Laracart\Returns\Repositories\Presenter\ReturnReasonItemTransformer;

/**
 * Pubic API controller class.
 */
class ReturnReasonPublicController extends BaseController
{
    /**
     * Constructor.
     *
     * @param type \Laracart\ReturnReason\Interfaces\ReturnReasonRepositoryInterface $return_reason
     *
     * @return type
     */
    public function __construct(ReturnReasonRepositoryInterface $return_reason)
    {
        $this->repository = $return_reason;
        parent::__construct();
    }

    /**
     * Show return_reason's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $return_reasons = $this->repository
            ->setPresenter('\\Laracart\\Returns\\Repositories\\Presenter\\ReturnReasonListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $return_reasons['code'] = 2000;
        return response()->json($return_reasons)
                ->setStatusCode(200, 'INDEX_SUCCESS');
    }

    /**
     * Show return_reason.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $return_reason = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($return_reason)) {
            $return_reason         = $this->itemPresenter($module, new ReturnReasonItemTransformer);
            $return_reason['code'] = 2001;
            return response()->json($return_reason)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
