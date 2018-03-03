<?php

namespace Laracart\Currency\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Laracart\Currency\Http\Requests\CurrencyRequest;
use Laracart\Currency\Interfaces\CurrencyRepositoryInterface;
use Laracart\Currency\Models\Currency;

/**
 * Admin web controller class.
 */
class CurrencyAdminController extends BaseController
{
    // use CurrencyWorkflow;
    /**
     * Initialize currency controller.
     *
     * @param type CurrencyRepositoryInterface $currency
     *
     * @return type
     */
    public function __construct(CurrencyRepositoryInterface $currency)
    {
        $this->repository = $currency;
        parent::__construct();
    }

    /**
     * Display a list of currency.
     *
     * @return Response
     */
    public function index(CurrencyRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('currency::currency.names').' :: ');
        return $this->theme->of('currency::admin.currency.index')->render();
    }

    /**
     * Display a list of currency.
     *
     * @return Response
     */
    public function getJson(CurrencyRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $currencies  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Laracart\\Currency\\Repositories\\Presenter\\CurrencyListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $currencies['recordsTotal']    = $currencies['meta']['pagination']['total'];
        $currencies['recordsFiltered'] = $currencies['meta']['pagination']['total'];
        $currencies['request']         = $request->all();
        return response()->json($currencies, 200);

    }

    /**
     * Display currency.
     *
     * @param Request $request
     * @param Model   $currency
     *
     * @return Response
     */
    public function show(CurrencyRequest $request, Currency $currency)
    {
        if (!$currency->exists) {
            return response()->view('currency::admin.currency.new', compact('currency'));
        }

        Form::populate($currency);
        return response()->view('currency::admin.currency.show', compact('currency'));
    }

    /**
     * Show the form for creating a new currency.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(CurrencyRequest $request)
    {

        $currency = $this->repository->newInstance([]);

        Form::populate($currency);

        return response()->view('currency::admin.currency.create', compact('currency'));

    }

    /**
     * Create new currency.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(CurrencyRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $currency          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('currency::currency.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/currency/currency/'.$currency->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show currency for editing.
     *
     * @param Request $request
     * @param Model   $currency
     *
     * @return Response
     */
    public function edit(CurrencyRequest $request, Currency $currency)
    {
        Form::populate($currency);
        return  response()->view('currency::admin.currency.edit', compact('currency'));
    }

    /**
     * Update the currency.
     *
     * @param Request $request
     * @param Model   $currency
     *
     * @return Response
     */
    public function update(CurrencyRequest $request, Currency $currency)
    {
        try {

            $attributes = $request->all();

            $currency->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('currency::currency.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/currency/currency/'.$currency->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/currency/currency/'.$currency->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the currency.
     *
     * @param Model   $currency
     *
     * @return Response
     */
    public function destroy(CurrencyRequest $request, Currency $currency)
    {

        try {

            $t = $currency->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('currency::currency.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/currency/currency/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/currency/currency/'.$currency->getRouteKey()),
            ], 400);
        }
    }

}
