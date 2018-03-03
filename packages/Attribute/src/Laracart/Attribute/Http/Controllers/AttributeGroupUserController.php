<?php

namespace Laracart\Attribute\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Laracart\Attribute\Http\Requests\AttributeGroupRequest;
use Laracart\Attribute\Interfaces\AttributeGroupRepositoryInterface;
use Laracart\Attribute\Models\AttributeGroup;

class AttributeGroupUserController extends BaseController
{
    /**
     * Initialize attribute_group controller.
     *
     * @param type AttributeGroupRepositoryInterface $attribute_group
     *
     * @return type
     */
    public function __construct(AttributeGroupRepositoryInterface $attribute_group)
    {
        $this->repository = $attribute_group;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Attribute\Repositories\Criteria\AttributeGroupUserCriteria());
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(AttributeGroupRequest $request)
    {
        $attribute_groups = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('attribute::attribute_group.names'));

        return $this->theme->of('attribute::user.attribute_group.index', compact('attribute_groups'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param AttributeGroup $attribute_group
     *
     * @return Response
     */
    public function show(AttributeGroupRequest $request, AttributeGroup $attribute_group)
    {
        Form::populate($attribute_group);

        return $this->theme->of('attribute::user.attribute_group.show', compact('attribute_group'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(AttributeGroupRequest $request)
    {

        $attribute_group = $this->repository->newInstance([]);
        Form::populate($attribute_group);

        $this->theme->prependTitle(trans('attribute::attribute_group.names'));
        return $this->theme->of('attribute::user.attribute_group.create', compact('attribute_group'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(AttributeGroupRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $attribute_group = $this->repository->create($attributes);

            return redirect(trans_url('/user/attribute/attribute_group'))
                -> with('message', trans('messages.success.created', ['Module' => trans('attribute::attribute_group.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param AttributeGroup $attribute_group
     *
     * @return Response
     */
    public function edit(AttributeGroupRequest $request, AttributeGroup $attribute_group)
    {

        Form::populate($attribute_group);
        $this->theme->prependTitle(trans('attribute::attribute_group.names'));

        return $this->theme->of('attribute::user.attribute_group.edit', compact('attribute_group'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param AttributeGroup $attribute_group
     *
     * @return Response
     */
    public function update(AttributeGroupRequest $request, AttributeGroup $attribute_group)
    {
        try {
            $this->repository->update($request->all(), $attribute_group->getRouteKey());

            return redirect(trans_url('/user/attribute/attribute_group'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('attribute::attribute_group.name')]))
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
    public function destroy(AttributeGroupRequest $request, AttributeGroup $attribute_group)
    {
        try {
            $this->repository->delete($attribute_group->getRouteKey());
            return redirect(trans_url('/user/attribute/attribute_group'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('attribute::attribute_group.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
