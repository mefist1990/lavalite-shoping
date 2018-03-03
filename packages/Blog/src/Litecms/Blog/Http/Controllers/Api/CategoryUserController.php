<?php

namespace Litecms\Blog\Http\Controllers\Api;

use App\Http\Controllers\Api\UserController as BaseController;
use Litecms\Blog\Http\Requests\CategoryRequest;
use Litecms\Blog\Interfaces\CategoryRepositoryInterface;
use Litecms\Blog\Models\Category;

/**
 * User API controller class.
 */
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
     * Display a list of category.
     *
     * @return json
     */
    public function index(CategoryRequest $request)
    {
        $categories  = $this->repository
            ->setPresenter('\\Litecms\\Blog\\Repositories\\Presenter\\CategoryListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $categories['code'] = 2000;
        return response()->json($categories) 
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display category.
     *
     * @param Request $request
     * @param Model   Category
     *
     * @return Json
     */
    public function show(CategoryRequest $request, Category $category)
    {

        if ($category->exists) {
            $category         = $category->presenter();
            $category['code'] = 2001;
            return response()->json($category)
                ->setStatusCode(200, 'SHOW_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new category.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(CategoryRequest $request, Category $category)
    {
        $category         = $category->presenter();
        $category['code'] = 2002;
        return response()->json($category)
            ->setStatusCode(200, 'CREATE_SUCCESS');
    }

    /**
     * Create new category.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(CategoryRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $category          = $this->repository->create($attributes);
            $category          = $category->presenter();
            $category['code']  = 2004;

            return response()->json($category)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }

    }

    /**
     * Show category for editing.
     *
     * @param Request $request
     * @param Model   $category
     *
     * @return json
     */
    public function edit(CategoryRequest $request, Category $category)
    {
        if ($category->exists) {
            $category         = $category->presenter();
            $category['code'] = 2003;
            return response()-> json($category)
                ->setStatusCode(200, 'EDIT_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }
    }

    /**
     * Update the category.
     *
     * @param Request $request
     * @param Model   $category
     *
     * @return json
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {

            $attributes = $request->all();

            $category->update($attributes);
            $category         = $category->presenter();
            $category['code'] = 2005;

            return response()->json($category)
                ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the category.
     *
     * @param Request $request
     * @param Model   $category
     *
     * @return json
     */
    public function destroy(CategoryRequest $request, Category $category)
    {

        try {

            $t = $category->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('blog::category.name')]),
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
