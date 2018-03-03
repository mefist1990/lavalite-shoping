<?php

namespace Laracart\Filter\Http\Controllers\Api;

use App\Http\Controllers\Api\UserController as BaseController;
use Laracart\Filter\Http\Requests\FilterRequest;
use Laracart\Filter\Interfaces\FilterRepositoryInterface;
use Laracart\Filter\Models\Filter;

/**
 * User API controller class.
 */
class FilterUserController extends BaseController
{
    /**
     * Initialize filter controller.
     *
     * @param type FilterRepositoryInterface $filter
     *
     * @return type
     */
    public function __construct(FilterRepositoryInterface $filter)
    {
        $this->repository = $filter;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Filter\Repositories\Criteria\FilterUserCriteria());
        parent::__construct();
    }

    /**
     * Display a list of filter.
     *
     * @return json
     */
    public function index(FilterRequest $request)
    {
        $filters  = $this->repository
            ->setPresenter('\\Laracart\\Filter\\Repositories\\Presenter\\FilterListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $filters['code'] = 2000;
        return response()->json($filters) 
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display filter.
     *
     * @param Request $request
     * @param Model   Filter
     *
     * @return Json
     */
    public function show(FilterRequest $request, Filter $filter)
    {

        if ($filter->exists) {
            $filter         = $filter->presenter();
            $filter['code'] = 2001;
            return response()->json($filter)
                ->setStatusCode(200, 'SHOW_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new filter.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(FilterRequest $request, Filter $filter)
    {
        $filter         = $filter->presenter();
        $filter['code'] = 2002;
        return response()->json($filter)
            ->setStatusCode(200, 'CREATE_SUCCESS');
    }

    /**
     * Create new filter.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(FilterRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $filter          = $this->repository->create($attributes);
            $filter          = $filter->presenter();
            $filter['code']  = 2004;

            return response()->json($filter)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }

    }

    /**
     * Show filter for editing.
     *
     * @param Request $request
     * @param Model   $filter
     *
     * @return json
     */
    public function edit(FilterRequest $request, Filter $filter)
    {
        if ($filter->exists) {
            $filter         = $filter->presenter();
            $filter['code'] = 2003;
            return response()-> json($filter)
                ->setStatusCode(200, 'EDIT_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }
    }

    /**
     * Update the filter.
     *
     * @param Request $request
     * @param Model   $filter
     *
     * @return json
     */
    public function update(FilterRequest $request, Filter $filter)
    {
        try {

            $attributes = $request->all();

            $filter->update($attributes);
            $filter         = $filter->presenter();
            $filter['code'] = 2005;

            return response()->json($filter)
                ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the filter.
     *
     * @param Request $request
     * @param Model   $filter
     *
     * @return json
     */
    public function destroy(FilterRequest $request, Filter $filter)
    {

        try {

            $t = $filter->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('filter::filter.name')]),
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
