<?php

namespace Laracart\Filter\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Laracart\Filter\Interfaces\FilterRepositoryInterface;
use Laracart\Filter\Repositories\Presenter\FilterItemTransformer;

/**
 * Pubic API controller class.
 */
class FilterPublicController extends BaseController
{
    /**
     * Constructor.
     *
     * @param type \Laracart\Filter\Interfaces\FilterRepositoryInterface $filter
     *
     * @return type
     */
    public function __construct(FilterRepositoryInterface $filter)
    {
        $this->repository = $filter;
        parent::__construct();
    }

    /**
     * Show filter's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $filters = $this->repository
            ->setPresenter('\\Laracart\\Filter\\Repositories\\Presenter\\FilterListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $filters['code'] = 2000;
        return response()->json($filters)
                ->setStatusCode(200, 'INDEX_SUCCESS');
    }

    /**
     * Show filter.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $filter = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($filter)) {
            $filter         = $this->itemPresenter($module, new FilterItemTransformer);
            $filter['code'] = 2001;
            return response()->json($filter)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
