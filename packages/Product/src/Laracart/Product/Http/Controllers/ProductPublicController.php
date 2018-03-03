<?php

namespace Laracart\Product\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Laracart\Product\Interfaces\ProductRepositoryInterface;
use Laracart\Category\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request as Request;

class ProductPublicController extends BaseController
{
    // use ProductWorkflow;

    /**
     * Constructor.
     *
     * @param type \Laracart\Product\Interfaces\ProductRepositoryInterface $product
     *
     * @return type
     */
    public function __construct(ProductRepositoryInterface $product,CategoryRepositoryInterface $category)
    {
        $this->repository = $product;
        $this->category = $category;
        parent::__construct();
    }

    /**
     * Show product's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index(Request $request)
    {
        $search  = $request->get('search');
        $paginate = (isset($search['show'])) ? $search['show'] : 9;        
        
        $products = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query;
        })->paginate($paginate);
   
        return $this->theme->of('product::public.product.index', compact('products','search'))->render();
    }

    /**
     * Show product.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $options = array();
        $product = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);
        if($product->attributes){
            foreach ($product->attributes as $key => $value) {
                $options[$value->group->name][] = $value->name;
            }
        }

        return $this->theme->of('product::public.product.show', compact('product','options'))->render();
    }

}
