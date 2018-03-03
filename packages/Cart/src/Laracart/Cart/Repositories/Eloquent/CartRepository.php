<?php

namespace Laracart\Cart\Repositories\Eloquent;

use Laracart\Cart\Interfaces\CartRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('laracart.cart.cart.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('laracart.cart.cart.model');
    }
}
