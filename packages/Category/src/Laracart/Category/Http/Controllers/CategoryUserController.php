<?php

namespace Laracart\Category\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Laracart\Category\Http\Requests\CategoryRequest;
use Laracart\Category\Interfaces\CategoryRepositoryInterface;
use Laracart\Category\Models\Category;

class CategoryUserController extends BaseController
{
    /**
     * Initialize category controller.
     *
     * @param type CategoryRepositoryInterface $category
     *
     * @return type
     */
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->repository = $category;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Category\Repositories\Criteria\CategoryUserCriteria());
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(CategoryRequest $request)
    {
        $categories = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('category::category.names'));

        return $this->theme->of('category::user.category.index', compact('categories'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Category $category
     *
     * @return Response
     */
    public function show(CategoryRequest $request, Category $category)
    {
        Form::populate($category);

        return $this->theme->of('category::user.category.show', compact('category'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(CategoryRequest $request)
    {

        $category = $this->repository->newInstance([]);
        Form::populate($category);

        $this->theme->prependTitle(trans('category::category.names'));
        return $this->theme->of('category::user.category.create', compact('category'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $category = $this->repository->create($attributes);

            return redirect(trans_url('/user/category/category'))
                -> with('message', trans('messages.success.created', ['Module' => trans('category::category.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Category $category
     *
     * @return Response
     */
    public function edit(CategoryRequest $request, Category $category)
    {

        Form::populate($category);
        $this->theme->prependTitle(trans('category::category.names'));

        return $this->theme->of('category::user.category.edit', compact('category'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Category $category
     *
     * @return Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $this->repository->update($request->all(), $category->getRouteKey());

            return redirect(trans_url('/user/category/category'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('category::category.name')]))
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
    public function destroy(CategoryRequest $request, Category $category)
    {
        try {
            $this->repository->delete($category->getRouteKey());
            return redirect(trans_url('/user/category/category'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('category::category.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
