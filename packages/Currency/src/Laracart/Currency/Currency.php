<?php

namespace Laracart\Currency;

use User;

class Currency
{
    /**
     * $currency object.
     */
    protected $currency;

    /**
     * Constructor.
     */
    public function __construct(\Laracart\Currency\Interfaces\CurrencyRepositoryInterface $currency)
    {
        $this->currency = $currency;
    }

    /**
     * Returns count of currency.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.currency.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->currency->pushCriteria(new \Litepie\Laracart\Repositories\Criteria\CurrencyUserCriteria());
        }

        $currency = $this->currency->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('currency::' . $view, compact('currency'))->render();
    }

    /**
     * Returns currency list
     *
     * @param array $filter
     *
     * @return int
     */
    public function currencies()
    {
        $temp = [];
        $options = $this->currency->scopeQuery(function ($query) {return $query->orderBy('title','ASC');  })->all();
        foreach ($options as $key => $value) {
            $temp[$value->id] = ucfirst($value->title);
        }

        return $temp;
    }
}
