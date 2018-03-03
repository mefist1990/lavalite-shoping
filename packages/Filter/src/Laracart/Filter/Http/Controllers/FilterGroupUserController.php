<?php

namespace Laracart\Filter\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Laracart\Filter\Http\Requests\FilterGroupRequest;
use Laracart\Filter\Interfaces\FilterGroupRepositoryInterface;
use Laracart\Filter\Models\FilterGroup;

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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(FilterGroupRequest $request)
    {
        $filter_groups = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('filter::filter_group.names'));

        return $this->theme->of('filter::user.filter_group.index', compact('filter_groups'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param FilterGroup $filter_group
     *
     * @return Response
     */
    public function show(FilterGroupRequest $request, FilterGroup $filter_group)
    {
        Form::populate($filter_group);

        return $this->theme->of('filter::user.filter_group.show', compact('filter_group'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(FilterGroupRequest $request)
    {

        $filter_group = $this->repository->newInstance([]);
        Form::populate($filter_group);

        $this->theme->prependTitle(trans('filter::filter_group.names'));
        return $this->theme->of('filter::user.filter_group.create', compact('filter_group'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(FilterGroupRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $filter_group = $this->repository->create($attributes);

            return redirect(trans_url('/user/filter/filter_group'))
                -> with('message', trans('messages.success.created', ['Module' => trans('filter::filter_group.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param FilterGroup $filter_group
     *
     * @return Response
     */
    public function edit(FilterGroupRequest $request, FilterGroup $filter_group)
    {

        Form::populate($filter_group);
        $this->theme->prependTitle(trans('filter::filter_group.names'));

        return $this->theme->of('filter::user.filter_group.edit', compact('filter_group'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param FilterGroup $filter_group
     *
     * @return Response
     */
    public function update(FilterGroupRequest $request, FilterGroup $filter_group)
    {
        try {
            $this->repository->update($request->all(), $filter_group->getRouteKey());

            return redirect(trans_url('/user/filter/filter_group'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('filter::filter_group.name')]))
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
    public function destroy(FilterGroupRequest $request, FilterGroup $filter_group)
    {
        try {
            $this->repository->delete($filter_group->getRouteKey());
            return redirect(trans_url('/user/filter/filter_group'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('filter::filter_group.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
