<?php

namespace Laracart\Order\Repositories\Eloquent;

use Laracart\Order\Interfaces\OrderRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('laracart.order.order.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('laracart.order.order.model');
    }
    /**
     * updateStatus.
     *
     * @return string
     */
    public function updateStatus($order_status_id, $id)
    {
        return $this->model->whereId($id)->update([ 'order_status_id' => $order_status_id ]);
    }



}
