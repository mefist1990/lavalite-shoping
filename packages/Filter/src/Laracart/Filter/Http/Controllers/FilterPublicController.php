<?php

namespace Laracart\Filter\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Laracart\Filter\Interfaces\FilterRepositoryInterface;

class FilterPublicController extends BaseController
{
    // use FilterWorkflow;

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
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('filter::public.filter.index', compact('filters'))->render();
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
        $filter = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('filter::public.filter.show', compact('filter'))->render();
    }

}
