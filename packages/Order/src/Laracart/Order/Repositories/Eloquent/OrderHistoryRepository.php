<?php

namespace Laracart\Order\Repositories\Eloquent;

use Laracart\Order\Interfaces\OrderHistoryRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class OrderHistoryRepository extends BaseRepository implements OrderHistoryRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('laracart.order.order_history.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('laracart.order.order_history.model');
    }
}
