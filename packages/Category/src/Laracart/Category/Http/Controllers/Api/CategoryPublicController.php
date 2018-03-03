<?php

namespace Laracart\Category\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Laracart\Category\Interfaces\CategoryRepositoryInterface;
use Laracart\Category\Repositories\Presenter\CategoryItemTransformer;

/**
 * Pubic API controller class.
 */
class CategoryPublicController extends BaseController
{
    /**
     * Constructor.
     *
     * @param type \Laracart\Category\Interfaces\CategoryRepositoryInterface $category
     *
     * @return type
     */
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->repository = $category;
        parent::__construct();
    }

    /**
     * Show category's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $categories = $this->repository
            ->setPresenter('\\Laracart\\Category\\Repositories\\Presenter\\CategoryListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $categories['code'] = 2000;
        return response()->json($categories)
                ->setStatusCode(200, 'INDEX_SUCCESS');
    }

    /**
     * Show category.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $category = $this->repository
            ->setPresenter('\\Laracart\\Category\\Repositories\\Presenter\\CategoryItemPresenter')
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        $category['sub'] = $this->repository
            ->setPresenter('\\Laracart\\Category\\Repositories\\Presenter\\CategoryListPresenter')
            ->scopeQuery(function($query) use ($slug, $category) {
            return $query->orderBy('name','ASC')
                         ->where('parent_id', hashids_decode($category['data']['id']));
        })->all();

        $category['products'] = $this->repository
            ->skipPresenter()
            ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first()->products;

        if (!is_null($category)) {
            //$category         = $this->itemPresenter($category, new CategoryItemTransformer);
            $category['code'] = 2001;
            return response()->json($category)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
