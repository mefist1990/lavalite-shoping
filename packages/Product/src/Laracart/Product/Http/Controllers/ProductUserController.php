<?php

namespace Laracart\Product\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Laracart\Product\Http\Requests\ProductRequest;
use Laracart\Product\Interfaces\ProductRepositoryInterface;
use Laracart\Product\Models\Product;

class ProductUserController extends BaseController
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
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Product\Repositories\Criteria\ProductUserCriteria());
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(ProductRequest $request)
    {
        $products = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('product::product.names'));

        return $this->theme->of('product::user.product.index', compact('products'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Product $product
     *
     * @return Response
     */
    public function show(ProductRequest $request, Product $product)
    {
        Form::populate($product);

        return $this->theme->of('product::user.product.show', compact('product'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ProductRequest $request)
    {

        $product = $this->repository->newInstance([]);
        Form::populate($product);

        $this->theme->prependTitle(trans('product::product.names'));
        return $this->theme->of('product::user.product.create', compact('product'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $product = $this->repository->create($attributes);

            return redirect(trans_url('/user/product/product'))
                -> with('message', trans('messages.success.created', ['Module' => trans('product::product.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Product $product
     *
     * @return Response
     */
    public function edit(ProductRequest $request, Product $product)
    {

        Form::populate($product);
        $this->theme->prependTitle(trans('product::product.names'));

        return $this->theme->of('product::user.product.edit', compact('product'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Product $product
     *
     * @return Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        try {
            $this->repository->update($request->all(), $product->getRouteKey());

            return redirect(trans_url('/user/product/product'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('product::product.name')]))
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
    public function destroy(ProductRequest $request, Product $product)
    {
        try {
            $this->repository->delete($product->getRouteKey());
            return redirect(trans_url('/user/product/product'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('product::product.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
