<?php

namespace Laracart\Product\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Laracart\Product\Interfaces\ProductRepositoryInterface;
use Laracart\Product\Repositories\Presenter\ProductItemTransformer;

/**
 * Pubic API controller class.
 */
class ProductPublicController extends BaseController
{
    /**
     * Constructor.
     *
     * @param type \Laracart\Product\Interfaces\ProductRepositoryInterface $product
     *
     * @return type
     */
    public function __construct(ProductRepositoryInterface $product)
    {
        $this->repository = $product;
        parent::__construct();
    }

    /**
     * Show product's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $products = $this->repository
            ->setPresenter('\\Laracart\\Product\\Repositories\\Presenter\\ProductListPresenter')
            ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $products['code'] = 2000;
        return response()->json($products)
                ->setStatusCode(200, 'INDEX_SUCCESS');
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

        $product = $this->repository
            ->setPresenter('\\Laracart\\Product\\Repositories\\Presenter\\ProductItemPresenter')
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($product)) {
            $product['code'] = 2001;
            return response()->json($product)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
