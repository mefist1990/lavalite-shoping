<?php

namespace Laracart\Filter\Http\Controllers\Api;

use App\Http\Controllers\Api\UserController as BaseController;
use Laracart\Filter\Http\Requests\FilterGroupRequest;
use Laracart\Filter\Interfaces\FilterGroupRepositoryInterface;
use Laracart\Filter\Models\FilterGroup;

/**
 * User API controller class.
 */
class FilterGroupUserController extends BaseController
{
    /**
     * Initialize filter_group controller.
     *
     * @param type FilterGroupRepositoryInterface $filter_group
     *
     * @return type
     */
    public function __construct(FilterGroupRepositoryInterface $filter_group)
    {
        $this->repository = $filter_group;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Filter\Repositories\Criteria\FilterGroupUserCriteria());
        parent::__construct();
    }

    /**
     * Display a list of filter_group.
     *
     * @return json
     */
    public function index(FilterGroupRequest $request)
    {
        $filter_groups  = $this->repository
            ->setPresenter('\\Laracart\\Filter\\Repositories\\Presenter\\FilterGroupListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $filter_groups['code'] = 2000;
        return response()->json($filter_groups) 
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display filter_group.
     *
     * @param Request $request
     * @param Model   FilterGroup
     *
     * @return Json
     */
    public function show(FilterGroupRequest $request, FilterGroup $filter_group)
    {

        if ($filter_group->exists) {
            $filter_group         = $filter_group->presenter();
            $filter_group['code'] = 2001;
            return response()->json($filter_group)
                ->setStatusCode(200, 'SHOW_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new filter_group.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(FilterGroupRequest $request, FilterGroup $filter_group)
    {
        $filter_group         = $filter_group->presenter();
        $filter_group['code'] = 2002;
        return response()->json($filter_group)
            ->setStatusCode(200, 'CREATE_SUCCESS');
    }

    /**
     * Create new filter_group.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(FilterGroupRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $filter_group          = $this->repository->create($attributes);
            $filter_group          = $filter_group->presenter();
            $filter_group['code']  = 2004;

            return response()->json($filter_group)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }

    }

    /**
     * Show filter_group for editing.
     *
     * @param Request $request
     * @param Model   $filter_group
     *
     * @return json
     */
    public function edit(FilterGroupRequest $request, FilterGroup $filter_group)
    {
        if ($filter_group->exists) {
            $filter_group         = $filter_group->presenter();
            $filter_group['code'] = 2003;
            return response()-> json($filter_group)
                ->setStatusCode(200, 'EDIT_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }
    }

    /**
     * Update the filter_group.
     *
     * @param Request $request
     * @param Model   $filter_group
     *
     * @return json
     */
    public function update(FilterGroupRequest $request, FilterGroup $filter_group)
    {
        try {

            $attributes = $request->all();

            $filter_group->update($attributes);
            $filter_group         = $filter_group->presenter();
            $filter_group['code'] = 2005;

            return response()->json($filter_group)
                ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the filter_group.
     *
     * @param Request $request
     * @param Model   $filter_group
     *
     * @return json
     */
    public function destroy(FilterGroupRequest $request, FilterGroup $filter_group)
    {

        try {

            $t = $filter_group->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('filter::filter_group.name')]),
                'code'     => 2006
            ])->setStatusCode(202, 'DESTROY_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4006,
            ])->setStatusCode(400, 'DESTROY_ERROR');
        }
    }
}
