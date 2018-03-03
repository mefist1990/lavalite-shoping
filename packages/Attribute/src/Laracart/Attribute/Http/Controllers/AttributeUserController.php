<?php

namespace Laracart\Attribute\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Laracart\Attribute\Http\Requests\AttributeRequest;
use Laracart\Attribute\Interfaces\AttributeRepositoryInterface;
use Laracart\Attribute\Models\Attribute;

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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(AttributeRequest $request)
    {
        $attributes = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('attribute::attribute.names'));

        return $this->theme->of('attribute::user.attribute.index', compact('attributes'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Attribute $attribute
     *
     * @return Response
     */
    public function show(AttributeRequest $request, Attribute $attribute)
    {
        Form::populate($attribute);

        return $this->theme->of('attribute::user.attribute.show', compact('attribute'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(AttributeRequest $request)
    {

        $attribute = $this->repository->newInstance([]);
        Form::populate($attribute);

        $this->theme->prependTitle(trans('attribute::attribute.names'));
        return $this->theme->of('attribute::user.attribute.create', compact('attribute'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(AttributeRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $attribute = $this->repository->create($attributes);

            return redirect(trans_url('/user/attribute/attribute'))
                -> with('message', trans('messages.success.created', ['Module' => trans('attribute::attribute.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Attribute $attribute
     *
     * @return Response
     */
    public function edit(AttributeRequest $request, Attribute $attribute)
    {

        Form::populate($attribute);
        $this->theme->prependTitle(trans('attribute::attribute.names'));

        return $this->theme->of('attribute::user.attribute.edit', compact('attribute'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Attribute $attribute
     *
     * @return Response
     */
    public function update(AttributeRequest $request, Attribute $attribute)
    {
        try {
            $this->repository->update($request->all(), $attribute->getRouteKey());

            return redirect(trans_url('/user/attribute/attribute'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('attribute::attribute.name')]))
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
    public function destroy(AttributeRequest $request, Attribute $attribute)
    {
        try {
            $this->repository->delete($attribute->getRouteKey());
            return redirect(trans_url('/user/attribute/attribute'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('attribute::attribute.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
