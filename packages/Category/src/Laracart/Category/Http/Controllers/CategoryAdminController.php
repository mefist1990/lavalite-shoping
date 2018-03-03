<?php

namespace Laracart\Category\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Laracart\Category\Http\Requests\CategoryRequest;
use Laracart\Category\Interfaces\CategoryRepositoryInterface;
use Laracart\Category\Models\Category;

/**
 * Admin web controller class.
 */
class CategoryAdminController extends BaseController
{

// use CategoryWorkflow;
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
        parent::__construct();
    }

    /**
     * Display a list of category.
     *
     * @return Response
     */
    public function index(CategoryRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }

        $this->theme->prependTitle(trans('category::category.names') . ' :: ');
        return $this->theme->of('category::admin.category.index')->render();
    }

    /**
     * Display a list of category.
     *
     * @return Response
     */
    public function getJson(CategoryRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $categories = $this->repository
            ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
            ->setPresenter('\\Laracart\\Category\\Repositories\\Presenter\\CategoryListPresenter')
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->paginate($pageLimit);
        $categories['recordsTotal']    = $categories['meta']['pagination']['total'];
        $categories['recordsFiltered'] = $categories['meta']['pagination']['total'];
        $categories['request']         = $request->all();
        return response()->json($categories, 200);

    }

    /**
     * Display category.
     *
     * @param Request $request
     * @param Model   $category
     *
     * @return Response
     */
    public function show(CategoryRequest $request, Category $category)
    {
        if (!$category->exists) {
            return response()->view('category::admin.category.new', compact('category'));
        }

        Form::populate($category);
        return response()->view('category::admin.category.show', compact('category'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(CategoryRequest $request)
    {

        $category = $this->repository->newInstance([]);

        Form::populate($category);

        return response()->view('category::admin.category.create', compact('category'));

    }

    /**
     * Create new category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $attributes            = $request->all();
            $attributes['user_id'] = user_id('admin.web');
            $category              = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('category::category.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/category/category/' . $category->getRouteKey()),
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 400,
            ], 400);
        }

    }

    /**
     * Show category for editing.
     *
     * @param Request $request
     * @param Model   $category
     *
     * @return Response
     */
    public function edit(CategoryRequest $request, Category $category)
    {
        Form::populate($category);
        return response()->view('category::admin.category.edit', compact('category'));
    }

    /**
     * Update the category.
     *
     * @param Request $request
     * @param Model   $category
     *
     * @return Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {

            $attributes = $request->all();

            $category->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('category::category.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/category/category/' . $category->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/category/category/' . $category->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Remove the category.
     *
     * @param Model   $category
     *
     * @return Response
     */
    public function destroy(CategoryRequest $request, Category $category)
    {
        $cid = $category->id;
        if ($this->repository->findByField('parent_id', $cid)->count() > 0) {
            return response()->json([
                'message' => 'Child menu exists.',
                'type'    => 'warning',
                'title'   => 'Warning',
            ], 409);
        }

        try {

            $t = $category->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('category::category.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/category/category/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/category/category/' . $category->getRouteKey()),
            ], 400);
        }

    }

    /**
     * list the category.
     *
     * @param Model   $category
     *
     * @return Response
     */
    public function select2(CategoryRequest $request)
    {
     
        // $data['items'] = $this->repository
        //     ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        //     ->all();

       


        $slug = $request->get('q');
        if($slug!=''){
        $data['items']  = $this->repository
            ->scopeQuery(function ($query) use ($slug){
                return $query
                        ->where('name', 'LIKE','%'.$slug.'%')
                        ->orderBy('name', 'ASC');
            })->all();
        }


             $data['total_count'] = count($data['items']);

        return json_encode($data);
    }

}
