<?php

namespace Laracart\Currency\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Laracart\Currency\Http\Requests\CurrencyRequest;
use Laracart\Currency\Interfaces\CurrencyRepositoryInterface;
use Laracart\Currency\Models\Currency;

class CurrencyUserController extends BaseController
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
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Currency\Repositories\Criteria\CurrencyUserCriteria());
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(CurrencyRequest $request)
    {
        $currencies = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('currency::currency.names'));

        return $this->theme->of('currency::user.currency.index', compact('currencies'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Currency $currency
     *
     * @return Response
     */
    public function show(CurrencyRequest $request, Currency $currency)
    {
        Form::populate($currency);

        return $this->theme->of('currency::user.currency.show', compact('currency'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(CurrencyRequest $request)
    {

        $currency = $this->repository->newInstance([]);
        Form::populate($currency);

        $this->theme->prependTitle(trans('currency::currency.names'));
        return $this->theme->of('currency::user.currency.create', compact('currency'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(CurrencyRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $currency = $this->repository->create($attributes);

            return redirect(trans_url('/user/currency/currency'))
                -> with('message', trans('messages.success.created', ['Module' => trans('currency::currency.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Currency $currency
     *
     * @return Response
     */
    public function edit(CurrencyRequest $request, Currency $currency)
    {

        Form::populate($currency);
        $this->theme->prependTitle(trans('currency::currency.names'));

        return $this->theme->of('currency::user.currency.edit', compact('currency'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Currency $currency
     *
     * @return Response
     */
    public function update(CurrencyRequest $request, Currency $currency)
    {
        try {
            $this->repository->update($request->all(), $currency->getRouteKey());

            return redirect(trans_url('/user/currency/currency'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('currency::currency.name')]))
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
    public function destroy(CurrencyRequest $request, Currency $currency)
    {
        try {
            $this->repository->delete($currency->getRouteKey());
            return redirect(trans_url('/user/currency/currency'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('currency::currency.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
