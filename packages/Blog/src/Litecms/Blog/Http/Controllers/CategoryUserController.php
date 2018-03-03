<?php

namespace Litecms\Blog\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Litecms\Blog\Http\Requests\CategoryRequest;
use Litecms\Blog\Interfaces\CategoryRepositoryInterface;
use Litecms\Blog\Models\Category;

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
                ->pushCriteria(new \Litecms\Blog\Repositories\Criteria\CategoryUserCriteria());
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

        $this->theme->prependTitle(trans('blog::category.names'));

        return $this->theme->of('blog::user.category.index', compact('categories'))->render();
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

        return $this->theme->of('blog::user.category.show', compact('category'))->render();
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

        $this->theme->prependTitle(trans('blog::category.names'));
        return $this->theme->of('blog::user.category.create', compact('category'))->render();
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

            return redirect(trans_url('/user/blog/category'))
                -> with('message', trans('messages.success.created', ['Module' => trans('blog::category.name')]))
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
        $this->theme->prependTitle(trans('blog::category.names'));

        return $this->theme->of('blog::user.category.edit', compact('category'))->render();
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

            return redirect(trans_url('/user/blog/category'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('blog::category.name')]))
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
            return redirect(trans_url('/user/blog/category'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('blog::category.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
