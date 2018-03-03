<?php

namespace Laracart\Product\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Laracart\Product\Http\Requests\ProductRequest;
use Laracart\Product\Interfaces\ProductRepositoryInterface;
use Laracart\Product\Models\Product;

/**
 * Admin web controller class.
 */
class ProductAdminController extends BaseController
{
    // use ProductWorkflow;
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
     * @return Response
     */
    public function index(ProductRequest $request)
    {
        $this->theme->asset()->add('select2-css', 'themes/admin/assets/packages/select2/css/select2.min.css');
        $this->theme->asset()->container('footer')->add('select2-js', 'themes/admin/assets/packages/select2/js/select2.full.js');
        
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('product::product.names').' :: ');
        return $this->theme->of('product::admin.product.index')->render();
    }

    /**
     * Display a list of product.
     *
     * @return Response
     */
    public function getJson(ProductRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $products  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Laracart\\Product\\Repositories\\Presenter\\ProductListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $products['recordsTotal']    = $products['meta']['pagination']['total'];
        $products['recordsFiltered'] = $products['meta']['pagination']['total'];
        $products['request']         = $request->all();
        return response()->json($products, 200);

    }

    /**
     * Display product.
     *
     * @param Request $request
     * @param Model   $product
     *
     * @return Response
     */
    public function show(ProductRequest $request, Product $product)
    {
        if (!$product->exists) {
            return response()->view('product::admin.product.new', compact('product'));
        }

        Form::populate($product);

        return response()->view('product::admin.product.show', compact('product'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ProductRequest $request)
    {

        $product = $this->repository->newInstance([]);

        Form::populate($product);

        return response()->view('product::admin.product.create', compact('product'));

    }

    /**
     * Create new product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $product          = $this->repository->create($attributes);

             if ($request->get('category')) {
                $product->categories()->sync($request->get('category'));
            }


             if ($request->get('attribute')) {
                $product->attributes()->sync($request->get('attribute'));
            }


            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('product::product.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/product/product/'.$product->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show product for editing.
     *
     * @param Request $request
     * @param Model   $product
     *
     * @return Response
     */
    public function edit(ProductRequest $request, Product $product)
    {
        Form::populate($product);
        return  response()->view('product::admin.product.edit', compact('product'));
    }

    /**
     * Update the product.
     *
     * @param Request $request
     * @param Model   $product
     *
     * @return Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        try {

            $attributes = $request->all();

            $product->update($attributes);
            
              if ($request->get('category')) {
                $product->categories()->sync($request->get('category'));
            }

            if ($request->get('attribute')) {
                $product->attributes()->sync($request->get('attribute'));
            }
            else
            {
                 $product->attributes()->detach();
            }


            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('product::product.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/product/product/'.$product->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/product/product/'.$product->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the product.
     *
     * @param Model   $product
     *
     * @return Response
     */
    public function destroy(ProductRequest $request, Product $product)
    {

        try {

            $t = $product->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('product::product.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/product/product/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/product/product/'.$product->getRouteKey()),
            ], 400);
        }
    }

    /**
     * list the product.
     *
     * @param Model   $product
     *
     * @return Response
     */
    public function select2(ProductRequest $request)
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
