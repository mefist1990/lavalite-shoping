<?php

namespace Laracart\Attribute\Http\Controllers\Api;

use App\Http\Controllers\Api\UserController as BaseController;
use Laracart\Attribute\Http\Requests\AttributeRequest;
use Laracart\Attribute\Interfaces\AttributeRepositoryInterface;
use Laracart\Attribute\Models\Attribute;

/**
 * User API controller class.
 */
class AttributeUserController extends BaseController
{
    /**
     * Initialize attribute controller.
     *
     * @param type AttributeRepositoryInterface $attribute
     *
     * @return type
     */
    public function __construct(AttributeRepositoryInterface $attribute)
    {
        $this->repository = $attribute;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Attribute\Repositories\Criteria\AttributeUserCriteria());
        parent::__construct();
    }

    /**
     * Display a list of attribute.
     *
     * @return json
     */
    public function index(AttributeRequest $request)
    {
        $attributes  = $this->repository
            ->setPresenter('\\Laracart\\Attribute\\Repositories\\Presenter\\AttributeListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $attributes['code'] = 2000;
        return response()->json($attributes) 
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display attribute.
     *
     * @param Request $request
     * @param Model   Attribute
     *
     * @return Json
     */
    public function show(AttributeRequest $request, Attribute $attribute)
    {

        if ($attribute->exists) {
            $attribute         = $attribute->presenter();
            $attribute['code'] = 2001;
            return response()->json($attribute)
                ->setStatusCode(200, 'SHOW_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new attribute.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(AttributeRequest $request, Attribute $attribute)
    {
        $attribute         = $attribute->presenter();
        $attribute['code'] = 2002;
        return response()->json($attribute)
            ->setStatusCode(200, 'CREATE_SUCCESS');
    }

    /**
     * Create new attribute.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(AttributeRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $attribute          = $this->repository->create($attributes);
            $attribute          = $attribute->presenter();
            $attribute['code']  = 2004;

            return response()->json($attribute)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }

    }

    /**
     * Show attribute for editing.
     *
     * @param Request $request
     * @param Model   $attribute
     *
     * @return json
     */
    public function edit(AttributeRequest $request, Attribute $attribute)
    {
        if ($attribute->exists) {
            $attribute         = $attribute->presenter();
            $attribute['code'] = 2003;
            return response()-> json($attribute)
                ->setStatusCode(200, 'EDIT_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }
    }

    /**
     * Update the attribute.
     *
     * @param Request $request
     * @param Model   $attribute
     *
     * @return json
     */
    public function update(AttributeRequest $request, Attribute $attribute)
    {
        try {

            $attributes = $request->all();

            $attribute->update($attributes);
            $attribute         = $attribute->presenter();
            $attribute['code'] = 2005;

            return response()->json($attribute)
                ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the attribute.
     *
     * @param Request $request
     * @param Model   $attribute
     *
     * @return json
     */
    public function destroy(AttributeRequest $request, Attribute $attribute)
    {

        try {

            $t = $attribute->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('attribute::attribute.name')]),
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
