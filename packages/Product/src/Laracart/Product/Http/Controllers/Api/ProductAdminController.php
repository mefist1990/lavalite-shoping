<?php

namespace Laracart\Product\Http\Controllers\Api;

use App\Http\Controllers\Api\AdminController as BaseController;
use Laracart\Product\Http\Requests\ProductRequest;
use Laracart\Product\Interfaces\ProductRepositoryInterface;
use Laracart\Product\Models\Product;

/**
 * Admin API controller class.
 */
class ProductAdminController extends BaseController
{
    /**
     * Initialize product controller.
     *
     * @param type ProductRepositoryInterface $product
     *
     * @return type
     */
    public function __construct(ProductRepositoryInterface $product)
    {
        $this->repository = $product;
        parent::__construct();
    }

    /**
     * Display a list of product.
     *
     * @return json
     */
    public function index(ProductRequest $request)
    {
        $products  = $this->repository
            ->setPresenter('\\Laracart\\Product\\Repositories\\Presenter\\ProductListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $products['code'] = 2000;
        return response()->json($products) 
                         ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display product.
     *
     * @param Request $request
     * @param Model   Product
     *
     * @return Json
     */
    public function show(ProductRequest $request, Product $product)
    {
        $product         = $product->presenter();
        $product['code'] = 2001;
        return response()->json($product)
                         ->setStatusCode(200, 'SHOW_SUCCESS');;

    }

    /**
     * Show the form for creating a new product.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(ProductRequest $request, Product $product)
    {
        $product         = $product->presenter();
        $product['code'] = 2002;
        return response()->json($product)
                         ->setStatusCode(200, 'CREATE_SUCCESS');

    }

    /**
     * Create new product.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(ProductRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $product          = $this->repository->create($attributes);
            $product          = $product->presenter();
            $product['code']  = 2004;

            return response()->json($product)
                             ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }
    }

    /**
     * Show product for editing.
     *
     * @param Request $request
     * @param Model   $product
     *
     * @return json
     */
    public function edit(ProductRequest $request, Product $product)
    {
        $product         = $product->presenter();
        $product['code'] = 2003;
        return response()-> json($product)
                        ->setStatusCode(200, 'EDIT_SUCCESS');;
    }

    /**
     * Update the product.
     *
     * @param Request $request
     * @param Model   $product
     *
     * @return json
     */
    public function update(ProductRequest $request, Product $product)
    {
        try {

            $attributes = $request->all();

            $product->update($attributes);
            $product         = $product->presenter();
            $product['code'] = 2005;

            return response()->json($product)
                             ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the product.
     *
     * @param Request $request
     * @param Model   $product
     *
     * @return json
     */
    public function destroy(ProductRequest $request, Product $product)
    {
        try {
            $t = $product->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('product::product.name')]),
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
