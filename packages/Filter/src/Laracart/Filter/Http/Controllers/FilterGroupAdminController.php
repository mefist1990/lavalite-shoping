<?php

namespace Laracart\Filter\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Laracart\Filter\Http\Requests\FilterGroupRequest;
use Laracart\Filter\Interfaces\FilterGroupRepositoryInterface;
use Laracart\Filter\Models\FilterGroup;

/**
 * Admin web controller class.
 */
class FilterGroupAdminController extends BaseController
{
    // use FilterGroupWorkflow;
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
        parent::__construct();
    }

    /**
     * Display a list of filter_group.
     *
     * @return Response
     */
    public function index(FilterGroupRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('filter::filter_group.names').' :: ');
        return $this->theme->of('filter::admin.filter_group.index')->render();
    }

    /**
     * Display a list of filter_group.
     *
     * @return Response
     */
    public function getJson(FilterGroupRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $filter_groups  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Laracart\\Filter\\Repositories\\Presenter\\FilterGroupListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $filter_groups['recordsTotal']    = $filter_groups['meta']['pagination']['total'];
        $filter_groups['recordsFiltered'] = $filter_groups['meta']['pagination']['total'];
        $filter_groups['request']         = $request->all();
        return response()->json($filter_groups, 200);

    }

    /**
     * Display filter_group.
     *
     * @param Request $request
     * @param Model   $filter_group
     *
     * @return Response
     */
    public function show(FilterGroupRequest $request, FilterGroup $filter_group)
    {
        if (!$filter_group->exists) {
            return response()->view('filter::admin.filter_group.new', compact('filter_group'));
        }

        Form::populate($filter_group);
        return response()->view('filter::admin.filter_group.show', compact('filter_group'));
    }

    /**
     * Show the form for creating a new filter_group.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(FilterGroupRequest $request)
    {

        $filter_group = $this->repository->newInstance([]);

        Form::populate($filter_group);

        return response()->view('filter::admin.filter_group.create', compact('filter_group'));

    }

    /**
     * Create new filter_group.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(FilterGroupRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $filter_group          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('filter::filter_group.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/filter/filter_group/'.$filter_group->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show filter_group for editing.
     *
     * @param Request $request
     * @param Model   $filter_group
     *
     * @return Response
     */
    public function edit(FilterGroupRequest $request, FilterGroup $filter_group)
    {
        Form::populate($filter_group);
        return  response()->view('filter::admin.filter_group.edit', compact('filter_group'));
    }

    /**
     * Update the filter_group.
     *
     * @param Request $request
     * @param Model   $filter_group
     *
     * @return Response
     */
    public function update(FilterGroupRequest $request, FilterGroup $filter_group)
    {
        try {

            $attributes = $request->all();

            $filter_group->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('filter::filter_group.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/filter/filter_group/'.$filter_group->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/filter/filter_group/'.$filter_group->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the filter_group.
     *
     * @param Model   $filter_group
     *
     * @return Response
     */
    public function destroy(FilterGroupRequest $request, FilterGroup $filter_group)
    {

        try {

            $t = $filter_group->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('filter::filter_group.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/filter/filter_group/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/filter/filter_group/'.$filter_group->getRouteKey()),
            ], 400);
        }
    }

}
