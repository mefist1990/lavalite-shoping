<?php

namespace Laracart\Attribute\Http\Controllers\Api;

use App\Http\Controllers\Api\UserController as BaseController;
use Laracart\Attribute\Http\Requests\AttributeGroupRequest;
use Laracart\Attribute\Interfaces\AttributeGroupRepositoryInterface;
use Laracart\Attribute\Models\AttributeGroup;

/**
 * User API controller class.
 */
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
     * Display a list of attribute_group.
     *
     * @return json
     */
    public function index(AttributeGroupRequest $request)
    {
        $attribute_groups  = $this->repository
            ->setPresenter('\\Laracart\\Attribute\\Repositories\\Presenter\\AttributeGroupListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $attribute_groups['code'] = 2000;
        return response()->json($attribute_groups) 
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display attribute_group.
     *
     * @param Request $request
     * @param Model   AttributeGroup
     *
     * @return Json
     */
    public function show(AttributeGroupRequest $request, AttributeGroup $attribute_group)
    {

        if ($attribute_group->exists) {
            $attribute_group         = $attribute_group->presenter();
            $attribute_group['code'] = 2001;
            return response()->json($attribute_group)
                ->setStatusCode(200, 'SHOW_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new attribute_group.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(AttributeGroupRequest $request, AttributeGroup $attribute_group)
    {
        $attribute_group         = $attribute_group->presenter();
        $attribute_group['code'] = 2002;
        return response()->json($attribute_group)
            ->setStatusCode(200, 'CREATE_SUCCESS');
    }

    /**
     * Create new attribute_group.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(AttributeGroupRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $attribute_group          = $this->repository->create($attributes);
            $attribute_group          = $attribute_group->presenter();
            $attribute_group['code']  = 2004;

            return response()->json($attribute_group)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }

    }

    /**
     * Show attribute_group for editing.
     *
     * @param Request $request
     * @param Model   $attribute_group
     *
     * @return json
     */
    public function edit(AttributeGroupRequest $request, AttributeGroup $attribute_group)
    {
        if ($attribute_group->exists) {
            $attribute_group         = $attribute_group->presenter();
            $attribute_group['code'] = 2003;
            return response()-> json($attribute_group)
                ->setStatusCode(200, 'EDIT_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }
    }

    /**
     * Update the attribute_group.
     *
     * @param Request $request
     * @param Model   $attribute_group
     *
     * @return json
     */
    public function update(AttributeGroupRequest $request, AttributeGroup $attribute_group)
    {
        try {

            $attributes = $request->all();

            $attribute_group->update($attributes);
            $attribute_group         = $attribute_group->presenter();
            $attribute_group['code'] = 2005;

            return response()->json($attribute_group)
                ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the attribute_group.
     *
     * @param Request $request
     * @param Model   $attribute_group
     *
     * @return json
     */
    public function destroy(AttributeGroupRequest $request, AttributeGroup $attribute_group)
    {

        try {

            $t = $attribute_group->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('attribute::attribute_group.name')]),
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
