<?php

namespace Laracart\Attribute\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Laracart\Attribute\Http\Requests\AttributeGroupRequest;
use Laracart\Attribute\Interfaces\AttributeGroupRepositoryInterface;
use Laracart\Attribute\Models\AttributeGroup;

/**
 * Admin web controller class.
 */
class AttributeGroupAdminController extends BaseController
{
    // use AttributeGroupWorkflow;
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
        parent::__construct();
    }

    /**
     * Display a list of attribute_group.
     *
     * @return Response
     */
    public function index(AttributeGroupRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('attribute::attribute_group.names').' :: ');
        return $this->theme->of('attribute::admin.attribute_group.index')->render();
    }

    /**
     * Display a list of attribute_group.
     *
     * @return Response
     */
    public function getJson(AttributeGroupRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $attribute_groups  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Laracart\\Attribute\\Repositories\\Presenter\\AttributeGroupListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $attribute_groups['recordsTotal']    = $attribute_groups['meta']['pagination']['total'];
        $attribute_groups['recordsFiltered'] = $attribute_groups['meta']['pagination']['total'];
        $attribute_groups['request']         = $request->all();
        return response()->json($attribute_groups, 200);

    }

    /**
     * Display attribute_group.
     *
     * @param Request $request
     * @param Model   $attribute_group
     *
     * @return Response
     */
    public function show(AttributeGroupRequest $request, AttributeGroup $attribute_group)
    {
        if (!$attribute_group->exists) {
            return response()->view('attribute::admin.attribute_group.new', compact('attribute_group'));
        }

        Form::populate($attribute_group);
        return response()->view('attribute::admin.attribute_group.show', compact('attribute_group'));
    }

    /**
     * Show the form for creating a new attribute_group.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(AttributeGroupRequest $request)
    {

        $attribute_group = $this->repository->newInstance([]);

        Form::populate($attribute_group);

        return response()->view('attribute::admin.attribute_group.create', compact('attribute_group'));

    }

    /**
     * Create new attribute_group.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(AttributeGroupRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $attribute_group          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('attribute::attribute_group.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/attribute/attribute_group/'.$attribute_group->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show attribute_group for editing.
     *
     * @param Request $request
     * @param Model   $attribute_group
     *
     * @return Response
     */
    public function edit(AttributeGroupRequest $request, AttributeGroup $attribute_group)
    {
        Form::populate($attribute_group);
        return  response()->view('attribute::admin.attribute_group.edit', compact('attribute_group'));
    }

    /**
     * Update the attribute_group.
     *
     * @param Request $request
     * @param Model   $attribute_group
     *
     * @return Response
     */
    public function update(AttributeGroupRequest $request, AttributeGroup $attribute_group)
    {
        try {

            $attributes = $request->all();

            $attribute_group->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('attribute::attribute_group.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/attribute/attribute_group/'.$attribute_group->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/attribute/attribute_group/'.$attribute_group->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the attribute_group.
     *
     * @param Model   $attribute_group
     *
     * @return Response
     */
    public function destroy(AttributeGroupRequest $request, AttributeGroup $attribute_group)
    {

        try {

            $t = $attribute_group->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('attribute::attribute_group.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/attribute/attribute_group/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/attribute/attribute_group/'.$attribute_group->getRouteKey()),
            ], 400);
        }
    }

}
