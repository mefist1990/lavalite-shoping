<?php

namespace Laracart\Filter\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Laracart\Filter\Http\Requests\FilterRequest;
use Laracart\Filter\Interfaces\FilterRepositoryInterface;
use Laracart\Filter\Models\Filter;

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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(FilterRequest $request)
    {
        $filters = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('filter::filter.names'));

        return $this->theme->of('filter::user.filter.index', compact('filters'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Filter $filter
     *
     * @return Response
     */
    public function show(FilterRequest $request, Filter $filter)
    {
        Form::populate($filter);

        return $this->theme->of('filter::user.filter.show', compact('filter'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(FilterRequest $request)
    {

        $filter = $this->repository->newInstance([]);
        Form::populate($filter);

        $this->theme->prependTitle(trans('filter::filter.names'));
        return $this->theme->of('filter::user.filter.create', compact('filter'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(FilterRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $filter = $this->repository->create($attributes);

            return redirect(trans_url('/user/filter/filter'))
                -> with('message', trans('messages.success.created', ['Module' => trans('filter::filter.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Filter $filter
     *
     * @return Response
     */
    public function edit(FilterRequest $request, Filter $filter)
    {

        Form::populate($filter);
        $this->theme->prependTitle(trans('filter::filter.names'));

        return $this->theme->of('filter::user.filter.edit', compact('filter'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Filter $filter
     *
     * @return Response
     */
    public function update(FilterRequest $request, Filter $filter)
    {
        try {
            $this->repository->update($request->all(), $filter->getRouteKey());

            return redirect(trans_url('/user/filter/filter'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('filter::filter.name')]))
                ->with('code', 204);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(FilterRequest $request, Filter $filter)
    {
        try {
            $this->repository->delete($filter->getRouteKey());
            return redirect(trans_url('/user/filter/filter'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('filter::filter.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
