<?php

namespace Laracart\Filter\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Laracart\Filter\Interfaces\FilterGroupRepositoryInterface;

class FilterGroupPublicController extends BaseController
{
    // use FilterGroupWorkflow;

    /**
     * Constructor.
     *
     * @param type \Laracart\FilterGroup\Interfaces\FilterGroupRepositoryInterface $filter_group
     *
     * @return type
     */
    public function __construct(FilterGroupRepositoryInterface $filter_group)
    {
        $this->repository = $filter_group;
        parent::__construct();
    }

    /**
     * Show filter_group's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $filter_groups = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('filter::public.filter_group.index', compact('filter_groups'))->render();
    }

    /**
     * Show filter_group.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $filter_group = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('filter::public.filter_group.show', compact('filter_group'))->render();
    }

}
