<?php

namespace Laracart\Order\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class OrderStatusListPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OrderStatusListTransformer();
    }
}