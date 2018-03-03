<?php

namespace Laracart\Filter\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Laracart\Filter\Http\Requests\FilterRequest;
use Laracart\Filter\Interfaces\FilterRepositoryInterface;
use Laracart\Filter\Models\Filter;

/**
 * Admin web controller class.
 */
class FilterAdminController extends BaseController
{
    // use FilterWorkflow;
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
        parent::__construct();
    }

    /**
     * Display a list of filter.
     *
     * @return Response
     */
    public function index(FilterRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('filter::filter.names').' :: ');
        return $this->theme->of('filter::admin.filter.index')->render();
    }

    /**
     * Display a list of filter.
     *
     * @return Response
     */
    public function getJson(FilterRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $filters  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Laracart\\Filter\\Repositories\\Presenter\\FilterListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $filters['recordsTotal']    = $filters['meta']['pagination']['total'];
        $filters['recordsFiltered'] = $filters['meta']['pagination']['total'];
        $filters['request']         = $request->all();
        return response()->json($filters, 200);

    }

    /**
     * Display filter.
     *
     * @param Request $request
     * @param Model   $filter
     *
     * @return Response
     */
    public function show(FilterRequest $request, Filter $filter)
    {
        if (!$filter->exists) {
            return response()->view('filter::admin.filter.new', compact('filter'));
        }

        Form::populate($filter);
        return response()->view('filter::admin.filter.show', compact('filter'));
    }

    /**
     * Show the form for creating a new filter.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(FilterRequest $request)
    {

        $filter = $this->repository->newInstance([]);

        Form::populate($filter);

        return response()->view('filter::admin.filter.create', compact('filter'));

    }

    /**
     * Create new filter.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(FilterRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $filter          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('filter::filter.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/filter/filter/'.$filter->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show filter for editing.
     *
     * @param Request $request
     * @param Model   $filter
     *
     * @return Response
     */
    public function edit(FilterRequest $request, Filter $filter)
    {
        Form::populate($filter);
        return  response()->view('filter::admin.filter.edit', compact('filter'));
    }

    /**
     * Update the filter.
     *
     * @param Request $request
     * @param Model   $filter
     *
     * @return Response
     */
    public function update(FilterRequest $request, Filter $filter)
    {
        try {

            $attributes = $request->all();

            $filter->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('filter::filter.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/filter/filter/'.$filter->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/filter/filter/'.$filter->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the filter.
     *
     * @param Model   $filter
     *
     * @return Response
     */
    public function destroy(FilterRequest $request, Filter $filter)
    {

        try {

            $t = $filter->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('filter::filter.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/filter/filter/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/filter/filter/'.$filter->getRouteKey()),
            ], 400);
        }
    }

}
