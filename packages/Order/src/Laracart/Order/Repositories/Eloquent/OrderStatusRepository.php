<?php

namespace Laracart\Order\Repositories\Eloquent;

use Laracart\Order\Interfaces\OrderStatusRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class OrderStatusRepository extends BaseRepository implements OrderStatusRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('laracart.order.order_status.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('laracart.order.order_status.model');
    }
}
