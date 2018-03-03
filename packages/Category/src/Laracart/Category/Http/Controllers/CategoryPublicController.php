<?php

namespace Laracart\Category\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Laracart\Category\Interfaces\CategoryRepositoryInterface;
use Laracart\Product\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request as Request;

class CategoryPublicController extends BaseController
{
    // use CategoryWorkflow;

    /**
     * Constructor.
     *
     * @param type \Laracart\Category\Interfaces\CategoryRepositoryInterface $category
     *
     * @return type
     */
    public function __construct(CategoryRepositoryInterface $category, ProductRepositoryInterface $product)
    {

        $this->repository = $category;
        $this->product = $product;
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
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('category::public.category.index', compact('categories'))->render();
    }

    /**
     * Show category.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug, Request $request)
    {
        $category = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->where('slug', $slug);
        })->first(['*']);
        
        return $this->theme->of('category::public.category.show', compact('category'))->render();
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
        $slug = $request->get('q');
        if($slug!=''){
        $data['items']  = $this->repository
            ->scopeQuery(function ($query) use ($slug){
                return $query->where('name', 'LIKE','%'.$slug.'%')
                        ->orderBy('name', 'ASC');
            })->all();
        }

        $data['total_count'] = count($data['items']);

        return json_encode($data);
    }

}
