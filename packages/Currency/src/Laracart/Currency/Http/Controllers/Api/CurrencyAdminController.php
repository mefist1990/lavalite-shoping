<?php

namespace Laracart\Currency\Http\Controllers\Api;

use App\Http\Controllers\Api\AdminController as BaseController;
use Laracart\Currency\Http\Requests\CurrencyRequest;
use Laracart\Currency\Interfaces\CurrencyRepositoryInterface;
use Laracart\Currency\Models\Currency;

/**
 * Admin API controller class.
 */
class CurrencyAdminController extends BaseController
{
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
     * @return json
     */
    public function index(CurrencyRequest $request)
    {
        $currencies  = $this->repository
            ->setPresenter('\\Laracart\\Currency\\Repositories\\Presenter\\CurrencyListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $currencies['code'] = 2000;
        return response()->json($currencies) 
                         ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display currency.
     *
     * @param Request $request
     * @param Model   Currency
     *
     * @return Json
     */
    public function show(CurrencyRequest $request, Currency $currency)
    {
        $currency         = $currency->presenter();
        $currency['code'] = 2001;
        return response()->json($currency)
                         ->setStatusCode(200, 'SHOW_SUCCESS');;

    }

    /**
     * Show the form for creating a new currency.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(CurrencyRequest $request, Currency $currency)
    {
        $currency         = $currency->presenter();
        $currency['code'] = 2002;
        return response()->json($currency)
                         ->setStatusCode(200, 'CREATE_SUCCESS');

    }

    /**
     * Create new currency.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(CurrencyRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $currency          = $this->repository->create($attributes);
            $currency          = $currency->presenter();
            $currency['code']  = 2004;

            return response()->json($currency)
                             ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }
    }

    /**
     * Show currency for editing.
     *
     * @param Request $request
     * @param Model   $currency
     *
     * @return json
     */
    public function edit(CurrencyRequest $request, Currency $currency)
    {
        $currency         = $currency->presenter();
        $currency['code'] = 2003;
        return response()-> json($currency)
                        ->setStatusCode(200, 'EDIT_SUCCESS');;
    }

    /**
     * Update the currency.
     *
     * @param Request $request
     * @param Model   $currency
     *
     * @return json
     */
    public function update(CurrencyRequest $request, Currency $currency)
    {
        try {

            $attributes = $request->all();

            $currency->update($attributes);
            $currency         = $currency->presenter();
            $currency['code'] = 2005;

            return response()->json($currency)
                             ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the currency.
     *
     * @param Request $request
     * @param Model   $currency
     *
     * @return json
     */
    public function destroy(CurrencyRequest $request, Currency $currency)
    {
        try {
            $t = $currency->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('currency::currency.name')]),
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
