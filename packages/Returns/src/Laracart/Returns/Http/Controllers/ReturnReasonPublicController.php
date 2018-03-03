<?php

namespace Laracart\Returns\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Laracart\Returns\Interfaces\ReturnReasonRepositoryInterface;

class ReturnReasonPublicController extends BaseController
{
    // use ReturnReasonWorkflow;

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
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('returns::public.return_reason.index', compact('return_reasons'))->render();
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
        $return_reason = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('returns::public.return_reason.show', compact('return_reason'))->render();
    }

}
