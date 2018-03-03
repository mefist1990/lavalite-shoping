<?php

namespace Laracart\Coupon\Repositories\Eloquent;

use Laracart\Coupon\Interfaces\CouponRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class CouponRepository extends BaseRepository implements CouponRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('laracart.coupon.coupon.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('laracart.coupon.coupon.model');
    }
}
