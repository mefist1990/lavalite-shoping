<?php

namespace Laracart\Currency\Repositories\Eloquent;

use Laracart\Currency\Interfaces\CurrencyRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class CurrencyRepository extends BaseRepository implements CurrencyRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('laracart.currency.currency.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('laracart.currency.currency.model');
    }
}
