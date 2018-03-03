<?php

namespace Laracart\Returns\Http\Controllers;

use App\Http\Controllers\ClientController as BaseController;
use Form;
use Laracart\Returns\Http\Requests\ReturnsRequest;
use Laracart\Returns\Interfaces\ReturnsRepositoryInterface;
use Laracart\Order\Interfaces\OrderRepositoryInterface;
use Litepie\User\Interfaces\ClientRepositoryInterface;
use Laracart\Returns\Models\Returns;
use Request;

class ReturnsClientController extends BaseController
{
    /**
     * Initialize returns controller.
     *
     * @param type ReturnsRepositoryInterface $returns
     *
     * @return type
     */
    public function __construct(ReturnsRepositoryInterface $returns,ClientRepositoryInterface $client,OrderRepositoryInterface $order)
    {
        $this->repository = $returns;
        $this->order = $order;
        $this->client = $client;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Returns\Repositories\Criteria\ReturnsClientCriteria());
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(ReturnsRequest $request)
    {
        
        $returns = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('returns::returns.names'));

        return $this->theme->of('returns::user.returns.index', compact('returns'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Returns $returns
     *
     * @return Response
     */
    public function show(ReturnsRequest $request, Returns $returns)
    {
        
        Form::populate($returns);

        return $this->theme->of('returns::user.returns.show', compact('returns'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ReturnsRequest $request)
    {
        $returns = $this->repository->newInstance([]);
        Form::populate($returns);

        $this->theme->prependTitle(trans('returns::returns.names'));
        return $this->theme->of('returns::user.returns.create', compact('returns'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ReturnsRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $attributes['status'] = 'Pending';
            $returns = $this->repository->create($attributes);

            return redirect(trans_url('/client/returns/returns'))
                -> with('message', trans('messages.success.created', ['Module' => trans('returns::returns.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Returns $returns
     *
     * @return Response
     */
    public function edit(ReturnsRequest $request, Returns $returns)
    {
        Form::populate($returns);
        $this->theme->prependTitle(trans('returns::returns.names'));

        return $this->theme->of('returns::user.returns.edit', compact('returns'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Returns $returns
     *
     * @return Response
     */
    public function update(ReturnsRequest $request, Returns $returns)
    {
        try {
            
            $attributes=$request->all();
            $attributes['status'] = 'Pending';
            $this->repository->update($attributes, $returns->getRouteKey());

            return redirect(trans_url('/client/returns/returns'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('returns::returns.name')]))
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
    public function destroy(ReturnsRequest $request, Returns $returns)
    {

        try {

            $t = $returns->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('returns::returns.name')]),
                'code'     => 202,
                'redirect' => trans_url('/client/returns/returns/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/client/returns/returns/'.$returns->getRouteKey()),
            ], 400);
        }
    }
    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Returns $returns
     *
     * @return Response
     */
    public function favourite(Returns $returns)
    {
        try {  
            $returns->favourite()->attach(user_id('client.web'));
            return response([ 'name' => $returns->name]);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function myFavourite(ReturnsRequest $request)
    {       
       
        $returns =  $this->client->returns();
        
        $this->theme->prependTitle(trans('returns::returns.names'));

        return $this->theme->of('returns::user.returns.favourite', compact('returns'))->render();
    }

    /**
     * Display return form
     *
     * @return Response
     */
    public function returnAdd($product_id,$order_id)
    { 
        $order = $this->order->scopeQuery(function($query) use ($order_id) {
            return $query->orderBy('id','DESC')
                         ->whereId($order_id);
        })->first(['*']);

        

        return $this->theme->of('returns::user.returns.returns', compact('order','product_id'))->render();
    }

    /**
     * check return order
     *
     * @param Request $request
     *
     * @return Response
     */
    public function checkOrder(ReturnsRequest $request)
    {
        
        $product= Request::get('product_id');
        $order= Request::get('order_id');        
       
        return $this->repository
                ->scopeQuery(function ($query) use ($product, $order) {
                    return $query->whereOrderId($order)->where(function ($query) use ($product) {
                        $query->where('product_id', '=', $product);                        
                    });
                })->count();
    }
}