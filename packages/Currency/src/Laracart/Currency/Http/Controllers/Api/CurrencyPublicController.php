<?php

namespace Laracart\Currency\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Laracart\Currency\Interfaces\CurrencyRepositoryInterface;
use Laracart\Currency\Repositories\Presenter\CurrencyItemTransformer;

/**
 * Pubic API controller class.
 */
class CurrencyPublicController extends BaseController
{
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
            ->setPresenter('\\Laracart\\Currency\\Repositories\\Presenter\\CurrencyListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $currencies['code'] = 2000;
        return response()->json($currencies)
                ->setStatusCode(200, 'INDEX_SUCCESS');
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
        $currency = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($currency)) {
            $currency         = $this->itemPresenter($module, new CurrencyItemTransformer);
            $currency['code'] = 2001;
            return response()->json($currency)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
