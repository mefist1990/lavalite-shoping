<?php

namespace Laracart\Filter\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Laracart\Filter\Interfaces\FilterGroupRepositoryInterface;
use Laracart\Filter\Repositories\Presenter\FilterGroupItemTransformer;

/**
 * Pubic API controller class.
 */
class FilterGroupPublicController extends BaseController
{
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
            ->setPresenter('\\Laracart\\Filter\\Repositories\\Presenter\\FilterGroupListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $filter_groups['code'] = 2000;
        return response()->json($filter_groups)
                ->setStatusCode(200, 'INDEX_SUCCESS');
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
        $filter_group = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($filter_group)) {
            $filter_group         = $this->itemPresenter($module, new FilterGroupItemTransformer);
            $filter_group['code'] = 2001;
            return response()->json($filter_group)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
