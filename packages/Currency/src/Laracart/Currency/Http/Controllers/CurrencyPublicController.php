<?php

namespace Laracart\Currency\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Laracart\Currency\Interfaces\CurrencyRepositoryInterface;

class CurrencyPublicController extends BaseController
{
    // use CurrencyWorkflow;

    /**
     * Constructor.
     *
     * @param type \Laracart\Currency\Interfaces\CurrencyRepositoryInterface $currency
     *
     * @return type
     */
    public function __construct(CurrencyRepositoryInterface $currency)
    {
        $this->repository = $currency;
        parent::__construct();
    }

    /**
     * Show currency's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $currencies = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('currency::public.currency.index', compact('currencies'))->render();
    }

    /**
     * Show currency.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $currency = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('currency::public.currency.show', compact('currency'))->render();
    }

}
