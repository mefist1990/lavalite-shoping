<?php

namespace Laracart\Coupon;

use User;

class Coupon
{
    /**
     * $coupon object.
     */
    protected $coupon;

    /**
     * Constructor.
     */
    public function __construct(\Laracart\Coupon\Interfaces\CouponRepositoryInterface $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Returns count of coupon.
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
    public function gadget($view = 'admin.coupon.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->coupon->pushCriteria(new \Litepie\Laracart\Repositories\Criteria\CouponUserCriteria());
        }

        $coupon = $this->coupon->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('coupon::' . $view, compact('coupon'))->render();
    }
}
